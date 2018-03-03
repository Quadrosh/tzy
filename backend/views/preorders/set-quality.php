<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Preorders */

$this->title = 'Preorder set quality: ID - ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['/admin/preorders/lead-quality']];
$this->params['breadcrumbs'][] = 'Update preorder '. $model->id;
?>
<div class="preorders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_sq_form', [
        'model' => $model,
    ]) ?>

</div>
