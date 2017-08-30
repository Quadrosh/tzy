<?php

namespace app\controllers;

use app\models\MenuTop;
use app\models\Pages;
use app\models\Preorders;
use app\models\PreordersCaptcha;
use app\models\TestPage;
use app\models\TestTarget;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Feedback;
use yii\web\HttpException;
use yii\base\ErrorException;

class SiteController extends Controller
{
    public $layout = 'main';
    public $defaultAction = 'index';
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
        return
            [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@app/views/site/custom_error.php',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
//    public function actionError()
//    {
//
//    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Url::remember();

        $this->layout = 'home';
        $this->view->params['feedback'] = new Feedback();
        $feedbackForm = new Feedback();
        $preorderForm = new Preorders();
//        $preorderForm = new PreordersCaptcha();

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
            'feedbackForm' => $feedbackForm,
            'preorderForm' => $preorderForm,
        ]);
    }

    /**
     * Displays page.
     *
     * @return string
     */
    public function actionPage()
    {
        Url::remember();
        $pageName = Yii::$app->request->get('pagename');
        $feedbackForm = new Feedback();
        $preorderForm = new Preorders();

        $page = Pages::find()->where(['hrurl'=>$pageName])->one();
        if ($page == false) {
//            $this->layout = 'error';
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        };

        if (!empty($page->layout)) {
            $this->layout = $page->layout;
        }

        $this->view->params['feedback'] = new Feedback();

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
                'feedbackForm' => $feedbackForm,
                'preorderForm' => $preorderForm,
            ]);
        }
        if (!empty($page->view)) {
            return $this->render($page->view,[
                'page' => $page,
                'feedbackForm' => $feedbackForm,
                'preorderForm' => $preorderForm,
            ]);
        }
        return $this->render('page',[
            'page' => $page,
            'feedbackForm' => $feedbackForm,
            'preorderForm' => $preorderForm,
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
//        $data = Yii::$app->request->post('Feedback');
        $feedback = new Feedback();
//        $feedback->name = $data['name'];
//        $feedback->city = '';
//        $feedback->phone = $data['phone'];
//        $feedback->from_page = $data['from_page'];
//        $feedback->user_id = '';
//        $feedback->email = 'no-email@that.form';
//        $feedback->contacts = '';
//        $feedback->text =  '';
//        $feedback->date = '';
//        $feedback->done = '';
        if ($feedback->load(Yii::$app->request->post()) && $feedback->save()) {
            if ($feedback->sendEmail( 'TSZAKAZ.RU: Запрос обратного звонка')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {
            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com');
            return $this->redirect(Url::previous());
        }

    }



    public function actionOrder()
    {
//        $data = Yii::$app->request->post('Preorders');
        $preorder = new Preorders();
//        $preorder->dispatch = $data['dispatch']; //откуда
//        $preorder->destination = $data['destination']; // куда
//        $preorder->phone = $data['phone']; // телефон
//        $preorder->email = $data['email']; // email
//        $preorder->cargo = $data['cargo']; // характер груза
//        $preorder->weight = $data['weight']; // вес
//        $preorder->text = $data['text']; // комментарий
//        $preorder->from_page = $data['from_page'];
//        $preorder->date = '';
//        $preorder->done = '';

//        $preorder->utm_source = $data['utm_source'];
//        $preorder->utm_medium = $data['utm_medium'];
//        $preorder->utm_campaign = $data['utm_campaign'];
//        $preorder->utm_term = $data['utm_term'];
//        $preorder->utm_content = $data['utm_content'];

//        if ($preorder->save()) {
        if ($preorder->load(Yii::$app->request->post()) && $preorder->save()) {
            if ($preorder->sendEmail( 'TSZAKAZ.RU: Заявка на грузоперевозку')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com');
            return $this->redirect(Url::previous());
        }

    }
    public function actionOrdercaptcha()
    {
        $data = Yii::$app->request->post('PreordersCaptcha');
        $preorder = new Preorders();
        $preorder->dispatch = $data['dispatch']; //откуда
        $preorder->destination = $data['destination']; // куда
        $preorder->phone = $data['phone']; // телефон
        $preorder->email = $data['email']; // email
        $preorder->cargo = $data['cargo']; // характер груза
        $preorder->weight = $data['weight']; // вес
        $preorder->text = $data['text']; // комментарий
        $preorder->from_page = $data['from_page'];
        $preorder->date = '';
        $preorder->done = '';
        if ($preorder->save()) {
            if ($preorder->sendEmail( 'TSZAKAZ.RU: Заявка на грузоперевозку')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com');
            return $this->redirect(Url::previous());
        }

    }


}
