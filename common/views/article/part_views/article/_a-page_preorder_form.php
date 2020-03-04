<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;

$preorderForm = new \common\models\Preorders();

?>
<div class="a-page_preorder_form">
    <div class="row">
        <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
            <?= Alert::widget() ?>
            <?php if ($article->h1) : ?>
                <h1 class="text-center"><?= Html::encode($article->h1) ?></h1>
            <?php endif; ?>

            <?php if ($article->exerpt) : ?>
                <p><?= $article->exerpt ?></p>
            <?php endif; ?>
            <?php if ($article->exerpt_big) : ?>
                <p><?= $article->exerpt_big ?></p>
            <?php endif; ?>

            <?php if ($article->raw_text) : ?>
                <p><?= nl2br($article->raw_text)  ?></p>
            <?php endif; ?>
        </div>
    </div>


    <?php if ($article->sections) : ?>
        <?php foreach ($article->sections as $section) : ?>
            <?php if ($section->view) : ?>
                <?= $this->render('/article/part_views/section/'.$section->view, [
                    'model' => $section,
                    'article' => $article,
                ]) ?>
            <?php endif; ?>
            <?php if (!$section->view) : ?>
                <?= $this->render('/article/part_views/section/_as-default', [
                    'model' => $section,
                    'article' => $article,
                ]) ?>
            <?php endif; ?>
           
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2 text-right">
            <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
            <script src="//yastatic.net/share2/share.js"></script>
            <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,lj,viber,whatsapp,skype,telegram"></div>
    </div>

    </div>

    <div class="text-center mb20 mt100">
        <?= Html::a('Оформить заявку', '#orderForm',['class' => 'btn btn-primary order-btn mt10 mb20', 'data-toggle'=>'collapse']) ?>
    </div>

    <div class="feedback-form panel-collapse collapse col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2 " id="orderForm">
        <?= $this->render('/article/part_views/article/_order-form', [
            'id' => 'page_preorder_form',
        ]) ?>
    </div>
</div>


<?php
    if (substr( \yii\helpers\Url::base(''),0,5)!='//cp.') {
        echo \common\modules\comments\widgets\Comment::widget([
            'model' => $article,
        ]);
    }
?>