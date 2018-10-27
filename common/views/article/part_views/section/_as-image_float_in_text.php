<?php

use yii\helpers\Html;

?>


<section class="as-image_float_in_text <?= $model->color_key ?> <?= $model->custom_class ?>">
    <?php if ($model->header) : ?>
        <h2 class="<?= $model->header_class ?>"><?= $model->header ?></h2>
    <?php endif; ?>
    <?php if ($model->description) : ?>
        <p class="text-left"><?= nl2br($model->description)  ?></p>
    <?php endif; ?>

    <?php if ($model->raw_text) : ?>
        <p><?php if ($model->section_image) {
                echo Html::img('/img/'.$model->section_image,['class'=> $model->image_class, 'alt'=>$model->section_image_alt]);
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
                <?php if ($block->header) : ?>
                    <h4 class="<?= $block->header_class ?>"><?= $block->header ?></h4>
                <?php endif; ?>
                <?php if ($block->description) : ?>
                    <p class="text-center"><?= $block->description ?></p>
                <?php endif; ?>
                <?php if ($block->items) : ?>
                    <?php foreach ($block->items as $item) : ?>
                        <?php if ($item->header) : ?>
                            <p class="<?= $item->header_class ?>"><?= $item->header ?></p>
                        <?php endif; ?>
                        <?php if ($item->description) : ?>
                            <p class="text-center"><?= $item->description ?></p>
                        <?php endif; ?>
                        <?php if ($item->text) : ?>
                            <p class="text-center"><?= $item->text ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <?php if ($model->conclusion) : ?>
        <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
    <?php endif; ?>

</section>






