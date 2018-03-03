<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\ChatMessage;
use app\models\ChatItem;



?>
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