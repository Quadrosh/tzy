<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;

AppAsset::register($this);
//app\assets\MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Трансзаказ '. Yii::$app->user->identity['username'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->can('creatorPermission', [])
                ? (['label' => 'Users', 'url' => ['/usermanage']])
                : (['label' => false]),
            [
                'label' => 'Landing',
                'items' => [
                    ['label' => 'Landing Page', 'url' => ['/landingpage']],
                    ['label' => 'Landing Section', 'url' => ['/landingsection']],
                    ['label' => 'Landing List Item', 'url' => ['/landinglistitem']],
                    ['label' => 'visits', 'url' => ['/visit']],
                    ['label' => 'test', 'url' => ['/test/index']],
                    ['label' => 'test page', 'url' => ['/testpage/index']],
                    ['label' => 'test target', 'url' => ['/testtarget/index']],
                ],
            ],

            [
                'label' => 'контент',
                'items' => [
                    ['label' => 'Article', 'url' => ['/article']],
                    ['label' => 'Pages', 'url' => ['/pages']],
                    ['label' => 'Menu Nested Sets', 'url' => ['/menu']],
                    ['label' => 'Цены', 'url' => ['/price']],
                    ['label' => 'Города', 'url' => ['/city']],
                    ['label' => 'City Price Calc', 'url' => ['/city-price-calc']],

                ],
            ],
            [
                'label' => 'lib',
                'items' => [
                    ['label' => 'Менеджеры', 'url' => ['/manager']],
                    ['label' => 'Статус заказа', 'url' => ['/orderstatus']],
                    ['label' => 'Images', 'url' => ['/imagefiles']],
                    ['label' => 'Chat Items', 'url' => ['/chatitem']],
                    ['label' => 'Chat Messages', 'url' => ['/chatmessage']],
                    ['label' => 'Sites', 'url' => ['/sites']],
                    ['label' => 'Кузовы', 'url' => ['/truck']],
                    ['label' => 'Article Section', 'url' => ['/article-section']],
                    ['label' => 'Article Section Block', 'url' => ['/article-section-block']],
                    ['label' => 'Article Section Block Item', 'url' => ['/article-section-block-item']],
                    ['label' => 'Menu Top', 'url' => ['/menu-top']],
                    ['label' => 'Menu Side', 'url' => ['/menu-side']],

                ],
            ],
            [
                'label' => 'Заявки',
                'items' => [
                    ['label' => 'Предзаказы', 'url' => ['/preorders']],
                    ['label' => 'Перезвони мне', 'url' => ['/feedback']],
                    ['label' => 'Все заявки с UTM', 'url' => ['/preorders/utm']],
                    ['label' => 'Заявки - качество', 'url' => ['/preorders/lead-quality']],
                    ['label' => 'Landing - Stat by day', 'url' => ['/landingpage/stat?days=7']],
                    ['label' => 'Landing - визиты', 'url' => ['/visit']],
                ],
            ],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/admin/default/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= common\widgets\Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Трансзаказ <?= date('Y') ?></p>

<!--        <p class="pull-right">Глобал Логистик Групп</p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
