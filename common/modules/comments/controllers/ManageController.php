<?php

namespace common\modules\comments\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii2mod\comments\models\CommentModel;
use yii2mod\comments\traits\ModuleTrait;

/**
 * Class ManageController
 *
 * @package yii2mod\comments\controllers
 */
class ManageController extends Controller
{
    use ModuleTrait;

    /**
     * @var string path to index view file, which is used in admin panel
     */
    public $indexView = '@common/modules/comments/views/manage/index';

    /**
     * @var string path to update view file, which is used in admin panel
     */
    public $updateView = '@common/modules/comments/views/manage/update';

    /**
     * @var string search class name for searching
     */
    public $searchClass = 'common\modules\comments\models\search\CommentSearch';

    /**
     * @var array verb filter config
     */
    public $verbFilterConfig = [
        'class' => 'yii\filters\VerbFilter',
        'actions' => [
            'index' => ['get'],
            'update' => ['get', 'post'],
            'delete' => ['post'],
        ],
    ];

    /**
     * @var array access control config
     */
    public $accessControlConfig = [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'roles' => ['admin','CommentsModerator'],
            ],
        ],
    ];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => $this->verbFilterConfig,
            'access' => $this->accessControlConfig,
        ];
    }

    /**
     * Lists all comments.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('commentsModerPermission', [])) {
            $this->layout = '/comment-moder';
        }
        if (Yii::$app->user->can('adminPermission', []) ) {
            $this->layout = '/main';
        }

        $searchModel = Yii::createObject($this->searchClass);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $commentModel = $this->getModule()->commentModelClass;

        return $this->render($this->indexView, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'commentModel' => $commentModel,
        ]);
    }

    /**
     * Updates an existing CommentModel.
     *
     * If update is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.comments', 'Comment has been saved.'));

            return $this->redirect(['index']);
        }
        if ($model->errors) {
            var_dump($model->errors); die;
        }

        return $this->render($this->updateView, [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing comment with children.
     *
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithChildren();
        Yii::$app->session->setFlash('success', Yii::t('yii2mod.comments', 'Comment has been deleted.'));

        return $this->redirect(['index']);
    }

    /**
     * Finds the CommentModel based on its primary key value.
     *
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @throws NotFoundHttpException if the model cannot be found
     *
     * @return CommentModel
     */
    protected function findModel($id)
    {
        $commentModel = $this->getModule()->commentModelClass;

        if (null !== ($model = $commentModel::findOne($id))) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii2mod.comments', 'The requested page does not exist.'));
        }
    }
}
