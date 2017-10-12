<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandingPage */

$this->title = $model->name . ' - cтатистика';
$this->params['breadcrumbs'][] = ['label' => 'Landing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
//            'hrurl:url',
//            Html::a($model['hrurl'], ['/t/'.$model['hrurl']]),
            [
                'attribute'=>'hrurl',
                'value'=> Html::a($model['hrurl'], ['/lp/'.$model['hrurl']]),
                'format'=> 'html',
            ],
            'seo_logo:ntext',
            'title',
            'description:ntext',
            'keywords:ntext',
//            'view',
//            'layout',
//            'color',
        ],
    ]) ?>
<h2>Просмотры</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $visitsProvider,
        'columns' => [
            'lp_hrurl',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'views',
            'lead',
//            'date',
            [
                'attribute'=>'date',
                'value' => function($data)
                {
                    return \Yii::$app->formatter->asDatetime($data['date'], 'dd/MM/yy');
                },
                'format'=> 'html',
            ],



        ],
    ]); ?>

</div>
