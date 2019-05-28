<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $user \common\models\FrontUser */

use yii\helpers\Html;


$this->title = 'Email подтвержден';
?>
<div class="site-confirm-email">

    <h1><?= Html::encode($this->title) ?></h1>



    <p>
        Email <?= $user->email ?> подтвержден.<br>
        Вы можете добавлять комментарии.
    </p>


</div>
