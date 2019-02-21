<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CityPriceCalcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-price-calc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'load_capacity') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'min_time') ?>

    <?php // echo $form->field($model, 'price_city') ?>

    <?php // echo $form->field($model, 'price_center') ?>

    <?php // echo $form->field($model, 'price_hist_center') ?>

    <?php // echo $form->field($model, 'price_outside') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
