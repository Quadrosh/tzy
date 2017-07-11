<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandingPage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Landing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-view">

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
            'view',
            'layout',
            'color',
        ],
    ]) ?>

</div>
