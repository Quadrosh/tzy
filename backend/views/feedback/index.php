<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Create Feedback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'site',
//            'user_id',
            'name',
            'phone',
            'from_page',
            //            'city',

            // 'email:email',
            // 'contacts',
            // 'text:ntext',
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
