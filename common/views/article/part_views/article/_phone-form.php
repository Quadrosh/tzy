<?php

use yii\helpers\Html;
use \common\models\Visit;

$preorder = new \common\models\Feedback();

if (!isset($id)) {
    $id = 'quickorder-form'.$section->id;
}
$fromPage =  $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

?>
<div class="phone-form ">
    <?php $form = yii\bootstrap\ActiveForm::begin([
        'id' => $id,
        'method' => 'post',
        'action' => ['/site/feedback'],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'offset' => 'col-sm-offset-3 col-lg-offset-3',
                'wrapper' => 'col-sm-6 col-lg-6 xsQuickForm',
            ],
        ],
    ]); ?>

    <?= Html::errorSummary($preorder, ['class' => 'errors']) ?>

    <?= $form->field($preorder, 'phone', [
        'inputOptions' => [
            'placeholder' => 'ТЕЛЕФОН'
        ],
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn">'.
            '<button type="submit" class="btn btn-danger">'.$section->call2action_name.'</button></span></div>',
    ])->textInput(['maxlength' => true, 'id' => $id.'-phone'])->label(false) ?>


    <?= $form->field($preorder, 'name',['template' => '{input}', 'options' => ['tag' => false]])
        ->hiddenInput(['value'=>'-',
            'id' => $id.'-name'])->label(false) ?>
    <?= $form->field($preorder, 'utm_source',['template' => '{input}', 'options' => ['tag' => false]])
        ->hiddenInput(['value'=> Visit::getUtm('utm_source'),
            'id' => $id.'-utm_sourse'])->label(false) ?>
    <?= $form->field($preorder, 'utm_medium',['template'=>'{input}','options'=>['tag'=>false]])
        ->hiddenInput(['value'=> Visit::getUtm('utm_medium'),
            'id' => $id.'-utm_medium'])->label(false) ?>
    <?= $form->field($preorder, 'utm_campaign',['template'=>'{input}','options'=>['tag'=>false]])
        ->hiddenInput(['value'=> Visit::getUtm('utm_campaign'),
            'id' => $id.'-utm_campaign'])->label(false) ?>
    <?= $form->field($preorder, 'utm_term',['template' => '{input}', 'options' => ['tag' => false]])
        ->hiddenInput(['value'=> Visit::getUtm('utm_term'),
            'id' => $id.'-utm_term'])->label(false) ?>
    <?= $form->field($preorder, 'utm_content',['template' => '{input}', 'options' => ['tag' => false]])
        ->hiddenInput(['value'=> Visit::getUtm('utm_content'),
            'id' => $id.'-utm_content'])->label(false) ?>

    <?= $form->field($preorder, 'from_page',['template' => '{input}', 'options' => ['tag' => false]])
        ->hiddenInput(['value'=>$fromPage,
            'id' => $id.'-from_page'])->label(false) ?>
    <?php yii\bootstrap\ActiveForm::end(); ?>
</div>