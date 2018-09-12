<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */



?>
<div class="asb-bs_horiz_4">

    <?php if ($model->header) : ?>
        <h4 class="<?= $model->header_class ?>"><?= $model->header ?></h4>
    <?php endif; ?>

    <?php if ($model->description) : ?>
        <p class="text-center"><?= $model->description ?></p>
    <?php endif; ?>

    <?php if ($model->items) : ?>
        <div class="row">
            <?php foreach ($model->items as $item) : ?>
                <div class="col-sm-3">

                    <?php if ($item->view) : ?>
                        <?= $this->render($item->view, [
                            'model' => $item,
                        ]) ?>
                    <?php endif; ?>

                    <?php if (!$item->view) : ?>
                        <?php if ($item->header) : ?>
                            <p class="<?= $item->header_class ?>"><?= $item->header ?></p>
                        <?php endif; ?>
                        <?php if ($item->description) : ?>
                            <p class="text-center"><?= $item->description ?></p>
                        <?php endif; ?>
                        <?php if ($item->image) : ?>
                            <?= Html::img('/img/'.$item->image,['class'=>'w100'])  ?>
                        <?php endif; ?>
                        <?php if ($item->link_name) : ?>
                            <a href="<?= $item->link_url ?>" class="<?= $item->link_class ?>"><?= $item->link_name ?></a>
                        <?php endif; ?>
                        <?php if ($item->link_description) : ?>
                            <p class="text-center"><?= $item->link_description ?></p>
                        <?php endif; ?>

                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

</div>

