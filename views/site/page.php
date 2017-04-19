<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;

?>

    <h1 class="text-center"><?= $page->pagehead ?></h1>




            <?= $page->text ?>

<div class="text-center">
    <?= Html::a('Оформить заявку', '#orderForm',['class' => 'btn btn-primary order-btn mt10 mb20', 'data-toggle'=>'collapse']) ?>
</div>

<?php Pjax::begin(); ?>
<?//= Html::beginForm(['site/order'], 'post', ['data-pjax' => '', 'class' => 'form-group']); ?>
<div class="feedback-form panel-collapse collapse" id="orderForm">

    <?php $form = ActiveForm::begin(['action' =>['site/order'], 'id' => 'order', 'method' => 'post',]); ?>


    <div class="row">
        <div class="col-sm-6"><?= $form->field($feedbackForm, 'user_id')->textInput(['required' => true])->label('Откуда') ?></div>
        <div class="col-sm-6"><?= $form->field($feedbackForm, 'city')->textInput(['required' => true])->label('Куда') ?></div>

        <div class="col-sm-6"><?= $form->field($feedbackForm, 'phone')->textInput(['required' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($feedbackForm, 'email')->textInput(['maxlength' => true]) ?></div>

        <div class="col-sm-6"><?= $form->field($feedbackForm, 'name')->textInput(['required' => true])->label('Характер груза')  ?></div>
        <div class="col-sm-6"><?= $form->field($feedbackForm, 'contacts')->textInput(['maxlength' => true])->label('Вес')  ?></div>

        <div class="col-sm-12"> <?= $form->field($feedbackForm, 'text')->textarea(['rows' => 1])->label('Комментарий') ?></div>
        <?= $form->field($feedbackForm, 'from_page')->hiddenInput(['value'=>$page->hrurl])->label(false) ?>
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-primary sendorder-btn mt10']) ?>
        </div>
    </div>


    <?php $form = ActiveForm::end(); ?>


</div>
<?php Pjax::end(); ?>
