<?php

use yii\helpers\Html;

?>


<section class="as-h_2col-text--fix_image fw <?= $model->color_key ?> <?= $model->custom_class ?> "
    <?= $model->background_image_title?'title="'.$model->background_image_title.'"':null ?>
         style="background-image: url(/img/<?= $model->background_image ?>);"
>
    <div class="row flex-sm" >
        <div class=" visible_sm pl0 pr0">
            <?php if ($model->section_image) {
                echo Html::img('/img/'.$model->section_image,[
                    'class'=>$model->image_class . ' cover',
                    'alt'=>$model->section_image_alt,
                    'title'=>$model->section_image_title?$model->section_image_title:null,
                ]);
            } ?>
        </div>
        <div class="col-sm-5 textBlock  ">
            <?php if ($model->description) : ?>
                <p  class="description <?= $model->description_class ?>"><?= nl2br($model->description)  ?></p>
            <?php endif; ?>
            <?php if ($model->header) : ?>
                <div >
                    <h2 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h2>
                </div>
            <?php endif; ?>



            <?php if ($model->raw_text) : ?>
                <p  class="text <?= $model->raw_text_class ?>"><?= nl2br($model->raw_text)  ?></p>
            <?php endif; ?>


            <?php if ($model->conclusion) : ?>
                <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
            <?php endif; ?>

            <?php if ($model->call2action_description) : ?>
                <p class="text-center mt50" ><?= nl2br($model->call2action_description)  ?></p>
            <?php endif; ?>
            <?php if ($model->call2action_name) : ?>
                <?php if ($model->call2action_link == 'callMe' || $model->call2action_link == 'call_me') : ?>
                    <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2  <?= $model->call2action_class ?>">
                        <?= $this->render('/article/part_views/article/_phone-form', [
                            'section' => $model,
                            'article' => $article,
                        ]) ?>

                    </div>
                <?php endif; ?>
                <?php if ($model->call2action_link != 'callMe' && $model->call2action_link != 'call_me') : ?>
                    <?=
                    Html::a( $model->call2action_name, [$model->call2action_link],['class'=>'mt10 link '.$model->call2action_class]);
                    ?>
                <?php endif; ?>

            <?php endif; ?>

        </div>


<!--        equalHeight_--><?//=  $model->id ?>

        <div class="col-sm-7 fixedBackground "
            <?= $model->section_image_title?'title="'.$model->section_image_title.'"':null ?>
             style="background-image: url(/img/<?= $model->section_image ?>);"
        >
        </div>

    </div>



</section>






