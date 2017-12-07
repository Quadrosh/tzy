<?php

namespace app\controllers;

use app\models\ChatMessage;
use Yii;
use app\models\ChatItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChatitemController implements the CRUD actions for ChatItem model.
 */
class ChatController extends Controller
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

    public function actionPost()
    {
//        $message = Yii::$app->request->get('message');
//        $cookies = Yii::$app->request->cookies;
//        $userId = Yii::$app->request->csrfToken;

        if (!isset(Yii::$app->request->cookies['userCookiesId'])) {
            $userId = Yii::$app->request->csrfToken;
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'userCookiesId',
                'value' => $userId,
            ]));
        } else {
            $userId = Yii::$app->request->cookies['userCookiesId'];
        }
        $chat = ChatItem::find()->where(['user_id'=>$userId])->one();

        if ($chat == null) {
            $chat = new ChatItem();
            $chat['user_id'] = $userId;
            $chat->save();
        }
        $message = new ChatMessage();
        $request = Yii::$app->request->post('ChatMessage');

        $message['text'] = $request['text'];
        $message['chat_id'] = $chat['id'];

        if (!$message->save()) {
            var_dump($message->errors);
        }


        $dataProvider = new ActiveDataProvider([
            'query' => ChatMessage::find()->where(['chat_id'=>$chat['id']]),
        ]);


        return $this->render('chat_instance', [
            'chatDataProvider' => $dataProvider,
            'chat' => $chat,
        ]);
    }

    /**
     * Connect to operator
     * @inheritdoc
     */
    public function actionConnect()
    {
        if (!isset(Yii::$app->request->cookies['userCookiesId'])) {
            $userId = Yii::$app->request->csrfToken;
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'userCookiesId',
                'value' => $userId,
            ]));
        } else {
            $userId = Yii::$app->request->cookies['userCookiesId'];
        }
//        $chat = ChatItem::find()->where(['user_id'=>$userId])->one();

//        if ($chat == null) {
//            $chat = new ChatItem();
//            $chat['user_id'] = $userId;
//            $chat->save();
//        }





        return $userId;
//        return 'here';
    }


}
