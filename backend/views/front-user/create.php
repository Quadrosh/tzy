<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FrontUser */

$this->title = 'Create Front User';
$this->params['breadcrumbs'][] = ['label' => 'Front Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
