<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FrontUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Front Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-user-view">

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
            'site',
            'username',
            [
                'attribute'=>'subscribe_for_answers',
                'value' => function($model)
                {
                    if ($model['subscribe_for_answers'] === 1) {
                        return 'да';
                    } else if ($model['subscribe_for_answers']===0) {
                        return 'нет';
                    }

                },
                'format'=> 'html',
            ],
            'email_status',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'phone',
            'city',
            'country',
            'address',
            'status',


            ['attribute'=>'created_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['created_at'], 'dd/MM/yy HH:mm');},],
            ['attribute'=>'updated_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['updated_at'], 'dd/MM/yy HH:mm');},],
        ],
    ]) ?>

</div>
