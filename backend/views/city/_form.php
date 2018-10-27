<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'parent_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\City::find()->all(), 'id','name'),['prompt' => 'Если областной - выбери родителя']) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'distance_to_parent')->textInput() ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'on_main_road')->dropDownList([
                'on_road' => 'на_трассе',
                'aside_from_road' => 'в_стороне_от_трассы',
            ],['prompt' => 'Выбери']) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'parent_center_direction')->dropDownList([
                'to_center' => 'в сторону Москвы',
                'to_board' => 'в сторону границы',
            ],['prompt' => 'Если на трассе, то от родителя']) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'bad_road')->dropDownList([
                'fura_can' => 'фура может пройти',
                'cross-country' => 'только вездеход',
                'season' => 'сезонная',
            ],['prompt' => 'Если дорга плохая']) ?>
        </div>

        <div class="col-sm-12">
            <?= $form->field($model, 'comment')->textarea(['rows' => 1]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
