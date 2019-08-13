<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $formModel common\models\SignupAdminForm */

$this->title = 'Создание пользователя '.$model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formVerifyAndSignup', [
        'model' => $model,
        'formModel' => $formModel,
    ]) ?>

</div>
