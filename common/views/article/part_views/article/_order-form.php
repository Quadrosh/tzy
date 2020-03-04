<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;
use \common\models\Visit;


$preorderForm = new \common\models\Preorders();
$session = Yii::$app->session;

if (!isset($id)) {
    $id = 'preorder_form';
}
$fromPage =  $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


?>
<?php $form = ActiveForm::begin([
    'action' =>['site/order'],
    'id' => $id,
    'method' => 'post',]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'dispatch')
                ->textInput(['required' => true,'id' => $id.'-dispatch'])->label('Откуда') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'destination')
                ->textInput(['required' => true,'id' => $id.'-destination'])->label('Куда') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'phone')
                ->textInput(['required' => true,'id' => $id.'-phone']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'email')
                ->textInput(['maxlength' => true,'id' => $id.'-email']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'cargo')
                ->textInput(['required' => true,'id' => $id.'-cargo'])->label('Характер груза')  ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'weight')
                ->textInput(['maxlength' => true,'id' => $id.'-weight'])->label('Вес')  ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($preorderForm, 'text')
                ->textarea(['rows' => 1,'id' => $id.'-text'])->label('Комментарий') ?>
        </div>


        <?= $form->field($preorderForm, 'from_page')
            ->hiddenInput(['value'=>$fromPage ,'id' => $id.'-from_page'])->label(false) ?>

        <?= $form->field($preorderForm, 'utm_source')
            ->hiddenInput(['value'=> Visit::getUtm('utm_source'), 'id' => $id.'-utm_source'])->label(false) ?>

        <?= $form->field($preorderForm, 'utm_medium')
            ->hiddenInput(['value'=> Visit::getUtm('utm_medium'), 'id' => $id.'-utm_medium'])->label(false) ?>

        <?= $form->field($preorderForm, 'utm_campaign')
            ->hiddenInput(['value'=> Visit::getUtm('utm_campaign'), 'id' => $id.'-utm_campaign'])->label(false) ?>

        <?= $form->field($preorderForm, 'utm_term')
            ->hiddenInput(['value'=> Visit::getUtm('utm_term'), 'id' => $id.'-utm_term'])->label(false) ?>

        <?= $form->field($preorderForm, 'utm_content')
            ->hiddenInput(['value'=> Visit::getUtm('utm_content'), 'id' => $id.'-utm_content'])->label(false) ?>

        <div class="col-sm-6 col-sm-offset-3 text-center mt50 mb100">
            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-primary sendorder-btn mt10']) ?>
        </div>
    </div>
<?php $form = ActiveForm::end(); ?>