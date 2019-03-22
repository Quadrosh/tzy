<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */



?>
<div class="asb-bs_horiz_3_img_icon">

    <div class="table mb0">
        <?php if ($model->image) : ?>
            <div class="table-cell <?= $model->image_class ?>">
                <?php if ($model->image) {
                    echo Html::img('/img/'.$model->image,[
                        'alt'=>$model->image_alt,
                        'title'=>$model->image_title?$model->image_title:null,
                    ]);
                } ?>
            </div>
        <?php endif; ?>

        <?php if ($model->header) : ?>
            <div class="table-cell">
                <h3 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= $model->header ?></h3>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($model->description) : ?>
        <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= $model->description ?></p>
    <?php endif; ?>

    <?php if ($model->raw_text) : ?>
        <p <?= $model->raw_text_class?'class="'.$model->raw_text_class.'"':null ?>><?= nl2br($model->raw_text)  ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <div class="row">
            <?php $i=0; $count = count($model->items);
            foreach ( $model->items as $item)  : ?>
                <?php $i++; if ($i!=1 && $i%3==1) : ?>
        </div>
        <div class="row">
                <?php endif; ?>
                <div class="col-sm-4 <?php
                if ($i!=1 && $i%3==1 && $i+1 == $count){echo'col-sm-offset-2';}
                if ($i!=1 && $i%3==1 && $i == $count){echo'col-sm-offset-4';}
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
                            <p <?= $item->description_class?'class="'.$item->description_class.'"':null ?>><?= $item->description ?></p>
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

                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php if ($model->conclusion) : ?>
        <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
    <?php endif; ?>
</div>

