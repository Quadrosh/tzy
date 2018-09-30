<?php

namespace tszakaz_ru\controllers;

use common\models\Menu;
use common\models\RateLimit;
use common\models\MenuTop;
use common\models\Pages;
use common\models\Preorders;
use common\models\PreordersCaptcha;
use common\models\Sitemap;
use common\models\TestPage;
use common\models\TestTarget;
use common\models\Visit;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use common\models\ContactForm;
use common\models\Feedback;
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
            'rateLimiter' => [
                'class' => \yii\filters\RateLimiter::className(),
                'user'=> new RateLimit()
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

        $pageName = 'home';
        $this->view->params['currentItem'] = 1;
        $this->view->params['pageName']=$pageName;

        $page = Pages::find()->where([
            'site'=>Yii::$app->params['site'],
            'hrurl'=>$pageName
        ])->one();
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
        $hrurl = Yii::$app->request->get('pagename');

        if ($hrurl == 'gruzoperevozki') {
            return $this->gruzoperevozkiPage();
        }
        $utm = $this->getUtm();

        $page = Pages::find()->where([
            'site'=>Yii::$app->params['site'],
            'hrurl'=>$hrurl
        ])->one();
        if ($page == false) {
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        };
        if ($page->status == 'article') {
            return Yii::$app->runAction('article/page', ['hrurl' => $hrurl]);
        }

        if (!empty($page->layout)) {
            $this->layout = $page->layout;
        }

        $this->view->params['feedback'] = new Feedback();

        $topMenuItem = MenuTop::find()->where([
            'site'=>Yii::$app->params['site'],
            'link'=>$hrurl.'.html'
        ])->one();
        $this->view->params['pageName']=$hrurl;
        $this->view->params['currentItem'] = $topMenuItem['id'];
        if (trim(strtolower($page->seo_logo)) =='title') {
            $page->seo_logo = $page->title;
        }
        $this->view->params['meta']=$page;
        if ($hrurl == 'sitemap') {
            return $this->render('sitemap',[
                'page' => $page,
            ]);
        }
        if (!empty($page->view)) {
            return $this->render($page->view,[
                'page' => $page,
                'utm' => $utm,
            ]);
        }
        return $this->render('page',[
            'page' => $page,
            'utm' => $utm,
        ]);


    }

    private function gruzoperevozkiPage(){

        $hrurl = 'gruzoperevozki';
        $page = Pages::find()->where([
            'site'=>Yii::$app->params['site'],
            'hrurl'=>$hrurl
        ])->one();
        $utm = $this->getUtm();
        $this->view->params['meta']=$page;
        $this->view->params['pageName']=$hrurl;

        $category = Menu::find()->where(['url'=>'gruzoperevozki.html'])->one();
        $childs = $category->children(1)->all();
//        var_dump($childs);


        return $this->render('page_gruzoperevozki_index',[
            'page' => $page,
            'utm' => $utm,
            'pages'=>$childs
        ]);

    }

    public function actionSitemap()
    {
        $this->layout = 'clear';


//        var_dump('adsf'); die;

        $sitemap = new Sitemap();

        if (true or !$xml_sitemap = Yii::$app->cache->get('sitemap')) {

            $urls = $sitemap->getUrl();

            $xml_sitemap = $sitemap->getXml($urls);

            Yii::$app->cache->set('sitemap', $xml_sitemap, 3600*12);
        }

        $sitemap->showXml($xml_sitemap);
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
        $feedback = new Feedback();
        if ($feedback->load(Yii::$app->request->post())) {
            $spamOrders = Preorders::find()
                ->where(['ip'=>Yii::$app->request->userIP])
                ->andWhere(['>','date',time()-86400])
                ->all();
            $spamFeedbacks = Feedback::find()
                ->where(['ip'=>Yii::$app->request->userIP])
                ->andWhere(['>','date',time()-86400])
                ->all();

            if (count($spamOrders) + count($spamFeedbacks) > 5) {
                Yii::$app->session->setFlash('error', 'Вы достигли лимита отправляемых заявок. <br> Свяжитесь с нами по телефону');
                return $this->redirect(Url::previous());
            }
            $feedback['site'] = Yii::$app->params['site'];
            $feedback['ip'] = Yii::$app->request->userIP;
            if ( $feedback->save()) {
                if ($feedback->sendEmail( Yii::$app->params['site'].': Запрос обратного звонка')) {
                    Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                    return $this->redirect(Url::previous());
                } else {
                    Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                    return $this->redirect(Url::previous());
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка сохранения заявки. Оформите заявку по телефону.');
                return $this->redirect(Url::previous());
            }

        } else {
            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com или оформите заявку по телефону');
            return $this->redirect(Url::previous());
        }

    }



    public function actionOrder()
    {
        $preorder = new Preorders();
        if ($preorder->load(Yii::$app->request->post())) {
            $spamOrders = Preorders::find()
                ->where(['ip'=>Yii::$app->request->userIP])
                ->andWhere(['>','date',time()-86400])
                ->all();
            $spamFeedbacks = Feedback::find()
                ->where(['ip'=>Yii::$app->request->userIP])
                ->andWhere(['>','date',time()-86400])
                ->all();
            if ( count($spamOrders) + count($spamFeedbacks) > 5) {
                Yii::$app->session->setFlash('error', 'Вы достигли лимита отправляемых заявок. <br> Свяжитесь с нами по телефону');
                return $this->redirect(Url::previous());
            }
            $preorder['site'] = Yii::$app->params['site'];
            $preorder['ip'] = Yii::$app->request->userIP;
            if ($preorder->save()) {
                if ($preorder->sendEmail( Yii::$app->params['site'].': Заявка на грузоперевозку')) {
                    Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                    return $this->redirect(Url::previous());
                } else {
                    Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                    return $this->redirect(Url::previous());
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка сохранения заявки. Оформите заявку по телефону.');
                return $this->redirect(Url::previous());
            }
        } else {

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com или оформите заявку по телефону');
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


    public function getUtm()
    {
        $utm = [];
        $session = Yii::$app->session;

        if (Yii::$app->request->get('utm_source')) {
            // UTM из GET
            $utm['source'] = Yii::$app->request->get('utm_source');
            $utm['medium'] = Yii::$app->request->get('utm_medium');
            $utm['campaign'] = Yii::$app->request->get('utm_campaign');
            $utm['term'] = Yii::$app->request->get('utm_term');
            $utm['content'] = Yii::$app->request->get('utm_content');

            // сохранение в сессию
            if (Yii::$app->request->get('utm_source')!= null) {
                $session['utm_source'] = $utm['source'];
                $session['utm_medium'] = $utm['medium'];
                $session['utm_campaign'] = $utm['campaign'];
                $session['utm_term'] = $utm['term'];
                $session['utm_content'] = $utm['content'];
            }
        } else {
            if ($session['utm_source']) {
                $utm['source'] = $session['utm_source'];
                $utm['medium'] = $session['utm_medium'];
                $utm['campaign'] = $session['utm_campaign'];
                $utm['term'] = $session['utm_term'];
                $utm['content'] = $session['utm_content'];
            } else { // если там что то есть
                $utm['source'] = Yii::$app->request->get('utm_source');
                $utm['medium'] = Yii::$app->request->get('utm_medium');
                $utm['campaign'] = Yii::$app->request->get('utm_campaign');
                $utm['term'] = Yii::$app->request->get('utm_term');
                $utm['content'] = Yii::$app->request->get('utm_content');
            }
        }

        //сохр визита в статистику
        $visit = new Visit();
        $visit['ip'] = Yii::$app->request->userIP;
        $visit['site'] = Yii::$app->params['site'];
        $visit['lp_hrurl'] = '';
        $visit['url'] = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $visit['utm_source']=$utm['source'];
        $visit['utm_medium']=$utm['medium'];
        $visit['utm_campaign']=$utm['campaign'];
        $visit['utm_term']=$utm['term'];
        $visit['utm_content']=$utm['content'];
        $visit['qnt']=1;
        $visit->save();

        return $utm;

    }
}
