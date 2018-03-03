<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'Quick Form set quality: ID - ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['/admin/preorders/lead-quality']];
$this->params['breadcrumbs'][] = 'Update quickForm '. $model->id;
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_sq_form', [
        'model' => $model,
    ]) ?>

</div>
