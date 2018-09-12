<?php

namespace backend\controllers;

use Yii;
use common\models\MenuTop;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuTopController implements the CRUD actions for MenuTop model.
 */
class MenuTopController extends Controller
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
     * Lists all MenuTop models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $dataProvider = new ActiveDataProvider([
            'query' => MenuTop::find()->orderBy([
                'site'=>SORT_ASC,
                'parent_id'=>SORT_ASC,
                'num_order'=>SORT_ASC
            ]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MenuTop model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Url::remember();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MenuTop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MenuTop();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MenuTop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MenuTop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Url::previous());
    }

    /**
     * Finds the MenuTop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MenuTop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MenuTop::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
