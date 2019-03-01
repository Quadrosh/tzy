<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tszakaz_ru\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


//AppAsset::register($this);
tszakaz_ru\assets\ArticleAsset::register($this);
//$feedback = Yii::$app->view->params['feedback'];
$feedback = new \common\models\Feedback();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
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


    <!--    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>-->
<!--    <script type="text/javascript">-->
<!--        VK.init({apiId: 6736681, onlyWidgets: true});-->
<!--    </script>-->


    <?php $this->head() ?>
    <?php include_once("analyticstracking.php") ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="b-feedback modal fade" id="feedbackForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal"><span aria-hidden="true" class="b-icon b-icon__close"></span><span class="sr-only"></span></button>
                <h4 class="modal-title">Заказать обратный звонок</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'feedback-form',
                'method' => 'post',
                'action' => ['/site/feedback'],
            ]); ?>
            <div class="modal-body">
                <p>Оставьте ваши контактные данные,<br/>
                    и наш специалист свяжется с Вами в течение 30 минут.</p>

                <div id="feedbackLoading">
                    <span class="b-icon b-icon__loading"></span>
                </div>
                <div id="feedbackNote"></div>

                <div class="form-group clearfix">

                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>

                    <div class="col-xs-6">
                        <?= $form->field($feedback, 'name')
                            ->textInput(['maxlength' => true, 'id' => 'feedback_form-name']) ?>
                    </div>
                    <div class="col-xs-6 text-right">
                        <?= $form->field($feedback, 'phone')
                            ->textInput(['maxlength' => true, 'id' => 'feedback_form-phone']) ?>
                    </div>
                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>Yii::$app->view->params['meta']['list_name'], 'id' => 'feedback_form-from_page'])->label(false) ?>

                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput([ 'id' => 'feedback_form-utm_source'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput([ 'id' => 'feedback_form-utm_medium'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput([ 'id' => 'feedback_form-utm_campaign'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput([ 'id' => 'feedback_form-utm_term'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput([ 'id' => 'feedback_form-utm_content'])->label(false) ?>
                </div>


            </div>
            <div class="modal-footer">

                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-sm']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="wrap ">
    <header>
        <div class="container">
            <div class="row b-top__header">
                <div class="row">
                    <div class="col-sm-4 text-center b-top__logo">
                        <a href="/" ><img src="/img/logo.png" alt="<?= Yii::$app->view->params['meta']['title'] ?>"/></a>
                        <div class="hidden-xs b-top__logo__corner"></div>
                        <button id="hamburger" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="col-sm-8 b-top__info">
                        <div class="b-top__info__above">
                            <div class="col-md-6 col-md-push-6">
                                <p>
                                    <span class="tel" title="+7 (495) 150-05-83">+7 (495) 150-05-83</span>
                                </p>
                            </div>
                            <div class="col-md-6 col-md-pull-6">
                                <a class="btn btn-primary b-top-btn" href="#" data-toggle="modal" data-target="#feedbackForm" title="Заказать обратный звонок">
                                    <i class="b-icon b-icon__phone"></i>
                                    <span>Заказать обратный звонок</span>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div id="w0-collapse" class="collapse navbar-collapse b-top__info__menu col-sm-12">

                        <?= common\widgets\MenuWidget::widget([
                            'site'=>Yii::$app->params['site'],
                            'formfactor'=>'tszakaz',
                            'currentItem'=> Yii::$app->view->params['currentItem']
                        ]); ?>
                    </div>
                </div>

                <div class="b-top__header__shadow"></div>
            </div><!-- /.b-top__header -->
        </div>
    </header>

    <div class="container b-main ">
        <div class=" row match-my-cols overhide">
            <div class="col-sm-12">

                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
            <div class=" col-sm-12 pl0 pr0">


                <?= $content ?>




            </div><!-- /.b-content -->
            <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
                <div id="vk_comments" class="mt80"></div>
            </div>
            <div id="push"></div>
        </div>
    </div><!-- /.b-main -->





    <?php

    //    $script = "alert('".Yii::$app->request->absoluteUrl."')";


//    $script = "VK.Widgets.Comments(\"vk_comments\", {limit: 10, attach: \"*\"});";
//    $this->registerJs($script, yii\web\View::POS_READY);

    ?>



</div>

<footer class="footer_">
    <div class="container footer">
        <div class="row">
            <div class="col-xs-6 col-sm-4 b-footer__info">
                <div class="b-footer__info__content">
                    <p>&copy; Транспортная компания ООО &ldquo;Трансзаказ&rdquo;, <?= date('Y') ?><br/>
                        117535, Москва, 3-й дорожный проезд, д.3а<br/>
                        Телефон: +7 (495) 150-05-83</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-8 b-footer__menu">
                <div class="col-sm-3 text-center ">
                    <a href="/about.html">О компании</a>
                </div>
                <div class="col-sm-3 text-center ">
                    <a href="/services.html">Услуги</a>
                </div>
                <div class="col-sm-3 text-center ">
                    <a href="/contacts.html">Контакты</a>
                </div>
                <div class="col-sm-3 text-center hidden-xs">
                    <a href="/sitemap.html">Карта сайта</a>
                </div>


            </div>

        </div>

    </div><!-- /.footer -->
</footer>

<?php $this->endBody() ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter42636264 = new Ya.Metrika({
                    id:42636264,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42636264" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Yandex.Metrika NEW counter -->
<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter30134129 = new Ya.Metrika({ id:30134129, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/30134129" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



</body>
</html>
<?php $this->endPage() ?>
