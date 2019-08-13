<?php

namespace common\modules\comments\controllers;

use common\models\FrontUser;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use common\modules\comments\events\CommentEvent;
use common\modules\comments\models\CommentModel;
use common\modules\comments\traits\ModuleTrait;
use yii2mod\editable\EditableAction;

/**
 * Class DefaultController
 *
 * @package yii2mod\comments\controllers
 */
class DefaultController extends Controller
{
    use ModuleTrait;

    /**
     * Event is triggered before creating a new comment.
     * Triggered with yii2mod\comments\events\CommentEvent
     */
    const EVENT_BEFORE_CREATE = 'beforeCreate';

    /**
     * Event is triggered after creating a new comment.
     * Triggered with yii2mod\comments\events\CommentEvent
     */
    const EVENT_AFTER_CREATE = 'afterCreate';

    /**
     * Event is triggered before deleting the comment.
     * Triggered with yii2mod\comments\events\CommentEvent
     */
    const EVENT_BEFORE_DELETE = 'beforeDelete';

    /**
     * Event is triggered after deleting the comment.
     * Triggered with yii2mod\comments\events\CommentEvent
     */
    const EVENT_AFTER_DELETE = 'afterDelete';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'quick-edit' => [
                'class' => EditableAction::class,
                'modelClass' => CommentModel::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => HttpBearerAuth::class,
//                'only' => $this->allActions,
                'only' => ['quick-edit', 'delete','create'],
                'optional' => ['create'],
            ],
            'access' => [
                'class' => AccessControl::class,
                'only' => ['quick-edit', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'create' => ['post'],
                    'delete' => ['post', 'delete'],
                ],
            ],
            'contentNegotiator' => [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['create'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    /**
     * Create a comment.
     *
     * @param $entity string encrypt entity
     *
     * @return array
     */
    public function actionCreate($entity)
    {
//        var_dump($entity); die;
        /* @var $commentModel CommentModel */
        $commentModel = Yii::createObject($this->getModule()->commentModelClass);
        $event = Yii::createObject(['class' => CommentEvent::class, 'commentModel' => $commentModel]);
        $commentModel->setAttributes($this->getCommentAttributesFromEntity($entity));
        $this->trigger(self::EVENT_BEFORE_CREATE, $event);

//        Yii::$app->user->logout();

        if ($commentModel->load(Yii::$app->request->post())) {

            if (Yii::$app->user->isGuest) { // пользователь не авторизован

                if (!FrontUser::findByEmail($commentModel->email)) {
                    $user = FrontUser::create($commentModel->email,$commentModel->name);

                } else {
                    $user = FrontUser::findByEmail($commentModel->email);
                    $subject = 'tszakaz.ru - подтверждение email';



                    Yii::$app->mailer->htmlLayout = "layouts/montserrat";
                    $mail =  Yii::$app->mailer
                        ->compose(
                            ['html' => 'goToLink-html', 'text' => 'goToLink-text'],
                            [
                                'link' => Yii::$app->params['confirmFrontUserEmailLink'].$user->auth_key,
                                'header'=> 'Подтверждение email',
                                'name' => $user->username,
                                'text' => 'Для подтверждения email',
                                'button' => 'Подтвердить',
                            ]
                        )
                        ->setFrom(Yii::$app->params['noreplyEmail'])
                        ->setTo($commentModel->email)
                        ->setSubject($subject)
                        ->send();


//                    $mail = Yii::$app->mailer->compose()
//                        ->setTo($commentModel->email)
//                        ->setFrom('sender@'.Yii::$app->params['site'])
//                        ->setSubject($subject)
//                        ->setHtmlBody(
//                            "Здравствуйте <br>".
//                            " Для подтверждения email на сайте ".Yii::$app->params['site'] .
//                            " <br/> перейдите по ссылке " .
//                            Yii::$app->params['confirmFrontUserEmailLink'].$user->auth_key
//                        )
//                        ->send();

                    $error = 'Данный email уже зарегистрирован. На этот адрес отправлен запрос. Перейдите по ссылке в письме, для подтверждения, что это Ваш email.';
                    $commentModel->addError('commentmodel-email', $error);


                    return [
                        'status' => 'error',
                        'errors' => $commentModel['errors'],
                        'message' => $error
                    ];

                }

            }

            if ($commentModel->load(Yii::$app->request->post()) && $commentModel->saveComment()) {
                $this->trigger(self::EVENT_AFTER_CREATE, $event);

                return ['status' => 'success'];
            }
        }


        return [
            'status' => 'error',
            'errors' => ActiveForm::validate($commentModel),
        ];
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

//        return $this->redirect(Url::previous());
        return $this->goBack();
//        return ['status' => 'success'];
    }

    /**
     * Delete comment.
     *
     * @param int $id Comment ID
     *
     * @return string Comment text
     */
    public function actionDelete($id)
    {
        $commentModel = $this->findModel($id);
        $commentModel->setScenario(CommentModel::SCENARIO_MODERATION);
        $event = Yii::createObject(['class' => CommentEvent::class, 'commentModel' => $commentModel]);
        $this->trigger(self::EVENT_BEFORE_DELETE, $event);

        if ($commentModel->markRejected()) {
            $this->trigger(self::EVENT_AFTER_DELETE, $event);

            return Yii::t('yii2mod.comments', 'Comment has been deleted.');
        } else {
            Yii::$app->response->setStatusCode(500);

            return Yii::t('yii2mod.comments', 'Comment has not been deleted. Please try again!');
        }
    }

    /**
     * Find model by ID.
     *
     * @param int|array $id Comment ID
     *
     * @return CommentModel
     *
     * @throws NotFoundHttpException
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

    /**
     * Get list of attributes from encrypted entity
     *
     * @param $entity string encrypted entity
     *
     * @return array|mixed
     *
     * @throws BadRequestHttpException
     */
    protected function getCommentAttributesFromEntity($entity)
    {
        $decryptEntity = Yii::$app->getSecurity()->decryptByKey(utf8_decode($entity), $this->getModule()->id);
        if (false !== $decryptEntity) {
            return Json::decode($decryptEntity);
        }

        throw new BadRequestHttpException(Yii::t('yii2mod.comments', 'Oops, something went wrong. Please try again later.'));
    }
}
