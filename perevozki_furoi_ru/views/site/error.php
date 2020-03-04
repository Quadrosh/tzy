<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error p10">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Во время выболнения запроса произошла ошибка.
    </p>
    <p>
        Пожалуйста, свяжитесь с нами по телефону <?=  Yii::$app->params['phone'] ?>.
    </p>

</div>
