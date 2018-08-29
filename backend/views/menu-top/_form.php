<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MenuTop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-top-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site')->dropDownList(Yii::$app->params['siteList'],['prompt'=>'Выберите сайт'])?>

    <?= $form->field($model, 'parent_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\MenuTop::find()
            ->all(),'id',function($model) {return $model['site'].' - '.$model['name'];}
        ),['prompt'=>'Выберите родителя'])
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
