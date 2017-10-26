<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use app\models\LoginForm;
use yii\helpers\Url;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AdminController
{
    public $layout = 'login';
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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Url::remember();
        if (Yii::$app->user->can('adminPermission', [])) {
            $this->layout = 'admin';
        }
        elseif (Yii::$app->user->can('statPermission', [])) {
            $this->layout = 'stat';
        }

        return $this->render('index');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        Url::remember();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (Yii::$app->user->can('adminPermission', [])) {
                return $this->redirect('/admin/landingpage/stat?days=7&noempty=1');
            }
            elseif (Yii::$app->user->can('statPermission', [])) {
                return $this->redirect('/admin/preorders/lead-quality');
            }
            else {
                return $this->redirect('/admin');
            }

        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
