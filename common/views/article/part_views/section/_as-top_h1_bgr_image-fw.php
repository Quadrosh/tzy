<?php

use yii\helpers\Html;

?>


<section
    class="as-top_h1_bgr_image fw <?= $model->color_key ?> <?= $model->custom_class ?> min-h600 bgr"
    <?= $model->background_image_title?'title="'.$model->background_image_title.'"':null ?>
    style=" background-image: url(/img/<?= $model->background_image ?>)"
>

    <div class="row">
        <div class="  col-sm-12">

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
                        <h1 class="mt300 bigShadow ttu <?= $model->header_class ?>" ><?= $model->header ?></h1>
                    </div>
                <?php endif; ?>
            </div>

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
                            <div class="as-top_h1_bgr_image-default_block <?= $block->color_key ?> <?= $block->custom_class ?>">
                                <?php if ($block->header) : ?>
                                    <h3 <?= $block->header_class?'class="'.$block->header_class.'"':null ?>><?= $block->header ?></h3>
                                <?php endif; ?>
                                <?php if ($block->description) : ?>
                                    <p <?= $block->description_class?'class="'.$block->description_class.'"':null ?>><?= $block->description ?></p>
                                <?php endif; ?>
                                <?php if ($block->raw_text) : ?>
                                    <p <?= $block->raw_text_class?'class="'.$block->raw_text_class.'"':null ?>><?= $block->raw_text ?></p>
                                <?php endif; ?>
                                <?php if ($block->items) : ?>
                                    <?php foreach ($block->items as $item) : ?>
                                        <?php if ($item->header) : ?>
                                            <h4 <?= $item->header_class?'class="'.$item->header_class.'"':null ?>><?= $item->header ?></h4>
                                        <?php endif; ?>
                                        <?php if ($item->description) : ?>
                                            <p <?= $item->description_class?'class="'.$item->description_class.'"':null ?>><?= $item->description ?></p>
                                        <?php endif; ?>
                                        <?php if ($item->text) : ?>
                                            <p <?= $item->text_class?'class="'.$item->text_class.'"':null ?>><?= $item->text ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <?php if ($model->conclusion) : ?>
                <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
            <?php endif; ?>

            <?php if ($model->call2action_description) : ?>
                <p class="text-center mt50" ><?= nl2br($model->call2action_description)  ?></p>
            <?php endif; ?>
            <?php if ($model->call2action_name) : ?>
                <?php if ($model->call2action_link == 'callMe' || $model->call2action_link == 'call_me') : ?>
                    <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2 ">
                        <?= $this->render('/article/part_views/article/_phone-form', [
                            'section' => $model,
                            'article' => $article,
                            'utm' => isset($utm)?$utm:null,
                        ]) ?>

                    </div>
                <?php endif; ?>
                <?php if ($model->call2action_link != 'callMe' && $model->call2action_link != 'call_me') : ?>
                    <?=
                    Html::a( $model->call2action_name, [$model->call2action_link],['class'=>$model->call2action_class]);
                    ?>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>



</section>






