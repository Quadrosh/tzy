<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'article_id')->textInput() ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'raw_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'section_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'section_image_alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'background_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumbnail_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'call2action_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call2action_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custom_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
