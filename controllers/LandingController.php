<?php

namespace app\controllers;

use app\models\LandingListitem;
use app\models\LandingPage;
use app\models\LandingSection;
use app\models\MenuTop;
use app\models\Pages;
use app\models\Preorders;
use app\models\Test;
use app\models\TestPage;
use app\models\TestTarget;
use app\models\Visit;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Feedback;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class LandingController extends Controller
{
    public $defaultAction = 'page';
    public $landingPage;



    /**
     * @inheritdoc
     */
    public function actions()
    {
        return
            [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                    'view' => '@app/views/site/custom_error.php',
                ],

        ];
    }


    /**
     * Displays page.
     *
     */
    public function actionPage()
    {
        Url::remember();

        $PageName = Yii::$app->request->get('landingpage');

        // UTM из GET
        $utm = [];
        $utm['source'] = Yii::$app->request->get('utm_source');
        $utm['medium'] = Yii::$app->request->get('utm_medium');
        $utm['campaign'] = Yii::$app->request->get('utm_campaign');
        $utm['term'] = Yii::$app->request->get('utm_term');
        $utm['content'] = Yii::$app->request->get('utm_content');

        //сохр инфы о посещении
        $visit = new Visit();
        $visit['ip'] = Yii::$app->request->userIP;
        $visit['lp_hrurl'] = $PageName;
        $visit['url'] = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $visit['utm_source']=$utm['source'];
        $visit['utm_medium']=$utm['medium'];
        $visit['utm_campaign']=$utm['campaign'];
        $visit['utm_term']=$utm['term'];
        $visit['utm_content']=$utm['content'];
        $visit['qnt']=1;
        $visit->save();


        $this->landingPage = LandingPage::find()->where(['hrurl'=>$PageName])->one();
        if ($PageName == null OR $this->landingPage == null)  {
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        }
        if ($this->landingPage->layout == null) {
            $this->layout = 'landing';
        } else {
            $this->layout = $this->landingPage->layout;
        }
        if ($this->landingPage['seo_logo']=='title') {
            $this->landingPage['seo_logo'] = $this->landingPage['title'];
        }
        $this->view->params['meta']=$this->landingPage;

        //секции
        $allSections = LandingSection::find()->where(['page_id'=>$this->landingPage->id])->orderBy('order_num')->all();
        $sections = [];
        $sections['top'] = $allSections[0];
        $sections['action'] = $allSections[1];
        $sections['services'] = $allSections[2];
        $sections['call2action'] = $allSections[3];
        $sections['whyWe'] = $allSections[4];
        $sections['howWeWork'] = $allSections[5];
        $sections['numbers'] = $allSections[6];
        $sections['projects'] = $allSections[7];
        $sections['reviews'] = $allSections[8];
        $sections['clients'] = $allSections[9];
        $sections['order'] = $allSections[10];

        // list items
        $sections['topListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['top']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['servicesListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['services']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['whyWeListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['whyWe']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['howWeWorkListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['howWeWork']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['numbersListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['numbers']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['projectsListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['projects']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['reviewsListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['reviews']['id']])
            ->orderBy('order_num')
            ->all();
        $sections['clientsListItems']=LandingListitem::find()
            ->where(['section_id'=>$sections['clients']['id']])
            ->orderBy('order_num')
            ->all();
        $preorderForm = new Preorders();



        return $this->render($this->landingPage->view,[
            'page' => $this->landingPage,
            'sections' => $sections,
            'preorderForm' => $preorderForm,
            'utm' => $utm,

        ]);
    }


//
//    public function actionVizdel()
//    {
//        $daysAgo = 0;
//        $today = time();
//        $oldTime = $today - ($daysAgo*86400); // 24*60*60 = 86400
//        $allVisits = Visit::find()
//            ->where(['<','created_at',$oldTime])
//            ->andWhere(['comment'=>null])
//            ->orderBy([
//                'lp_hrurl'=> SORT_ASC,
//                'utm_source'=> SORT_ASC,
//                'utm_medium'=> SORT_ASC,
//                'utm_campaign'=> SORT_ASC
//            ])
//            ->all();
//        $values = $allVisits;
//        ArrayHelper::multisort($values, ['created_at'], [SORT_DESC]);
//        $max = $values[0]['created_at'];
//        ArrayHelper::multisort($values, ['created_at'], [SORT_ASC]);
//        $min = $values[0]['created_at'];
//
//        $visitsByDay=[];
//
//        for($dayStart = $min - ($min % 86400);$dayStart < $oldTime; $dayStart += 86400){
//            $dayEnd = $dayStart + 86400;
//            $dayVisits = Visit::find()
//                ->where(['>','created_at',$dayStart])
//                ->andWhere(['<','created_at',$dayEnd])
//                ->andWhere(['comment'=>null])
//                ->orderBy([
//                    'lp_hrurl'=> SORT_ASC,
//                    'utm_source'=> SORT_ASC,
//                    'utm_medium'=> SORT_ASC,
//                    'utm_campaign'=> SORT_ASC
//                ])
//                ->all();
//
//            if ($dayVisits!=null) {
//                $visitsByDay[] = $dayVisits;
//            }
//        }
//
//        foreach ($visitsByDay as $visits) {
//            $result = new Visit();
//            $oldVisit = null;
//            foreach ($visits as $visit) {
//                if($oldVisit == null){
//                    $result['lp_hrurl'] = $visit['lp_hrurl'];
//                    $result['utm_source'] = $visit['utm_source'] ;
//                    $result['utm_medium'] = $visit['utm_medium'] ;
//                    $result['utm_campaign'] = $visit['utm_campaign'] ;
//                    $result['qnt'] = $visit['qnt'];
//                    $result['comment'] = ''.$visit['created_at'];
//                    $oldVisit = $result;
//                } else {
//                    if($visit['lp_hrurl'] == $oldVisit['lp_hrurl']){
//                        if ($visit['utm_source']==$oldVisit['utm_source']) {
//                            if($visit['utm_medium']==$oldVisit['utm_medium']){
//                                if ($visit['utm_campaign']==$oldVisit['utm_campaign']) {
//                                    $result['qnt']+=$visit['qnt'];
//                                } else {   // $visit['utm_campaign']!=$oldVisit['utm_campaign']
//                                    $result->save();
//                                    $result = new Visit();
//                                    $result['lp_hrurl'] = $visit['lp_hrurl'];
//                                    $result['utm_source'] = $visit['utm_source'];
//                                    $result['utm_medium'] = $visit['utm_medium'];
//                                    $result['utm_campaign'] = $visit['utm_campaign'];
//                                    $result['comment'] = ''.$visit['created_at'];
//                                    $result['qnt'] = $visit['qnt'] ;
//                                    $oldVisit = $result;
//                                }
//                            } else {   // $visit['utm_medium']!=$oldVisit['utm_medium']
//                                $result->save();
//                                $result = new Visit();
//                                $result['lp_hrurl'] = $visit['lp_hrurl'];
//                                $result['utm_source'] = $visit['utm_source'];
//                                $result['utm_medium'] = $visit['utm_medium'];
//                                $result['utm_campaign'] = $visit['utm_campaign'];
//                                $result['comment'] = ''.$visit['created_at'];
//                                $result['qnt'] = $visit['qnt'] ;
//                                $oldVisit = $result;
//                            }
//                        } else {   // $visit['utm_source']!=$oldVisit['utm_source']
//                            $result->save();
//                            $result = new Visit();
//                            $result['lp_hrurl'] = $visit['lp_hrurl'];
//                            $result['utm_source'] = $visit['utm_source'];
//                            $result['utm_medium'] = $visit['utm_medium'];
//                            $result['utm_campaign'] = $visit['utm_campaign'];
//                            $result['comment'] = ''.$visit['created_at'];
//                            $result['qnt'] = $visit['qnt'] ;
//                            $oldVisit = $result;
//                        }
//                    } else { //   $visit['lp_hrurl'] != $oldVisit['lp_hrurl']
//                        $result->save();
//                        $result = new Visit();
//                        $result['lp_hrurl'] = $visit['lp_hrurl'];
//                        $result['utm_source'] = $visit['utm_source'];
//                        $result['utm_medium'] = $visit['utm_medium'];
//                        $result['utm_campaign'] = $visit['utm_campaign'];
//                        $result['comment'] = ''.$visit['created_at'];
//                        $result['qnt'] = $visit['qnt'] ;
//                        $oldVisit = $result;
//                    }
//                }
//                $visit->delete();
//            }
//            $result->save();
//        }
//
////        foreach ($visitsByDay as $dayVisits) {
////            foreach ($dayVisits as $model) {
////                var_dump($model); die;
////                $model->delete();
////            }
////
////        }
//    }
//




}
