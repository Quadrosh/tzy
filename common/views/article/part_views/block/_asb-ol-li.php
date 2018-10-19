<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */



?>
<div class="asb-ul-li">

    <?php if ($model->header) : ?>
        <h4 class="<?= $model->header_class ?>"><?= $model->header ?></h4>
    <?php endif; ?>

    <?php if ($model->description) : ?>
        <p class="text-center"><?= $model->description ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <ol>
            <?php foreach ($model->items as $item) : ?>
                <li >

                    <?php if ($item->view) : ?>
                        <?= $this->render('/article/part_views/block_item/'.$item->view, [
                            'model' => $item,
                        ]) ?>
                    <?php endif; ?>

                    <?php if (!$item->view) : ?>
                        <?php if ($item->header) : ?>
                            <h6 <?= $item->header_class?'class="'.$item->header_class.'"':null ?>><?= $item->header ?></h6>
                        <?php endif; ?>
                        <?php if ($item->description) : ?>
                            <p <?= $item->description_class?'class="'.$item->description_class.'"':null ?>><?= $item->description ?></p>
                        <?php endif; ?>
                        <?php if ($item->image) : ?>
                            <?= Html::img('/img/'.$item->image,['class'=>'w100'])  ?>
                        <?php endif; ?>
                        <?php if ($item->link_name) : ?>
                            <a href="<?= $item->link_url ?>" <?= $item->link_class?'class="'.$item->link_class.'"':null ?>><?= $item->link_name ?></a>
                        <?php endif; ?>
                        <?php if ($item->link_description) : ?>
                            <p class="text-center"><?= $item->link_description ?></p>
                        <?php endif; ?>

                        <?php if ($item->text) : ?>
                            <p ><?= nl2br($item->text) ?></p>
                        <?php endif; ?>

                    <?php endif; ?>

                </li>
            <?php endforeach; ?>
        </ol>

    <?php endif; ?>

</div>

