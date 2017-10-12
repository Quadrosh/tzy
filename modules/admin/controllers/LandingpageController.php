<?php

namespace app\modules\admin\controllers;

use app\models\Feedback;
use app\models\LandingListitem;
use app\models\LandingSection;
use app\models\Preorders;
use app\models\Visit;
use Yii;
use app\models\LandingPage;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\Sort;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LandingpageController implements the CRUD actions for LandingPage model.
 */
class LandingpageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LandingPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $dataProvider = new ActiveDataProvider([
            'query' => LandingPage::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LandingPage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Url::remember();
        $sections = LandingSection::find()->where(['page_id'=>$id])->orderBy('order_num')->all();
        $listItems = [];
        foreach ($sections as $section ) {
            $listIt = LandingListitem::find()->where(['section_id'=>$section['id']])->orderBy('order_num')->all();
            foreach ($listIt as $item) {
                $listItems[] = $item;
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'sections'=> $sections,
            'listItems'=> $listItems,
        ]);
    }

    /**
     * Displays a LandingPage statistics.
     * @param integer $id
     * @return mixed
     */
    public function actionStat($id,$days)
    {
        Url::remember();
        $daysAgo = $days;
        $today = time();
        $oldTime = $today - ($daysAgo*86400); // 24*60*60 = 86400
        $startPeriod = $oldTime - ($oldTime % 86400);



        $visitsByDay=[];
        for($dayStart = $startPeriod; $dayStart < $today + 86400; $dayStart += 86400){ // +=
            $dayEnd = $dayStart + 86400;
            $rawVisits = Visit::find()
                ->where(['>','created_at',$dayStart])
                ->andWhere(['<','created_at',$dayEnd])
                ->andWhere(['comment'=>null])
                ->orderBy([
                    'lp_hrurl'=> SORT_ASC,
                    'utm_source'=> SORT_ASC,
                    'utm_medium'=> SORT_ASC,
                    'utm_campaign'=> SORT_ASC
                ])
                ->all();
            $compVisits = Visit::find()
                ->where(['>','comment',$dayStart])
                ->andWhere(['<','comment',$dayEnd])
                ->orderBy([
                    'lp_hrurl'=> SORT_ASC,
                    'utm_source'=> SORT_ASC,
                    'utm_medium'=> SORT_ASC,
                    'utm_campaign'=> SORT_ASC
                ])
                ->all();
            $allVisits = $rawVisits;
            foreach ($compVisits as $compVisit) {
                $compVisit['created_at'] = $compVisit['comment'];
                array_push($allVisits,$compVisit);
            }


            if ($allVisits!=null) {
                $visitsByDay[] = $allVisits;
            }
        }

//        debug($visitsByDay); die;

        $vbdi = 0;
        $sumVisitsByDay = [];
        foreach ($visitsByDay as $visits) {
            $sumVisitsByDay[$vbdi] = [];
            $oldVisit = null;
            foreach ($visits as $visit) {
                if($oldVisit == null){
                    $sumVisitsByDay[$vbdi]['lp_hrurl'] = $visit['lp_hrurl'];
                    $sumVisitsByDay[$vbdi]['utm_source'] = $visit['utm_source'] ;
                    $sumVisitsByDay[$vbdi]['utm_medium'] = $visit['utm_medium'] ;
                    $sumVisitsByDay[$vbdi]['utm_campaign'] = $visit['utm_campaign'] ;
                    $sumVisitsByDay[$vbdi]['views'] = $visit['qnt'];
                    $sumVisitsByDay[$vbdi]['date'] = Yii::$app->formatter->asDatetime($visit['created_at'], 'dd/MM/yy');
                    $oldVisit = $sumVisitsByDay[$vbdi];
                } else {
                    if($visit['lp_hrurl'] == $oldVisit['lp_hrurl']){
                        if ($visit['utm_source']==$oldVisit['utm_source']) {
                            if($visit['utm_medium']==$oldVisit['utm_medium']){
                                if ($visit['utm_campaign']==$oldVisit['utm_campaign']) {
                                    $sumVisitsByDay[$vbdi]['views']+=$visit['qnt'];
                                } else {   // $visit['utm_campaign']!=$oldVisit['utm_campaign']
                                    $vbdi++;
                                    $sumVisitsByDay[$vbdi]['lp_hrurl'] = $visit['lp_hrurl'];
                                    $sumVisitsByDay[$vbdi]['utm_source'] = $visit['utm_source'];
                                    $sumVisitsByDay[$vbdi]['utm_medium'] = $visit['utm_medium'];
                                    $sumVisitsByDay[$vbdi]['utm_campaign'] = $visit['utm_campaign'];
                                    $sumVisitsByDay[$vbdi]['date'] = Yii::$app->formatter->asDatetime($visit['created_at'], 'dd/MM/yy');
                                    $sumVisitsByDay[$vbdi]['views'] = $visit['qnt'] ;
                                    $oldVisit = $sumVisitsByDay[$vbdi];
                                }
                            } else {   // $visit['utm_medium']!=$oldVisit['utm_medium']
                                $vbdi++;
                                $sumVisitsByDay[$vbdi]['lp_hrurl'] = $visit['lp_hrurl'];
                                $sumVisitsByDay[$vbdi]['utm_source'] = $visit['utm_source'];
                                $sumVisitsByDay[$vbdi]['utm_medium'] = $visit['utm_medium'];
                                $sumVisitsByDay[$vbdi]['utm_campaign'] = $visit['utm_campaign'];
                                $sumVisitsByDay[$vbdi]['date'] = Yii::$app->formatter->asDatetime($visit['created_at'], 'dd/MM/yy');
                                $sumVisitsByDay[$vbdi]['views'] = $visit['qnt'] ;
                                $oldVisit = $sumVisitsByDay[$vbdi];
                            }
                        } else {   // $visit['utm_source']!=$oldVisit['utm_source']
                            $vbdi++;
                            $sumVisitsByDay[$vbdi]['lp_hrurl'] = $visit['lp_hrurl'];
                            $sumVisitsByDay[$vbdi]['utm_source'] = $visit['utm_source'];
                            $sumVisitsByDay[$vbdi]['utm_medium'] = $visit['utm_medium'];
                            $sumVisitsByDay[$vbdi]['utm_campaign'] = $visit['utm_campaign'];
                            $sumVisitsByDay[$vbdi]['date'] = Yii::$app->formatter->asDatetime($visit['created_at'], 'dd/MM/yy');
                            $sumVisitsByDay[$vbdi]['views'] = $visit['qnt'] ;
                            $oldVisit = $sumVisitsByDay[$vbdi];
                        }
                    } else { //   $visit['lp_hrurl'] != $oldVisit['lp_hrurl']
                        $vbdi++;
                         $sumVisitsByDay[$vbdi]['lp_hrurl'] = $visit['lp_hrurl'];
                         $sumVisitsByDay[$vbdi]['utm_source'] = $visit['utm_source'];
                         $sumVisitsByDay[$vbdi]['utm_medium'] = $visit['utm_medium'];
                         $sumVisitsByDay[$vbdi]['utm_campaign'] = $visit['utm_campaign'];
                         $sumVisitsByDay[$vbdi]['date'] =  Yii::$app->formatter->asDatetime($visit['created_at'], 'dd/MM/yy');
                         $sumVisitsByDay[$vbdi]['views'] = $visit['qnt'] ;
                        $oldVisit =  $sumVisitsByDay[$vbdi];
                    }
                }
            }
            $vbdi++;
        }


        $leads = $this->utm($days);

        debug($leads); die;
        $result = ArrayHelper::merge($sumVisitsByDay, $leads);


        $visitsProvider = new ArrayDataProvider([
            'allModels' => $result,
            'sort'=>[
                'attributes'=>['date','views','lead'],
                'defaultOrder' => ['date'=>SORT_ASC],
            ],
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        return $this->render('stat', [
            'model' => $this->findModel($id),
            'visitsProvider' => $visitsProvider,
        ]);
    }

    public function utm($daysAgo){
        $today = time();
        $oldTime = $today - ($daysAgo*86400); // 24*60*60 = 86400
        $startPeriod = $oldTime - ($oldTime % 86400);


        $preorders = Preorders::find()->where(['<','date',$startPeriod])->orderBy('date')->all();
        $feedbacks = Feedback::find()->where(['<','date',$startPeriod])->orderBy('date')->all();
        $leads = [];
        $leadId = 0;
        foreach ($preorders as $preorder) {
            $leadId ++;
            $leads[$leadId]['type']= 'preOrder';
            $leads[$leadId]['id']= $preorder['id'];
            $leads[$leadId]['lp_hrurl']= $preorder['from_page'];
            $leads[$leadId]['utm_source']= $preorder['utm_source'];
            $leads[$leadId]['utm_medium']= $preorder['utm_medium'];
            $leads[$leadId]['utm_campaign']= $preorder['utm_campaign'];
            $leads[$leadId]['utm_term']= $preorder['utm_term'];
            $leads[$leadId]['utm_content']= $preorder['utm_content'];
            $leads[$leadId]['lead']= 1;
            $leads[$leadId]['date'] =  Yii::$app->formatter->asDatetime($preorder['date'], 'dd/MM/yy');
        }
        foreach ($feedbacks as $feedback) {
            $leadId ++;
            $leads[$leadId]['type']= 'quickForm';
            $leads[$leadId]['id']= $feedback['id'];
            $leads[$leadId]['lp_hrurl']= $feedback['from_page'];
            $leads[$leadId]['utm_source']= $feedback['utm_source'];
            $leads[$leadId]['utm_medium']= $feedback['utm_medium'];
            $leads[$leadId]['utm_campaign']= $feedback['utm_campaign'];
            $leads[$leadId]['utm_term']= $feedback['utm_term'];
            $leads[$leadId]['utm_content']= $feedback['utm_content'];
            $leads[$leadId]['lead']= 1;
            $leads[$leadId]['date']= Yii::$app->formatter->asDatetime($feedback['date'], 'dd/MM/yy');
        }
        ArrayHelper::multisort($leads,['date'],[SORT_DESC]);

        return $leads;
    }

    /**
     * Creates a new LandingPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LandingPage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LandingPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LandingPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Copy landing page with sections and list items
     */
    public function actionCopy($id)
    {
        $source = LandingPage::findOne(['id'=>$id]);
        $newLP = new LandingPage();
        $newLP->setAttributes($source->attributes);
        $newLP['name']=$source['name'].' - Копия';
        $newLP['hrurl']=$source['hrurl'].'_copy';
        $newLP->save();
        $sourceSections = LandingSection::find()->where(['page_id'=>$id])->orderBy('order_num')->all();
        foreach ($sourceSections as $sourceSection) {
            $newSection = new LandingSection();
            $newSection->setAttributes($sourceSection->attributes);
            $newSection['page_id']=$newLP['id'];
            $newSection->save();
            $sourceListItems = LandingListitem::find()->where(['section_id'=>$sourceSection['id']])->orderBy('order_num')->all();
            if ($sourceListItems) {
                foreach ($sourceListItems as $sourceListItem) {
                    $newListItem = new LandingListitem();
                    $newListItem->setAttributes($sourceListItem->attributes);
                    $newListItem['section_id']=$newSection['id'];
                    $newListItem->save();
                }
            }
        }

//        var_dump($newLP); die;

        return $this->redirect(['/admin/landingpage/view','id'=>$newLP['id']]);
    }

    /**
     * Finds the LandingPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LandingPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LandingPage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
