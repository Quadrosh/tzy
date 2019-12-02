<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlock */
/* @var $section common\models\ArticleSection */
/* @var $block common\models\ArticleSectionBlock */
/* @var $item common\models\ArticleSectionBlockItem */



?>
<div class="asb-slick_top <?= $model->custom_class?>">

    <div class="carouselWrapper">
        <?php if ($model->header) : ?>
            <h3 class="<?= $model->header_class ?>"><?= $model->header ?></h3>
        <?php endif; ?>

        <?php if ($model->description) : ?>
            <p class="text-center"><?= $model->description ?></p>
        <?php endif; ?>

        <?php if ($model->items) : ?>
            <div class="asb-slick_top_carousel text-center">
                <?php foreach ($model->items as $item) : ?>
                    <div class="carousel_item">

                        <?php if ($item->view) : ?>
                            <?= $this->render('/article/part_views/block_item/'.$item->view, [
                                'model' => $item,
                            ]) ?>
                        <?php endif; ?>

                        <?php if (!$item->view) : ?>
                            <?php if ($item->header) : ?>
                                <h4 class="<?= $item->header_class ?>"><?= $item->header ?></h4>
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
            <a class="carouselControl sticky_slick_top_slickPrev"><svg version="1.1"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="0 0 30 80"
                                                                         style="enable-background:new 0 0 30 80;"
                                                                         xml:space="preserve">


                    <path class="caru_arr_l_st0" d="M10.7,40l10.9-30c0.2-0.5-0.1-1.1-0.6-1.3c-0.5-0.2-1.1,0.1-1.3,0.6l-11,30.3c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.2
	s0,0.1,0,0.2c0,0,0,0.1,0,0.1l11,30.3c0.1,0.4,0.5,0.7,0.9,0.7c0.1,0,0.2,0,0.3-0.1c0.5-0.2,0.8-0.8,0.6-1.3L10.7,40z"/>
</svg></a>

            <a class="carouselControl sticky_slick_top_slickNext" ><svg version="1.1"
                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                          xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                          x="0px" y="0px"
                                                                          viewBox="0 0 30 80"
                                                                          style="enable-background:new 0 0 30 80;"
                                                                          xml:space="preserve">

                    <path class="caru_arr_r_st0" d="M19.5,40L8.7,10C8.5,9.5,8.7,8.9,9.3,8.8c0.5-0.2,1.1,0.1,1.3,0.6l11,30.3c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.2s0,0.1,0,0.2
	c0,0,0,0.1,0,0.1l-11,30.3c-0.1,0.4-0.5,0.7-0.9,0.7c-0.1,0-0.2,0-0.3-0.1c-0.5-0.2-0.8-0.8-0.6-1.3L19.5,40z"/>
</svg></a>

            <a class="linkToElement downMore text-center"   data-target="bottom_corner">
                <svg version="1.1"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 79.4 28.3"
                     style="enable-background:new 0 0 79.4 28.3; width: 80px;height: 80px;margin-top: 50px;"
                     xml:space="preserve">
<path fill="white"  d="M39.8,18.7L9.8,7.8C9.3,7.6,8.7,7.9,8.5,8.4s0.1,1.1,0.6,1.3l30.3,11h0.1c0.1,0,0.1,0,0.2,0s0.1,0,0.2,0H40l30.3-11
	C70.7,9.6,71,9.2,71,8.8c0-0.1,0-0.2-0.1-0.3c-0.2-0.5-0.8-0.8-1.3-0.6L39.8,18.7z"/>
</svg>
            </a>

        <?php endif; ?>
    </div>

<div id="bottom_corner"></div>
</div>

