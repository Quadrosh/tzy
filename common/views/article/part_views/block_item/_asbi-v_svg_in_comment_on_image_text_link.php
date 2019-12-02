<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */




?>
<div class="asbi-v_svg_in_comment_on_image_text_link h100per text-center <?= $model->color_key ?> <?= $model->custom_class ?>">

    <div class="row">
        <div class="col-sm-12 pl0 pr0">
            <div class="imgWrap">
                <?php if ($model->comment) {
                    echo '<div class="svg_box">'.$model->comment.'</div>';
                } ?>

                <?php if ($model->image) {
                    echo Html::img('/img/'.$model->image,[
                        'class'=>'cover '.$model->image_class,
                        'alt'=>$model->image_alt,
                        'title'=>$model->image_title?$model->image_title:null,
                    ]);
                } ?>
            </div>
        </div>

        <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
            <?php if ($model->description) : ?>
                <p class="description <?= $model->description_class ?>"><?= $model->description ?></p>
            <?php endif; ?>

            <?php if ($model->header) : ?>
                <h4 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h4>
            <?php endif; ?>


            <?php if ($model->text) : ?>
                <p class="text <?= $model->text_class ?>"><?= $model->text ?></p>
            <?php endif; ?>

            <?php if ($model->link_name) : ?>
            <div class="perspective500 min-h80">
                <a
                        class="link <?= $model->link_class ?>"
                        href="<?= $model->link_url ?>" ><?= $model->link_name ?></a>
            </div>
            <?php endif; ?>

            <?php if ($model->link_description) : ?>
                <p class="text-center"><?= $model->link_description ?></p>
            <?php endif; ?>
        </div>

    </div>





</div>






