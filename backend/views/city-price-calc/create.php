<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CityPriceCalc */

$this->title = 'Create City Price Calc';
$this->params['breadcrumbs'][] = ['label' => 'City Price Calcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-price-calc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
