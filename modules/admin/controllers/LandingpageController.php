<?php

namespace app\modules\admin\controllers;

use app\models\LandingListitem;
use app\models\LandingSection;
use Yii;
use app\models\LandingPage;
use yii\data\ActiveDataProvider;
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
    public function actionStat($id)
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
        return $this->render('stat', [
            'model' => $this->findModel($id),
            'sections'=> $sections,
            'listItems'=> $listItems,
        ]);
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
