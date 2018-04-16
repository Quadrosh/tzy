<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tszakaz_ru\assets\AppAsset;
use yii\bootstrap\ActiveForm;

perevozki_negabarit_su\assets\LpNgbAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title> <?= Yii::$app->view->params['meta']['title'] ?> </title>
    <meta name="description" content="<?= Yii::$app->view->params['meta']['description'] ?>">
    <meta name="keywords" content="<?= Yii::$app->view->params['meta']['keywords'] ?>">

    <?php $this->head() ?>
    <?php include_once("stat_google.php") ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">

    <?= $content ?>

</div>






<?php $this->endBody() ?>




<?php include_once("stat_yandex.php") ?>

</body>
</html>
<?php $this->endPage() ?>
