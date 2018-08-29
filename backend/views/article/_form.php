<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_ids')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hrurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'exerpt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'exerpt_big')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topimage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topimage_alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'background_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumbnail_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'call2action_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagelink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagelink_alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'layout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
