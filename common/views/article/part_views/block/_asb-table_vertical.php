<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */

$head = strpos($model->structure,'with_head')!==false || strpos($model->structure,'withHead');

?>
<div class="asb-table_vertical <?= $model->custom_class ?>">

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
        <p <?= $model->description_class?'class="'. $model->description_class.'"':null ?> ><?= $model->description ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <table class="table table-bordered">
            <?php if ($head) : ?>

                <thead <?= $model->items[0]->custom_class?'class="'.$model->items[0]->custom_class.'"':null ?>>
                <?php if ($model->items[0]->header) : ?>
                    <td <?= $model->items[0]->header_class?'class="'.$model->items[0]->header_class.'"':null ?>><?= $model->items[0]->header ?></td>
                <?php endif; ?>
                <?php if ($model->items[0]->description) : ?>
                    <td <?= $model->items[0]->description_class?'class="'.$model->items[0]->description_class.'"':null ?>><?= $model->items[0]->description ?></td>
                <?php endif; ?>
                <?php if ($model->items[0]->text) : ?>
                    <td <?= $model->items[0]->text_class?'class="'.$model->items[0]->text_class.'"':null ?>><?= $model->items[0]->text ?></td>
                <?php endif; ?>
                <?php if ($model->items[0]->comment) : ?>
                    <td <?= $model->items[0]->comment_class?'class="'.$model->items[0]->comment_class.'"':null ?>><?= $model->items[0]->comment ?></td>
                <?php endif; ?>
                </thead>
            <?php endif; ?>
            <tbody>

            <?php foreach ($model->items as $item) : ?>
                <?php if (!$head || $head && $item->id != $model->items[0]->id) :?>
                    <tr  <?= $item->custom_class?'class="'.$item->custom_class.'"':null ?>>
                        <?php if ($item->header) : ?>
                            <td <?= $item->header_class?'class="'.$item->header_class.'"':null ?>><?= $item->header ?></td>
                        <?php endif; ?>
                        <?php if ($item->description) : ?>
                            <td <?= $item->description_class?'class="'.$item->description_class.'"':null ?>><?= $item->description ?></td>
                        <?php endif; ?>
                        <?php if ($item->text) : ?>
                            <td <?= $item->text_class?'class="'.$item->text_class.'"':null ?>><?= $item->text ?></td>
                        <?php endif; ?>
                        <?php if ($item->comment) : ?>
                            <td <?= $item->comment_class?'class="'.$item->comment_class.'"':null ?>><?= $item->comment ?></td>
                        <?php endif; ?>

                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if ($model->raw_text) : ?>
        <p <?= $model->raw_text_class?'class="'.$model->raw_text_class.'"':null ?>><?= nl2br($model->raw_text)  ?></p>
    <?php endif; ?>

    <?php if ($model->conclusion) : ?>
        <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
    <?php endif; ?>
</div>

