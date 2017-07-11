<?php

namespace app\controllers;

use app\models\LandingPage;
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
//                'layout'=> '@app/views/layouts/clear.php',
            ],

        ];
    }


    /**
     * Displays test.
     *
     */
    public function actionPage()
    {
        Url::remember();
        $PageName = Yii::$app->request->get('landingpage');
        if ($PageName!=null) {
            $this->landingPage = LandingPage::find()->where(['hrurl'=>$PageName])->one();
            if ($this->landingPage->layout == null) {
                $this->layout = 'clear';
            } else {
                $this->layout = $this->landingPage->layout;
            }
//            $this->test = Test::find()->where(['id'=> $this->testPage['test_id']])->one();
//
        }

//        $oldViews = $this->testPage['sendtopage'];
//        $newViews = $oldViews+1;
//        $this->testPage['sendtopage']= $newViews;
//        $this->testPage->save();
//        $this->view->params['feedback'] = new Feedback();
//        $this->view->params['preorderForm'] = new Preorders();
//
//        if (!empty($this->testPage->layout)) {
//            $this->layout = $this->testPage->layout;
//        }


//        if ($this->testPage == false) {
//            $this->view->params['feedback'] = new Feedback();
//            throw new \yii\web\NotFoundHttpException('Страница не существует');
//        };
//        $pageName = 'testPage-'. $this->testPage->id;
//        $this->view->params['pageName']=$pageName;
//        $this->view->params['currentItem'] = '1';
//        $this->view->params['meta']['seo_logo'] = $this->testPage->title;
//        $this->view->params['meta']['title'] = $this->testPage->title;
//        $this->view->params['meta']['description'] = $this->testPage->description;
//        $this->view->params['meta']['keywords'] = $this->testPage->keywords;
//        $this->view->params['page']= $this->testPage;
//        $feedbackForm = new Feedback();
//        $preorderForm = new Preorders();
//
//        if (!empty($this->testPage->view)) {
//            return $this->render($this->testPage->view,[
//                'page' => $this->testPage,
//                'feedbackForm' => $feedbackForm,
//                'preorderForm' => $preorderForm,
//                'pageName' => $pageName,
//            ]);
//        }
        return $this->render($this->landingPage->view,[
            'page' => $this->landingPage,
//            'feedbackForm' => $feedbackForm,
//            'preorderForm' => $preorderForm,
//            'pageName' => $pageName,
        ]);
    }







}
