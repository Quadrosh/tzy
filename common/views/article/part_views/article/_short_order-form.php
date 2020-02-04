<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

$shortOrderForm = new \common\models\Preorders();
$session = Yii::$app->session;

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
            ->hiddenInput([
                    'value'=>isset($article) ? $article->hrurl : $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ,
                    'id' => 'shortOrderForm-from_page'
            ])->label(false) ?>

        <?= $form->field($shortOrderForm, 'utm_source')
            ->hiddenInput([
                    'value'=>isset($session['utm_source'])?$session['utm_source']:null,
                    'id' => 'shortOrderForm-utm_source',
            ])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_medium')
            ->hiddenInput([
                    'value'=>isset($session['utm_medium'])?$session['utm_medium']:null,
                    'id' => 'shortOrderForm-utm_medium',
            ])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_campaign')
            ->hiddenInput([
                    'value'=>isset($session['utm_campaign'])?$session['utm_campaign']:null,
                    'id' => 'shortOrderForm-utm_campaign',
            ])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_term')
            ->hiddenInput([
                    'value'=>isset($session['utm_term'])?$session['utm_term']:null,
                    'id' => 'shortOrderForm-utm_term',
            ])->label(false) ?>
        <?= $form->field($shortOrderForm, 'utm_content')
            ->hiddenInput([
                    'value'=>isset($session['utm_content'])?$session['utm_content']:null,
                    'id' => 'shortOrderForm-utm_content'])->label(false) ?>

        <div class="col-sm-6 col-sm-offset-3 text-center">
            <?= Html::submitButton('Уточнить цену', ['class' => 'btn btn-primary sendorder-btn mt10']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::end(); ?>
</div>