<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;


tszakaz_ru\assets\ArticleAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->view->params['meta']['title'] ?></title>
    <meta name="description" content="<?= Yii::$app->view->params['meta']['description'] ?>">
    <meta name="keywords" content="<?= Yii::$app->view->params['meta']['keywords'] ?>">

    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Транспортная компания ТрансЗаказ" />
    <meta property="og:title" content="<?= Yii::$app->view->params['meta']['title'] ?>" />
    <meta property="og:description" content="<?= Yii::$app->view->params['meta']['description'] ?>" />
    <meta property="og:url" content="<?= Url::current(['lg'=>null], true) ?>" />
    <meta property="og:image" content="<?= Url::base(true) ?>/img/tz_logo_blue.jpg" />
    <meta property="og:image" content="<?= Url::base(true) ?>/img/tz_logo_square.jpg" />

    <?php $this->head() ?>
    <?php include_once("analyticstracking.php") ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <?//= Html::errorSummary($feedback, ['class' => 'errors']) ?>

    <?= $content ?>
</div>






<?php $this->endBody() ?>

<!-- Yandex.Metrika NEW counter -->
<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter30134129 = new Ya.Metrika({ id:30134129, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/30134129" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
<?php $this->endPage() ?>
