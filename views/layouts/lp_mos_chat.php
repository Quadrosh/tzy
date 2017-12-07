<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use app\models\ChatMessage;
use \app\models\ChatItem;

app\assets\LpMosChatAsset::register($this);

$chat = Yii::$app->view->params['chat'];
//$session = Yii::$app->session;
//$chat = $session['chat'];
//var_dump($chat); die;

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title> <?= Yii::$app->view->params['meta']['title'] ?> </title>
    <meta name="description" content="<?= Yii::$app->view->params['meta']['description'] ?>">
    <meta name="keywords" content="<?= Yii::$app->view->params['meta']['keywords'] ?>">

    <?php $this->head() ?>
    <?php include_once("analyticstracking.php") ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">

    <?= $content ?>

    <div id="chatWrapper">
        <div id="chatIconBox" >
            <i class="fa fa-comment-o" aria-hidden="true"></i>
        </div>

        <div id="mainChatWindow">
            <div id="chatWindowClose">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </div>

            <div class="topPanel">

                <p>Онлайн - консультант</p>
            </div>
            <div class="chatFieldWrap">




                <?php Pjax::begin([
                    'id' => 'chatPjax',
                    'timeout' => 2000,
                    'enablePushState' => false
                ]); ?>

                <?php

                if (!isset($chat)) {
                    $chat = new ChatItem();
                }
                $newMessage = new ChatMessage();

                if (!isset($chatDataProvider)) {
                    $chatDataProvider = new \yii\data\ActiveDataProvider([
                        'query' => ChatMessage::find()->where(['chat_id'=>$chat['id']]),
                    ]);}
                ?>

                <?php echo \yii\widgets\ListView::widget([
                    'dataProvider' => $chatDataProvider,
                    'summary' => '',
                    'itemView' => '_chat_list_item',
                ]);?>


                <?php $form = ActiveForm::begin([
                    'id'=>'chatMessage',
                    'action' => ['/chat/post'],
                    'options' => ['data-pjax' => true ]
                ]); ?>
                <?= $form->field($newMessage, 'text')
                    ->textarea()
                    ->label(false) ?>

                <?= Html::submitButton('Послать <i class="fa fa-share" aria-hidden="true"></i>', ['class' => 'btn btn-primary btn-xs']) ?>
                <?php ActiveForm::end() ?>


                <?php Pjax::end(); ?>





            </div>

        </div>
    </div>






</div>






<?php $this->endBody() ?>

<!-- Yandex.Metrika NEW counter -->
<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter30134129 = new Ya.Metrika({ id:30134129, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/30134129" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
<?php $this->endPage() ?>
