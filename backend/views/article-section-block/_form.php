<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-section-block-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'article_section_id')->textInput(['readonly'=>$model->article_section_id]) ?>
        </div>
        <div class="col-sm-5">
            <?php if ($model->article_section_id) {
                echo '<h4>'.$model->section->header.'</h4>';
            }?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'code_name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-2">
            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'header_class')
                ->dropDownList([
                    'text-center' => 'text-center',
                    'text-left' => 'text-left',
                    'text-right' => 'text-right',
                    'text_small' => 'text_small',
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
                    'text_small' => 'text_small',
                ],['prompt' => 'Выбери']) ?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'raw_text')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'raw_text_class')
                ->dropDownList([
                    'text-center' => 'text-center',
                    'text-left' => 'text-left',
                    'text-right' => 'text-right',
                    'text_small' => 'text_small',
                ],['prompt' => 'Выбери']) ?>
        </div>


        <div class="col-sm-2">
            <?= $form->field($model, 'image')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'image_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'image_alt')->textInput(['maxlength' => true]) ?>
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
                '_asb-bs_horiz_4' => 'bs_horiz_4',
                '_asb-bs_horiz_2' => 'bs_horiz_2',
                '_asb-slick_banner_1' => 'slick_banner_1',
                '_asb-ul-li' => 'ul-li',
                '_asb-ol-li' => 'ol-li',
            ],['prompt' => 'Выбери']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'color_key')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'custom_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'accent')->checkbox() ?>
        </div>




        <div class="col-sm-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>


    </div>



    <?php ActiveForm::end(); ?>

</div>
