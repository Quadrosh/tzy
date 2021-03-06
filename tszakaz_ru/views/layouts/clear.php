<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tszakaz_ru\assets\AppAsset;
use yii\bootstrap\ActiveForm;

//AppAsset::register($this);
tszakaz_ru\assets\MainAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title> </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--<h1>форма заказа</h1>-->
<?//= Html::errorSummary($feedback, ['class' => 'errors']) ?>
<?= $content ?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
