<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Preorders */

$this->title = 'Preorder set quality: ID - ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="preorders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_sq_form', [
        'model' => $model,
    ]) ?>

</div>
