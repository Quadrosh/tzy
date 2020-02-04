<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */

$noColPadding = false;


$structure = $model->structure;

if ($structure) {
    foreach (explode('&', $structure) as $chunk) {
        $param = explode("=", $chunk);
        if ($param[0]=='no_col_padding' || $param[0]=='noColPadding') {
            $noColPadding=true;
        }

    }
}


?>
<div class="asb-bs_horiz_2 <?= $model->color_key ?> <?= $model->custom_class ?>">

    <?php if ($model->header) : ?>
        <h3 <?= $model->header_class?'class="'.$model->header_class.'"':null ?>><?= nl2br($model->header) ?></h3>
    <?php endif; ?>

    <?php if ($model->description) : ?>
        <p <?= $model->description_class?'class="'.$model->description_class.'"':null ?>><?= nl2br($model->description) ?></p>
    <?php endif; ?>

    <?php if ($model->raw_text) : ?>
        <p <?= $model->raw_text_class?'class="'.$model->raw_text_class.'"':null ?>><?= nl2br($model->raw_text) ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <div class="row">

        <?php $i=0; $count = count($model->items); ?>
        <?php foreach ( $model->items as $item)  : ?>
            <?php $i++; if ($i!=1 && $i%2==1) : ?>
        </div>
        <div class="row">
            <?php endif; ?>

                <div class="col-sm-6 <?= $noColPadding?' pl0 pr0 ':null ?> ">

                    <?php if ($item->view) : ?>
                        <?= $this->render('/article/part_views/block_item/'.$item->view, [
                            'model' => $item,
                        ]) ?>
                    <?php endif; ?>

                    <?php if (!$item->view) : ?>
                        <?php if ($item->header) : ?>
                            <h4 <?= $item->header_class?'class="'.$item->header_class.'"':null ?>><?= nl2br($item->header) ?></h4>
                        <?php endif; ?>
                        <?php if ($item->description) : ?>
                            <p class="text-center"><?= $item->description ?></p>
                        <?php endif; ?>

                        <?php if ($item->image) : ?>
                            <?= Html::img('/img/'.$item->image,[
                                'class'=>'max-w100per',
                                'alt'=>$item->image_alt,
                                'title'=>$item->image_title?$item->image_title:null,
                            ])  ?>
                        <?php endif; ?>
                        <?php if ($item->link_name) : ?>
                            <a href="<?= $item->link_url ?>" class="<?= $item->link_class ?>"><?= $item->link_name ?></a>
                        <?php endif; ?>
                        <?php if ($item->link_description) : ?>
                            <p class="text-center"><?= $item->link_description ?></p>
                        <?php endif; ?>

                        <?php if ($item->text) : ?>
                            <p ><?= nl2br($item->text) ?></p>
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

