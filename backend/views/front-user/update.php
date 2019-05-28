<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FrontUser */

$this->title = 'Update Front User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Front Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="front-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
