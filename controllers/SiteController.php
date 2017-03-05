<?php

namespace app\controllers;

use app\models\MenuTop;
use app\models\Pages;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Feedback;

class SiteController extends Controller
{
    public $layout = 'main';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'home';
        $this->view->params['feedback'] = new Feedback();

        $pageName = 'about';
        $this->view->params['currentItem'] = 1;
        $this->view->params['pageName']=$pageName;

        $page = Pages::find()->where(['hrurl'=>$pageName])->one();
        if (trim(strtolower($page->seo_logo)) =='title') {
            $page->seo_logo = $page->title;
        }
        $this->view->params['meta']=$page;
        return $this->render('page',[
            'page' => $page,
        ]);
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionPage()
    {

        $pageName = Yii::$app->request->get('pagename');
        $this->view->params['feedback'] = new Feedback();

        $page = Pages::find()->where(['hrurl'=>$pageName])->one();
        $topMenuItem = MenuTop::find()->where(['link'=>$pageName.'.html'])->one();
        $this->view->params['pageName']=$pageName;
        $this->view->params['currentItem'] = $topMenuItem['id'];
        if (trim(strtolower($page->seo_logo)) =='title') {
            $page->seo_logo = $page->title;
        }
        $this->view->params['meta']=$page;
        if ($pageName == 'sitemap') {
            return $this->render('sitemap',[
                'page' => $page,
            ]);
        }
        return $this->render('page',[
            'page' => $page,
        ]);


    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }




    public function actionFeedback()
    {
        $data = Yii::$app->request->post('Feedback');
//        var_dump($data); die;
        $feedback = new Feedback();
        $feedback->name = $data['name'];
        $feedback->city = '';
        $feedback->phone = $data['phone'];
        $feedback->from_page = $data['from_page'];
        $feedback->user_id = '';
        $feedback->email = 'no-email@that.form';
        $feedback->contacts = '';
        $feedback->text =  '';
        $feedback->date = '';
        $feedback->done = '';


        if ($feedback->load(Yii::$app->request->post()) && $feedback->save()) {
//            echo 'success';  die;


            if ($feedback->sendEmail( 'заявка с сайта Трансзаказ, ')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {

            echo 'error, try again';  die;
            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com');
            return $this->redirect(Url::previous());
        }

    }
}
