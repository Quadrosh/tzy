<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */




?>
<div class="asbi-h_tbl2_img--head_text">

    <div class="table mb0">
        <div class="table-cell vertical-middle <?= $model->structure ?>">
            <?php if ($model->image) {
                echo Html::img('/img/'.$model->image,[ 'alt'=>$model->image_alt, 'class'=>$model->image_class]);
            } ?>

        </div>
        <div class="table-cell pl10 vertical-middle">
            <?php if ($model->header) : ?>
                <h5 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h5>
            <?php endif; ?>
            <?php if ($model->description) : ?>
                <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= $model->description ?></p>
            <?php endif; ?>

            <?php if ($model->text) : ?>
                <p <?= $model->text_class?'class="'.$model->text_class.'"':null ?>><?= $model->text ?></p>
            <?php endif; ?>

            <?php if ($model->link_name) : ?>
                <a href="<?= $model->link_url ?>" <?= $model->link_class?'class="'.$model->link_class.'"':null ?>><?= $model->link_name ?></a>
            <?php endif; ?>
            <?php if ($model->link_description) : ?>
                <p class="text-center"><?= $model->link_description ?></p>
            <?php endif; ?>
        </div>
    </div>



</div>

