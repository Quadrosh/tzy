<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $article common\models\Article */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */


?>
<div class="article_front_1">

    <div class="row">
        <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
            <h1 class="text-center"><?= Html::encode($article->h1) ?></h1>

            <?php if ($article->exerpt) : ?>
                <p><?= $article->exerpt ?></p>
            <?php endif; ?>
            <?php if ($article->exerpt_big) : ?>
                <p><?= $article->exerpt_big ?></p>
            <?php endif; ?>
        </div>
    </div>


    <?php if ($article->sections) : ?>
        <?php foreach ($article->sections as $section) : ?>
            <section class="<?= $section->color_key ?> <?= $section->custom_class ?>">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
                        <?php if ($section->header) : ?>
                            <h2 class="<?= $section->header_class ?>"><?= $section->header ?></h2>
                        <?php endif; ?>
                        <?php if ($section->description) : ?>
                            <p class="<?= $section->description_class ?>"><?= $section->description ?></p>
                        <?php endif; ?>
                        <?php if ($section->blocks) : ?>
                            <?php foreach ($section->blocks as $block) : ?>
                                <?php if ($block->view) : ?>
                                    <?= $this->render('/article/part_views/block/'.$block->view, [
                                        'model' => $block,
                                    ]) ?>
                                <?php endif; ?>
                                <?php if (!$block->view) : ?>
                                    <?php if ($block->header) : ?>
                                        <h3 class="<?= $block->header_class ?>"><?= $block->header ?></h3>
                                    <?php endif; ?>
                                    <?php if ($block->description) : ?>
                                        <p class="text-center"><?= $block->description ?></p>
                                    <?php endif; ?>
                                    <?php if ($block->items) : ?>
                                        <?php foreach ($block->items as $item) : ?>
                                            <?php if ($item->header) : ?>
                                                <h4 class="<?= $item->header_class ?>"><?= $item->header ?></h4>
                                            <?php endif; ?>
                                            <?php if ($item->description) : ?>
                                                <p class="<?= $item->description_class ?>"><?= $item->description ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

