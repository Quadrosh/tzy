<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */



?>
<div class="asb-how_we_work  <?= $model->custom_class?>">

    <?php if ($model->header) : ?>
        <h3 <?= $item->header_class?'class="'.$item->header_class.'"':null ?>><?= $model->header ?></h3>
    <?php endif; ?>

    <?php if ($model->description) : ?>
        <p <?= $model->description_class?'class="text-grey '.$model->description_class.'"':null ?>><?=  nl2br($model->description)  ?></p>
    <?php endif; ?>

    <?php if ($model->raw_text) : ?>
        <p <?= $model->raw_text_class?'class="'.$model->raw_text_class.'"':null ?>><?= nl2br($model->raw_text)  ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <div class="row">
            <?php $i=0; $count = count($model->items); foreach ( $model->items as $item)  : ?>
                <?php $i++; if ($i!=1 && $i%3==1) : ?>
        </div>
        <div class="row">
                <?php endif; ?>
                <div class="col-sm-4 <?php
                if ($i!=1 && $i%3==1 && $i+1 == $count){echo'col-sm-offset-2';}
                ?>">

                    <?php if ($item->view) : ?>
                        <?= $this->render('/article/part_views/block_item/'.$item->view, [
                            'model' => $item,
                        ]) ?>
                    <?php endif; ?>

                    <?php if (!$item->view) : ?>
                        <?php if ($item->image) : ?>
                            <?= Html::img('/img/'.$item->image,[
                                'class'=>$item->image_class,
                                'alt'=>$item->image_alt,
                                'title'=>$item->image_title?$item->image_title:null,
                            ])  ?>
                        <?php endif; ?>
                        <?php if ($item->header) : ?>
                            <<?= strpos($item->header_class, 'strong')!==false?'strong':'h4' ?> <?= $item->header_class?'class="'.$item->header_class.'"':null ?>><?= $item->header ?></<?= strpos($item->header_class, 'strong')!==false?'strong':'h4' ?>>
                        <?php endif; ?>

                        <?php if ($item->description) : ?>
                            <p <?= $item->description_class?'class=" '.$item->description_class.'"':null ?>><?= nl2br($item->description)  ?></p>
                        <?php endif; ?>
                        <?php if ($item->text) : ?>
                            <p <?= $item->text_class?'class="'.$item->text_class.'"':null ?>><?= $item->text ?></p>
                        <?php endif; ?>

                        <?php if ($item->link_name) : ?>
                            <a href="<?= $item->link_url ?>" <?= $item->link_class?'class="'.$item->link_class.'"':null ?>><?= $item->link_name ?></a>
                        <?php endif; ?>
                        <?php if ($item->link_description) : ?>
                            <p class="text-center"><?= $item->link_description ?></p>
                        <?php endif; ?>

                    <?php endif; ?>
<!--   && $i+1 != $count -->
                <?php if ($i%3 != 1  ) : ?>
                    <div class="hidden_xs">
                        <svg version="1.1" class="arrow_ico"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px"
                             viewBox="0 0 110 90"
                             style="enable-background:new 0 0 110 90;"
                             xml:space="preserve">
                             <polygon fill="none" stroke="#838e9a" stroke-miterlimit="10" points="104.7,45 72.9,13.2 72.9,29.6 7.6,29.6 7.6,60.4 72.9,60.4 72.9,76.8 "/>
                        </svg>
                    </div>
                <?php endif; ?>

                </div>

                <?php if ($i+1 != $count) : ?>
                    <div class="display_xs col-xs-12 text-center">
                        <svg version="1.1" class="arrowDown_ico"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 90 120"
                             style="enable-background:new 0 0 90 120;"
                             xml:space="preserve">
                                                 <polygon  fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                                            </svg>
                    </div>
                <?php endif; ?>



            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php if ($model->conclusion) : ?>
        <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
    <?php endif; ?>
</div>

