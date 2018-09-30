<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
//$this->context->layout = 'error';
$feedbackForm = new \common\models\Feedback();
$preorderForm = new \common\models\Preorders();

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        При выполнении запроса возникла ошибка,<br>
        пожалуйста свяжитесь с нами, если вы считаете что это ошибка сервера.
    </p>


</div>
