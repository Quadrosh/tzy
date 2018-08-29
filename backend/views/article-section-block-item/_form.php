<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-section-block-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'article_section_block_id')->textInput() ?>

    <?= $form->field($model, 'order_num')->textInput() ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accent')->textInput() ?>

    <?= $form->field($model, 'custom_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
