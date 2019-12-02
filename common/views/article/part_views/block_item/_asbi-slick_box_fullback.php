<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */




?>
<div class="asbi-slick_box_fullback  bgr"
    <?= $model->image_title?'title="'.$model->image_title.'"':null ?>
     style=" background-image: url(/img/<?= $model->image ?>)"
>

    <div class="row">
        <div class="col-sm-7 col-sm-offset-4 col-md-6 col-md-offset-5">
            <div class="textBlock">
                <?php if ($model->description) : ?>
                    <p  class="description <?= $model->description_class ?>"><?= $model->description ?></p>
                <?php endif; ?>
                <?php if ($model->header) : ?>
                    <h4 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h4>
                <?php endif; ?>

                <?php if ($model->text) : ?>
                    <p class="text <?= $model->text_class ?>" ><?= $model->text ?></p>
                <?php endif; ?>

                <?php if ($model->link_name) : ?>
                    <a href="<?= $model->link_url ?>" class="link <?= $model->link_class ?>"><?= $model->link_name ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>




<!--    --><?php //if ($model->link_description) : ?>
<!--        <p class="text-center">--><?//= $model->link_description ?><!--</p>-->
<!--    --><?php //endif; ?>


</div>

