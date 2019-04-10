<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */

$tds=[];
$ths=[];
foreach ($model->items as $key => $item) {
    $ths[$key]=$item->header;
    $tds[$key]=$item->text;
}

?>
<div class="asb-table <?= $model->custom_class ?>">

    <?php if ($model->header) : ?>
        <h3 class="<?= $model->header_class ?>"><?= $model->header ?></h3>
    <?php endif; ?>

    <?php if ($model->image) {
        echo Html::img('/img/'.$model->image,[
            'alt'=>$model->image_alt,
            'title'=>$model->image_title?$model->image_title:null,
        ]);
    } ?>

    <?php if ($model->description) : ?>
        <p class="text-center"><?= $model->description ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <?php foreach ($ths as $th) : ?>
                    <th><?= $th ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($tds as $td) : ?>
                    <td><?= $td ?></td>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>


    <?php endif; ?>

    <?php if ($model->conclusion) : ?>
        <p <?= $model->conclusion_class?'class="'.$model->conclusion_class.'"':null ?>><?= nl2br($model->conclusion)  ?></p>
    <?php endif; ?>
</div>

