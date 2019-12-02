<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;

$supportIcon = '<i class="glyphicon glyphicon-wrench"></i> ';
$landingIcon = '<i class="glyphicon glyphicon-plane"></i> ';
$orderIcon = '<i class="glyphicon glyphicon-shopping-cart"></i> ';
$commentIcon = '<i class="glyphicon glyphicon-comment"></i> ';
$usersIcon = '<i class="glyphicon glyphicon-user"></i> ';
$articleIcon = '<i class="glyphicon glyphicon-picture"></i> ';
$logoutIcon = '<i class="glyphicon glyphicon-log-out"></i> ';


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

    $tzFavicon = '<svg version="1.1" 
	xmlns="http://www.w3.org/2000/svg" 
	xmlns:xlink="http://www.w3.org/1999/xlink" 
	x="0px" y="0px"
	viewBox="0 0 80 80" 
	style="enable-background:new 0 0 80 80; width:40px;height:40px;position: absolute;top: 5px;" 
	xml:space="preserve">
<style type="text/css">
	.tz_favi_st0{fill:#9d9d9d;}
</style>
<g>
	<path class="tz_favi_st0" d="M6.4,6.2v10.1v2.6h49.9C40.2,26.7,6.4,45.5,6.4,65.6v8.2H24c0,0-9.3-26.5,37.6-50.7v50.7H74V6.2H6.4z"/>
	<path class="tz_favi_st0" d="M36.3,64.1c-0.6,5.7,0.1,9.7,0.1,9.7h15.7c-1.6-2.5-2.6-5.3-3.2-8.2L36.3,64.1z"/>
	<path class="tz_favi_st0" d="M6.4,44.9v2.4c0,0,0.5-0.8,1.4-2.1L6.4,44.9z"/>
	<path class="tz_favi_st0" d="M48.3,54.5l-9.1-2.1c-1.2,2.8-1.9,5.6-2.4,8.2l11.6,1.3C48.1,59.5,48.1,56.9,48.3,54.5z"/>
	<path class="tz_favi_st0" d="M6.8,32.8c-0.2,0.2-0.3,0.4-0.4,0.5v8.7l3.3,0.8c1.7-1.9,4-4.3,7.1-6.8L6.8,32.8z"/>
	<path class="tz_favi_st0" d="M43.5,44.6c-1.3,1.7-2.4,3.5-3.3,5.3l8.2,1.9c0.2-1.9,0.5-3.7,0.8-5.3L43.5,44.6z"/>
	<path class="tz_favi_st0" d="M16.9,26.7c-3.1,1-5.9,2.4-8.1,4.2l10.3,3.3c1.9-1.4,4-2.8,6.3-4.2L16.9,26.7z"/>
	<path class="tz_favi_st0" d="M51.2,38.5c0.3-1.2,0.6-1.8,0.6-1.8c-0.6,0.4-1.2,0.9-1.8,1.3L51.2,38.5z"/>
	<path class="tz_favi_st0" d="M48.7,39.2c-1.3,1.1-2.4,2.2-3.5,3.4l4.6,1.5c0.3-1.6,0.7-2.9,1-4.1L48.7,39.2z"/>
	<g>
		<path class="tz_favi_st0" d="M33.1,26.1c2.1-0.9,4.4-1.8,6.8-2.6c0,0-4.9-0.1-11.1,0.7L33.1,26.1z"/>
		<path class="tz_favi_st0" d="M27.1,24.4c-2.5,0.4-5.2,0.9-7.7,1.6l7.9,3.1c1.5-0.8,3.1-1.7,4.8-2.4L27.1,24.4z"/>
	</g>
</g>
</svg>';




    NavBar::begin([
        'brandLabel' => $tzFavicon.' <span style="padding-left: 43px">'. Yii::$app->user->identity['username'].'</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [


            Yii::$app->user->can('creatorPermission', [])
                ? (['label' => $usersIcon, 'url' => ['/usermanage']])
                : (['label' => false]),



            [
                'label' => $commentIcon,
                'items' => [
                    ['label' => 'comments', 'url' => ['/comment/manage/index']],
                    ['label' => 'frontUsers', 'url' => ['/front-user']],
                ],
            ],
            [
                'label' => $landingIcon,
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
                'label' => $articleIcon,
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
                'label' => $supportIcon,
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
                'label' => $orderIcon,
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
                    $logoutIcon.' (' . Yii::$app->user->identity->username . ')',
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
