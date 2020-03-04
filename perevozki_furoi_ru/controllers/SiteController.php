<?php
namespace perevozki_furoi_ru\controllers;

use common\models\Feedback;
use common\models\Preorders;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
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

            if (count($spamOrders) + count($spamFeedbacks) > Yii::$app->params['spamCount']) {
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
            if ( count($spamOrders) + count($spamFeedbacks) > Yii::$app->params['spamCount']) {
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

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, оформите заявку по телефону');
            return $this->redirect(Url::previous());
        }

    }
}
