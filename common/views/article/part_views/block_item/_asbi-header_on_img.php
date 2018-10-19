<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */




?>
<div class="asb-header_on_img">

    <div class="image_box">
        <?php if ($model->header) : ?>
            <p class="header <?= $model->header_class ?>"><?= $model->header ?></p>
        <?php endif; ?>
        <?php if ($model->image) : ?>
            <?= Html::img('/img/'.$model->image,['class'=>'w100'])  ?>
        <?php endif; ?>
    </div>




    <?php if ($model->description) : ?>
        <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= $model->text ?>><?= $model->description ?></p>
    <?php endif; ?>
    <?php if ($model->text) : ?>
        <p <?= $model->text_class?'class="'.$model->text_class.'"':null ?>><?= $model->text ?></p>
    <?php endif; ?>

    <?php if ($model->link_name) : ?>
        <a href="<?= $model->link_url ?>" class="<?= $model->link_class ?>"><?= $model->link_name ?></a>
    <?php endif; ?>
    <?php if ($model->link_description) : ?>
        <p class="text-center"><?= $model->link_description ?></p>
    <?php endif; ?>

</div>

