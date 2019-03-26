<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

$shortOrderForm = new \common\models\Preorders();


?>
<div class=" shortOrderForm bordered box" >
    <?php $form = ActiveForm::begin([
        'action' =>['/site/order'],
        'id' => 'shortOrderForm',
        'method' => 'post',]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($shortOrderForm, 'dispatch')
                ->textInput(['required' => true,'id' => 'shortOrderForm-dispatch'])->label('Откуда') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($shortOrderForm, 'destination')
                ->textInput(['required' => true,'id' => 'shortOrderForm-destination'])->label('Куда') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($shortOrderForm, 'weight')
                ->textInput(['maxlength' => true,'id' => 'shortOrderForm-weight'])->label('Вес')  ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($shortOrderForm, 'cargo')
                ->textInput(['required' => true,'id' => 'shortOrderForm-cargo'])->label('Характер груза')  ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($shortOrderForm, 'name')
                ->textInput(['required' => true,'id' => 'shortOrderForm-name']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($shortOrderForm, 'phone')
                ->textInput(['required' => true,'id' => 'shortOrderForm-phone']) ?>
        </div>
    </div>
    <div class="row">

        <?= $form->field($shortOrderForm, 'from_page')
            ->hiddenInput(['value'=>$article->hrurl ,'id' => 'shortOrderForm-from_page'])->label(false) ?>

        <?= $form->field($shortOrderForm, 'utm_source')
            ->hiddenInput([ 'id' => 'shortOrderForm-utm_source'])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_medium')
            ->hiddenInput([ 'id' => 'shortOrderForm-utm_medium'])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_campaign')
            ->hiddenInput([ 'id' => 'shortOrderForm-utm_campaign'])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_term')
            ->hiddenInput([ 'id' => 'shortOrderForm-utm_term'])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_content')
            ->hiddenInput([ 'id' => 'shortOrderForm-utm_content'])->label(false) ?>

        <div class="col-sm-6 col-sm-offset-3 text-center">
            <?= Html::submitButton('Уточнить цену', ['class' => 'btn btn-primary sendorder-btn mt10']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::end(); ?>
</div>