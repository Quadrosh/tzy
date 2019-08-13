<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $text string */
/* @var $link string */


?>
Здравствуйте<?= $name?' '.$name:null ?>,

<?= $text ?> на сайте <?= \yii\helpers\Url::base(true) ?> пройдите по ссылке:

<?= $link ?>
