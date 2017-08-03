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
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
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
//    public $test;
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

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

//        $this->view->params['meta']=$page;

        $PageName = Yii::$app->request->get('landingpage');
        $this->landingPage = LandingPage::find()->where(['hrurl'=>$PageName])->one();
        if ($PageName == null OR $this->landingPage == null)  {
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        }
        if ($this->landingPage->layout == null) {
            $this->layout = 'landing';
        } else {
            $this->layout = $this->landingPage->layout;
        }
        $this->view->params['meta']=$this->landingPage;

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

        ]);
    }







}
