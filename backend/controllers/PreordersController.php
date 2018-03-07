<?php

namespace backend\controllers;

use common\models\Feedback;
use Yii;
use common\models\Preorders;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PreordersController implements the CRUD actions for Preorders model.
 */
class PreordersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'except' => ['error'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['adminPermission'],
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'lead-quality',
                            'set-quality',
                            'create-call',
                            'update-call',
                        ],
                        'roles' => ['statPermission'],
                    ],
                    [
                        'allow' => false,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Preorders models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $dataProvider = new ActiveDataProvider([
            'query' => Preorders::find(),
            'pagination'=> [
                'pageSize' => 100,
            ],
            'sort' =>[
                'defaultOrder'=> [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUtm()
    {
        Url::remember();
        $preorders = Preorders::find()->orderBy('date')->all();
        $feedbacks = Feedback::find()->orderBy('date')->all();
        $leads = [];
        $leadId = 0;
        foreach ($preorders as $preorder) {
            $leadId ++;

            $leads[$leadId]['type']= 'preOrder';
            $leads[$leadId]['site']= $preorder['site'];
            $leads[$leadId]['id']= $preorder['id'];
            $leads[$leadId]['name']= $preorder['cargo'];
            $leads[$leadId]['phone']= $preorder['phone'];
            $leads[$leadId]['from_page']= $preorder['from_page'];
            $leads[$leadId]['utm_source']= $preorder['utm_source'];
            $leads[$leadId]['utm_medium']= $preorder['utm_medium'];
            $leads[$leadId]['utm_campaign']= $preorder['utm_campaign'];
            $leads[$leadId]['utm_term']= $preorder['utm_term'];
            $leads[$leadId]['utm_content']= $preorder['utm_content'];
            $leads[$leadId]['date']= $preorder['date'];
            $leads[$leadId]['quality']= $preorder['quality'];
            $leads[$leadId]['comment']= $preorder['comment'];
        }
        foreach ($feedbacks as $feedback) {
            $leadId ++;
            $leads[$leadId]['type']= 'quickForm';
            $leads[$leadId]['site']= $feedback['site'];
            $leads[$leadId]['id']= $feedback['id'];
            $leads[$leadId]['name']= $feedback['name'];
            $leads[$leadId]['phone']= $feedback['phone'];
            $leads[$leadId]['from_page']= $feedback['from_page'];
            $leads[$leadId]['utm_source']= $feedback['utm_source'];
            $leads[$leadId]['utm_medium']= $feedback['utm_medium'];
            $leads[$leadId]['utm_campaign']= $feedback['utm_campaign'];
            $leads[$leadId]['utm_term']= $feedback['utm_term'];
            $leads[$leadId]['utm_content']= $feedback['utm_content'];
            $leads[$leadId]['date']= $feedback['date'];
            $leads[$leadId]['quality']= $feedback['quality'];
            $leads[$leadId]['comment']= $feedback['comment'];
        }
        ArrayHelper::multisort($leads,['date'],[SORT_DESC]);

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$leads,
            'pagination' => [
                'pageSize' => 100,
            ],
//            'sort' => [
//                'attributes' => ['manager', 'date',],
//            ],
        ]);
        return $this->render('utm', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLeadQuality()
    {
        Url::remember();
        $current = [];
        if (Yii::$app->user->can('adminPermission', [])) {
            $this->layout = 'main';
        }
        elseif (Yii::$app->user->can('statPermission', [])) {
            $this->layout = 'stat';
        }
        $preorders = Preorders::find()->orderBy('date')->all();
        $feedbacks = Feedback::find()->orderBy('date')->all();
        $leads = [];
        $leadId = 0;
        foreach ($preorders as $preorder) {
            $leadId ++;

            $leads[$leadId]['type']= 'preOrder';
            $leads[$leadId]['id']= $preorder['id'];
            $leads[$leadId]['site']= $preorder['site'];
            $leads[$leadId]['name']= $preorder['cargo'];
            $leads[$leadId]['phone']= $preorder['phone'];
            $leads[$leadId]['from_page']= $preorder['from_page'];
            $leads[$leadId]['utm_source']= $preorder['utm_source'];
            $leads[$leadId]['utm_medium']= $preorder['utm_medium'];
            $leads[$leadId]['utm_campaign']= $preorder['utm_campaign'];
            $leads[$leadId]['utm_term']= $preorder['utm_term'];
            $leads[$leadId]['utm_content']= $preorder['utm_content'];
            $leads[$leadId]['date']= $preorder['date'];
            $leads[$leadId]['manager']= $preorder['manager'];
            $leads[$leadId]['quality']= $preorder['quality'];
            $leads[$leadId]['comment']= $preorder['comment'];
        }
        foreach ($feedbacks as $feedback) {
            $leadId ++;
            $leads[$leadId]['type']= 'quickForm';
            $leads[$leadId]['site']= $feedback['site'];
            $leads[$leadId]['id']= $feedback['id'];
            $leads[$leadId]['name']= $feedback['name'];
            $leads[$leadId]['phone']= $feedback['phone'];
            $leads[$leadId]['from_page']= $feedback['from_page'];
            $leads[$leadId]['utm_source']= $feedback['utm_source'];
            $leads[$leadId]['utm_medium']= $feedback['utm_medium'];
            $leads[$leadId]['utm_campaign']= $feedback['utm_campaign'];
            $leads[$leadId]['utm_term']= $feedback['utm_term'];
            $leads[$leadId]['utm_content']= $feedback['utm_content'];
            $leads[$leadId]['date']= $feedback['date'];
            $leads[$leadId]['manager']= $feedback['manager'];
            $leads[$leadId]['quality']= $feedback['quality'];
            $leads[$leadId]['comment']= $feedback['comment'];
        }
        ArrayHelper::multisort($leads,['date'],[SORT_DESC]);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('FilterForm');
            $current['manager'] = $data['manager'];
            $current['status'] = $data['status'];
            $filterLeads = [];
            if ($data['manager']!=null && $data['status']!=null) {
                foreach ($leads as $lead) {
                    if ($lead['manager']==$data['manager'] && $lead['quality']==$data['status']) {
                        $filterLeads[] = $lead;
                    }
                }
            }
            if ($data['manager']!=null && $data['status']==null) {
                foreach ($leads as $lead) {
                    if ($lead['manager']==$data['manager']) {
                        $filterLeads[] = $lead;
                    }
                }
            }
            if ($data['manager']==null && $data['status']!=null) {
                foreach ($leads as $lead) {
                    if ( $lead['quality']==$data['status']) {
                        $filterLeads[] = $lead;
                    }
                }
            }
            if ($data['manager']==null && $data['status']==null) {
                $filterLeads=$leads;
            }

            $leads = $filterLeads;
        }




        $leadsDataProvider = new ArrayDataProvider([
            'allModels'=>$leads,
            'pagination' => [
                'pageSize' => 100,
            ],
//            'sort' => [
//                'attributes' => ['manager', 'date',],
//            ],
        ]);

        return $this->render('lead-quality', [
            'dataProvider' => $leadsDataProvider,
            'current' => $current,
        ]);
    }
    /**
     * Displays a single Preorders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Url::remember();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Preorders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateCall()
    {
        $model = new Preorders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('create-call', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Preorders model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateCall($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('update-call', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Preorders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Preorders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Preorders model.
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
     * Deletes an existing Preorders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Url::previous());
    }

    /**
     * Finds the Preorders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Preorders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Preorders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Updates an existing Preorders model.
     * @param integer $id
     * @return mixed
     */
    public function actionSetQuality($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->can('adminPermission', [])) {
            $this->layout = 'main';
        }
        elseif (Yii::$app->user->can('statPermission', [])) {
            $this->layout = 'stat';
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('set-quality', [
                'model' => $model,
            ]);
        }
    }
}
