<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChatItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chat Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-item-view">

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
            'user_id',
            'user_name',
            'from_page',
            'user_ip',
            'email:email',
            'contacts',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
            'manager_id',
            'quality',
            'comment',
            'created_at',
        ],
    ]) ?>

</div>
