<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

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
            'ip',
            'site',
            'user_id',
            'name',
            'city',
            'from_page',
            'phone',
            'email:email',
            'contacts',
            'text:ntext',
            'done',
            ['attribute'=>'date', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['date'], 'dd/MM/yy HH:mm');}],
        ],
    ]) ?>

</div>
