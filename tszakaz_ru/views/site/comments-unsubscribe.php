<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $user \common\models\FrontUser */

use yii\helpers\Html;


$this->title = 'Оповещения отключены';
?>
<div class="site-confirm-email">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        Оповещения об ответах на комментарии пользователя <?= $user->username ?>  <?= $user->email ?> отключены.<br>
    </p>


</div>
