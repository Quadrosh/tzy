<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChatItem */

$this->title = 'Create Chat Item';
$this->params['breadcrumbs'][] = ['label' => 'Chat Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
