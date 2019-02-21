<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CityPriceCalc */

$this->title = 'Update City Price Calc: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'City Price Calcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-price-calc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
