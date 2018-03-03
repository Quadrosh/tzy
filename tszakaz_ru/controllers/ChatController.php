<?php

namespace tszakaz_ru\controllers;

use common\models\ChatMessage;
use Yii;
use common\models\ChatItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\ContentNegotiator;
use yii\web\Response;



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
            'contentNegotiator' => [
                'class'   => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            //            'rateLimiter'       => [
//                'class' => RateLimiter::className(),
//            ],

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


    public function beforeAction($action)
    {
        if (in_array($action->id, ['bot'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actionBot()
    {
        $message = Yii::$app->request->post('message'); // array
        $callbackQuery = Yii::$app->request->post('callback_query'); // array

        if ($message['text'] == '/start') {
            $this->sendMessage([
                'chat_id' => $message['from']['id'],  // $message['from']['id']
                'text' => 'Привет, я бот Перевозки Фурой, ниже список опций',
                'reply_markup' => json_encode([
                    'inline_keyboard'=>[
                        [
                            ['text'=>"Кнопка",'callback_data'=> 'motivatorList/you/1'],
                        ],
                    ]
                ]),
            ]);

        }

        return 'final return';
    }

    public function sendMessage(array $option){
        $chat_id = $option['chat_id'];
        $text = urlencode($option['text']);
        unset($option['chat_id']);
        unset($option['text']);
        $jsonResponse = $this->curlCall("https://api.telegram.org/bot" .
            Yii::$app->params['botToken'].
            "/sendMessage?chat_id=".$chat_id .
            '&text='.$text, $option);
        return json_decode($jsonResponse);
    }

    private function curlCall($url, $option=array(), $headers=array())
    {
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video'];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "Telebot");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (count($option)) {
            curl_setopt($ch, CURLOPT_POST, true);
            foreach($attachments as $attachment){
                if(isset($option[$attachment])){
                    $option[$attachment] = $this->curlFile($option[$attachment]);
                    break;
                }
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $option);
        }
        $r = curl_exec($ch);
        if($r == false){
            $text = 'error '.curl_error($ch);
            $myfile = fopen("error_telegram.log", "w") or die("Unable to open file!");
            fwrite($myfile, $text);
            fclose($myfile);
        }
        curl_close($ch);
        return $r;
    }

    private function curlFile($path)
    {
        if (is_array($path))
            return $path['file_id'];
        $realPath = realpath($path);
        if (class_exists('CURLFile'))
            return new \CURLFile($realPath);
        return '@' . $realPath;
    }

    /**
     *   @var array
     *   $this->answerCallbackQuery([
     *       'callback_query_id' => '3343545121', //require
     *       'text' => 'text', //Optional
     *       'show_alert' => 'my alert',  //Optional
     *       'url' => 'http://sample.com', //Optional
     *       'cache_time' => 123231,  //Optional
     *   ]);
     *   The answer will be displayed to the user as a notification at the top of the chat screen or as an alert.
     *  On success, True is returned.
     */
    public function answerCallbackQuery(array $option = [])
    {
        $jsonResponse = $this->curlCall("https://api.telegram.org/bot" .
            Yii::$app->params['botToken'] .
            "/answerCallbackQuery", $option);
        return json_decode($jsonResponse);
    }

}
