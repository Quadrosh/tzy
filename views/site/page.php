<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\widgets\Alert;

?>
<?= Alert::widget() ?>
    <h1 class="text-center"><?= $page->pagehead ?></h1>




            <?= $page->text ?>

<div class="text-center">
    <?= Html::a('Оформить заявку', '#orderForm',['class' => 'btn btn-primary order-btn mt10 mb20', 'data-toggle'=>'collapse']) ?>
</div>

<div class="feedback-form panel-collapse collapse" id="orderForm">
    <?php $form = ActiveForm::begin(['action' =>['site/order'], 'method' => 'post',]); ?>
<!--    --><?php //$form = ActiveForm::begin(['action' =>['site/ordercaptcha'], 'method' => 'post',]); ?>
    <div class="row">
        <div class="col-sm-6"><?= $form->field($preorderForm, 'dispatch')->textInput(['required' => true])->label('Откуда') ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'destination')->textInput(['required' => true])->label('Куда') ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'phone')->textInput(['required' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'email')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'cargo')->textInput(['required' => true])->label('Характер груза')  ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'weight')->textInput(['maxlength' => true])->label('Вес')  ?></div>
        <div class="col-sm-12"> <?= $form->field($preorderForm, 'text')->textarea(['rows' => 1])->label('Комментарий') ?></div>
<!--        captcha -->
<!--        <div class="col-sm-12"> --><?//= $form->field($preorderForm, 'captcha')->widget(Captcha::className()) ?><!--</div>-->

        <?= $form->field($preorderForm, 'from_page')->hiddenInput(['value'=>$page->hrurl])->label(false) ?>
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-primary sendorder-btn mt10', 'onclick'=>'yaCounter30134129.reachGoal("preorderSend");']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::end(); ?>
</div>
