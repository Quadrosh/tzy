<?php

use yii\helpers\Html;

?>


<section class="as-image_float_in_text <?= $model->color_key ?> <?= $model->custom_class ?>">
    <div class="row">
        <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
            <?php if ($model->header) : ?>
                <h2 class="<?= $model->header_class ?>"><?= $model->header ?></h2>
            <?php endif; ?>
            <?php if ($model->description) : ?>
                <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= nl2br($model->description) ?></p>
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

            <?php if ($model->call2action_description) : ?>
                <p class="text-center mt50" ><?= nl2br($model->call2action_description)  ?></p>
            <?php endif; ?>
            <?php if ($model->call2action_name) : ?>
                <?php if ($model->call2action_link == 'callMe' || $model->call2action_link == 'call_me') : ?>
                    <div class="col-sm-12 <?= $model->call2action_class ?>">
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






