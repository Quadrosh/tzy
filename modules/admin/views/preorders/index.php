<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preorders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Preorders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dispatch',
            'destination',
            'cargo',
            'name',
             'phone',
             'email:email',
             'weight',
             'text:ntext',
             'from_page',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
//             'date',
            [
                'attribute'=>'date',
                'value' => function($data)
                {
                    return \Yii::$app->formatter->asDatetime($data['date'], 'dd/MM/yy HH:mm');
                },
                'format'=> 'html',
            ],
            // 'done',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
