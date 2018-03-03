<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChatItem */

$this->title = 'Update Chat Item: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Chat Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chat-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
