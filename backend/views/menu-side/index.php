<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Sides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-side-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Menu Side', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'site',
            'parent_id',
            'name',
            'link',
            //'num_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
