<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Preorders */

$this->title = 'Звонок';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['/admin/preorders/lead-quality']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_call_update_form', [
        'model' => $model,
    ]) ?>

</div>
