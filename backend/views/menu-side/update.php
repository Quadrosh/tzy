<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MenuSide */

$this->title = 'Update Menu Side: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Menu Sides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu-side-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
