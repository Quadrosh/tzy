<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;

?>
<?= Alert::widget() ?>
    <h1 class="text-center"><?= $page->pagehead ?></h1>





            <?= $page->text ?>

<div class="text-center">
    <?= Html::a('Оформить заявку', '#orderForm',['class' => 'btn btn-primary order-btn mt10 mb20', 'data-toggle'=>'collapse']) ?>
</div>

<div class="feedback-form panel-collapse collapse" id="orderForm">
    <?php $form = ActiveForm::begin([
        'action' =>['site/order'],
        'id' => 'order-form',
        'method' => 'post',]); ?>
<!--    --><?php //$form = ActiveForm::begin(['action' =>['site/ordercaptcha'], 'method' => 'post',]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'dispatch')
                ->textInput(['required' => true,'id' => 'preorder_form-dispatch'])->label('Откуда') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'destination')
                ->textInput(['required' => true,'id' => 'preorder_form-destination'])->label('Куда') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'phone')
                ->textInput(['required' => true,'id' => 'preorder_form-phone']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'email')
                ->textInput(['maxlength' => true,'id' => 'preorder_form-email']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'cargo')
                ->textInput(['required' => true,'id' => 'preorder_form-cargo'])->label('Характер груза')  ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($preorderForm, 'weight')
                ->textInput(['maxlength' => true,'id' => 'preorder_form-weight'])->label('Вес')  ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($preorderForm, 'text')
                ->textarea(['rows' => 1,'id' => 'preorder_form-text'])->label('Комментарий') ?>
        </div>
<!--        captcha -->
<!--        <div class="col-sm-12"> --><?//= $form->field($preorderForm, 'captcha')->widget(Captcha::className()) ?><!--</div>-->

        <?= $form->field($preorderForm, 'from_page')
            ->hiddenInput(['value'=>$page->hrurl ,'id' => 'preorder_form-from_page'])->label(false) ?>

        <?= $form->field($preorderForm, 'utm_source')
            ->hiddenInput([ 'id' => 'preorder_form-utm_source'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_medium')
            ->hiddenInput([ 'id' => 'preorder_form-utm_medium'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_campaign')
            ->hiddenInput([ 'id' => 'preorder_form-utm_campaign'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_term')
            ->hiddenInput([ 'id' => 'preorder_form-utm_term'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_content')
            ->hiddenInput([ 'id' => 'preorder_form-utm_content'])->label(false) ?>

        <div class="col-sm-6 col-sm-offset-3 text-center">
            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-primary sendorder-btn mt10']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::end(); ?>
</div>
