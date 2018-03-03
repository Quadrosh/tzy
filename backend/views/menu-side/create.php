<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MenuSide */

$this->title = 'Create Menu Side';
$this->params['breadcrumbs'][] = ['label' => 'Menu Sides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-side-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
