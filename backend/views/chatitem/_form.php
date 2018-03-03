<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChatItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chat-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_page')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utm_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utm_medium')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utm_campaign')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utm_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utm_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
