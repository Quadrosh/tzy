<?php

use yii\helpers\Html;

?>


<section
    class="as-top_h2_form fw <?= $model->color_key ?> <?= $model->custom_class ?> min-h600 bgr"
    <?= $model->background_image_title?'title="'.$model->background_image_title.'"':null ?>
    style=" background-image: url(/img/<?= $model->background_image ?>)"
>

    <div class="row">
        <div class="col-sm-12">
            <div class="table">
                <?php if ($model->section_image) : ?>
                    <div class="table-cell <?= $model->image_class ?>">
                        <?php if ($model->section_image) {
                            echo Html::img('/img/'.$model->section_image,[
                                'alt'=>$model->section_image_alt,
                                'title'=>$model->section_image_title?$model->section_image_title:null,
                            ]);
                        } ?>
                    </div>
                <?php endif; ?>

                <?php if ($model->header) : ?>
                    <div class="table-cell">
                        <h1 class=" ttu <?= $model->header_class ?>" ><?= $model->header ?></h1>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="  col-sm-6 advantages">


            <?php if ($model->description) : ?>
                <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= nl2br($model->description)  ?></p>
            <?php endif; ?>

            <?php if ($model->raw_text) : ?>
                <p <?= $model->raw_text_class?'class="'.$model->raw_text_class.'"':null ?>><?= nl2br($model->raw_text)  ?></p>
            <?php endif; ?>


            <?php if ($model->blocks) : ?>
                <div class="mt30 mb30">
                    <?php foreach ($model->blocks as $block) : ?>
                        <?php if ($block->view) : ?>
                            <?= $this->render('/article/part_views/block/'.$block->view, [
                                'model' => $block,
                                'article' => $article,
                                'utm' => isset($utm)?$utm:null,
                            ]) ?>
                        <?php endif; ?>
                        <?php if (!$block->view) : ?>
                            <?= $this->render('/article/part_views/block/_asb-default', [
                                'model' => $block,
                            ]) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <?php if ($model->conclusion) : ?>
                <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
            <?php endif; ?>


        </div>
        <div class="col-sm-6 _trans-black-bgr">
            <div class="form">
                <?= $this->render('/article/part_views/article/_short_order-form', [
                    'section' => $model,
                    'article' => $article,
                    'utm' => isset($utm)?$utm:null,
                ]) ?>
            </div>

        </div>
    </div>



</section>






