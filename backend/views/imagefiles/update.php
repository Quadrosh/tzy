<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagefiles */

$this->title = 'Update Imagefiles: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Imagefiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imagefiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
