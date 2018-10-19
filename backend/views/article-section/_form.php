<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-section-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'article_id')->textInput(['readonly'=>$model->article_id]) ?>
        </div>
        <div class="col-sm-5">
            <?php if ($model->article_id) {
                echo '<h4>'.$model->article->list_name.'</h4>';
            }?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'code_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'header_class')
                ->dropDownList([
                'text-center' => 'text-center',
                'text-left' => 'text-left',
                'text-right' => 'text-right',
            ],['prompt' => 'Выбери']) ?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'description')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'description_class')
                ->dropDownList([
                    'text-center' => 'text-center',
                    'text-left' => 'text-left',
                    'text-right' => 'text-right',
                ],['prompt' => 'Выбери']) ?>
        </div>

        <div class="col-sm-8">
            <?= $form->field($model, 'raw_text')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'description_class')
                ->dropDownList([
                    'text-center' => 'text-center',
                    'text-left' => 'text-left',
                    'text-right' => 'text-right',
                ],['prompt' => 'Выбери']) ?>
        </div>

        <div class="col-sm-2">
            <?= $form->field($model, 'section_image')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'image_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'section_image_alt')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'background_image')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'thumbnail_image')->textarea(['rows' => 1]) ?>
        </div>


        <div class="col-sm-4">
            <?= $form->field($model, 'call2action_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'call2action_link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'call2action_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'call2action_description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'call2action_comment')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-sm-3">
            <?= $form->field($model, 'view')->dropDownList([
                '_as-head-descr-blocks-text' => 'head-descr-blocks-text',
            ],['prompt' => 'Выбери вьюху']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'color_key')
                ->dropDownList([
                    'bright' => 'bright',
                    'dark' => 'dark',
                    'grey' => 'grey',
                ],['prompt' => 'Выбери']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'custom_class')->textInput(['maxlength' => true]) ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
