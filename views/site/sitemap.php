<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Page View';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1 class="text-center"><?= $page->pagehead ?></h1>

<div class="sitemap col-sm-offset-3 col-sm-9">
    <?= app\widgets\MenuWidget::widget(['formfactor'=>'ul','currentItem'=> Yii::$app->view->params['currentItem'] ]); ?>
</div>


