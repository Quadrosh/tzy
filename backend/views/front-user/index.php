<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FrontUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Front Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Front User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'site',
            'username',
            'auth_key',
            'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'phone',
            // 'city',
            // 'country',
            // 'address',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
