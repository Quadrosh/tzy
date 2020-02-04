<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */




?>
<div class="asbi-v_sm_svg_in_comment_on_image_text_link h100per  <?= $model->color_key ?> <?= $model->custom_class ?>">

    <div class="row">
        <div class="col-sm-12 pl0 pr0 ">
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

    </div>
    <div class="row fullHeight ">
        <div class="col-sm-12  ">
            <?php if ($model->description) : ?>
                <p class="description <?= $model->description_class ?>"><?= $model->description ?></p>
            <?php endif; ?>

            <?php if ($model->header) : ?>
                <h4 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h4>
            <?php endif; ?>


            <?php if ($model->text) : ?>
                <p class="text <?= $model->text_class ?>"><?= $model->text ?></p>
            <?php endif; ?>
        </div>

        <?php if ($model->link_name) : ?>
        <div class="col-sm-12 min-h50"></div>
            <div class="absolute_right_bottom">
                <a
                        class="link <?= $model->link_class ?>"
                        href="<?= $model->link_url ?>" ><?= $model->link_name ?></a>

            </div>
        <?php endif; ?>

    </div>





</div>






