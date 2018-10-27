<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'parent_id',
            'distance_to_parent',
            'on_main_road',
            // 'parent_center_direction',
            // 'bad_road',
            // 'comment:ntext',
            // 'code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
