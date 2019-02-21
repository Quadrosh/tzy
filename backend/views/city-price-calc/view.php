<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CityPriceCalc */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'City Price Calcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-price-calc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city',
            'load_capacity',
            'description',
            'min_time',
            'price_city',
            'price_center',
            'price_hist_center',
            'price_outside',
            ['attribute'=>'created_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['created_at'], 'dd/MM/yy HH:mm');},],
            ['attribute'=>'updated_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['updated_at'], 'dd/MM/yy HH:mm');},],
        ],
    ]) ?>

</div>
