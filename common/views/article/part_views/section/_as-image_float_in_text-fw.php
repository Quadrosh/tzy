<?php

use yii\helpers\Html;

?>


<section class="as-image_float_in_text fw <?= $model->color_key ?> <?= $model->custom_class ?>">
    <div class="row">
        <div class="col-sm-12">
            <?php if ($model->header) : ?>
                <h2 class="<?= $model->header_class ?>"><?= $model->header ?></h2>
            <?php endif; ?>
            <?php if ($model->description) : ?>
                <p class="text-left"><?= nl2br($model->description)  ?></p>
            <?php endif; ?>

            <?php if ($model->raw_text) : ?>
                <p><?php if ($model->section_image) {
                        echo Html::img('/img/'.$model->section_image,[
                            'class'=> $model->image_class,
                            'alt'=>$model->section_image_alt,
                            'title'=>$model->section_image_title?$model->section_image_title:null,
                        ]);
                    } ?><?= nl2br($model->raw_text)  ?></p>
            <?php endif; ?>


            <?php if ($model->blocks) : ?>
                <div class="mt30 mb30">
                    <?php foreach ($model->blocks as $block) : ?>
                        <?php if ($block->view) : ?>
                            <?= $this->render('/article/part_views/block/'.$block->view, [
                                'model' => $block,
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
    </div>


</section>






