<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Preorders */

$this->title = 'Новый звонок';
$this->params['breadcrumbs'][] = ['label' => 'Preorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_call_form', [
        'model' => $model,
    ]) ?>

</div>
