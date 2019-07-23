<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */

$structure = $model->structure;
$city = '';

if ($structure) {
    foreach (explode('&', $structure) as $chunk) {
        $param = explode("=", $chunk);
        if ($param[0]=='city') {
            $city=$param[1];
        }

    }
}


?>
<div class="asb-city-price-calc  <?= $model->custom_class?>">

    <?php if ($model->header) : ?>
        <h3 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h3>
    <?php endif; ?>

    <?php if ($model->description) : ?>
        <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= $model->description ?></p>
    <?php endif; ?>

    <div class="<?= $model->color_key ?>  <?= $model->custom_class ?>">
        <?= \common\widgets\CityPriceCalcWidget::widget([
            'city' => $city,
        ]) ?>
    </div>


    <p class="mt10">
        <sup>
            <?= \common\models\PriceCalculator::INFO_MESSAGE ?>
        </sup>
    </p>


</div>

