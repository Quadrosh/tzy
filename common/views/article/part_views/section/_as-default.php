<?php

use yii\helpers\Html;

?>


<section <?php
if ($model->color_key || $model->custom_class) {

    echo 'class="as-default ';
    echo $model->color_key;
    echo ' ';
    echo $model->custom_class;
    echo '"';

}
?>>
    <div class="row">
        <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
            <div class="table mb0">
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
                        <h2 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h2>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($model->description) : ?>
                <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= nl2br($model->description) ?></p>
            <?php endif; ?>
            <?php if ($model->raw_text) : ?>
                <p <?= $model->raw_text_class?'class="'.$model->raw_text_class.'"':null ?>><?= nl2br($model->raw_text)  ?></p>
            <?php endif; ?>
            <?php if ($model->blocks) : ?>
                <?php foreach ($model->blocks as $block) : ?>
                    <div class="mt30 mb30">
                        <?php if ($block->view) : ?>
                            <?= $this->render('/article/part_views/block/'.$block->view, [
                                'model' => $block,
                                'article' => $article,
                            ]) ?>
                        <?php endif; ?>
                        <?php if (!$block->view) : ?>
                            <?= $this->render('/article/part_views/block/_asb-default', [
                                'model' => $block,
                                'article' => $article,
                            ]) ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($model->conclusion) : ?>
                <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
            <?php endif; ?>

            <div <?= $model->call2action_class?'class="'.$model->call2action_class.'"':null ?>>
                <?php if ($model->call2action_description) : ?>
                    <p class="text-center mt50" ><?= nl2br($model->call2action_description)  ?></p>
                <?php endif; ?>
                <?php if ($model->call2action_name) : ?>
                    <?php if ($model->call2action_link == 'callMe') : ?>
                        <div class="col-sm-12 ">
                            <?= $this->render('/article/part_views/article/_phone-form', [
                                'section' => $model,
                                'article' => $article,
                                'utm' => isset($utm)?$utm:null,
                            ]) ?>

                        </div>
                    <?php endif; ?>
                    <?php if ($model->call2action_link != 'callMe') : ?>
                        <?=
                        Html::a( $model->call2action_name, [$model->call2action_link],['class'=>$model->call2action_class]);
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>



        </div>
    </div>

</section>






