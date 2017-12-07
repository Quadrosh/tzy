<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chat Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Chat Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_name',
            'from_page',
            'user_ip',
            //'email:email',
            //'contacts',
            //'utm_source',
            //'utm_medium',
            //'utm_campaign',
            //'utm_term',
            //'utm_content',
            //'manager_id',
            //'quality',
            //'comment',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
