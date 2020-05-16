<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tszakaz_ru\assets\AppAsset;
use yii\bootstrap\ActiveForm;

//AppAsset::register($this);
tszakaz_ru\assets\MainAsset::register($this);
$feedback = new \common\models\Feedback();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Трансзаказ - страница перемещена или не существует</title>
    <meta name="description" content="Трансзаказ - страница перемещена или не существует">

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
                        ->hiddenInput(['value'=>'error'])->label(false) ?>

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
                <div class="col-sm-5 text-center b-top__logo">
                    <a href="/" title="<?= Yii::$app->view->params['meta']['seo_logo'] ?>"><img src="/img/logo.png" alt="Трансзаказ"/></a>
                    <div class="hidden-xs b-top__logo__corner"></div>
                </div>
                <div class="col-sm-7 b-top__info">
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
                <div class="b-top__info__menu">

                    <?= common\widgets\MenuWidget::widget([
                        'site'=>Yii::$app->params['site'],
                        'formfactor'=>'tszakaz',
                        'currentItem'=> Yii::$app->view->params['currentItem']
                    ]); ?>
                </div>
                <div class="b-top__header__shadow"></div>
            </div><!-- /.b-top__header -->
        </div>
    </header>

    <div class="container b-main ">
        <div class=" row match-my-cols overhide">
            <div class="col-sm-3 hidden-xs b-sidebar ">
                <div class=" b-sidebar__no_banner  ">
                    <ul id="accordion" class="list-unstyled" >
                    <?= common\widgets\SidemenuWidget::widget([
                        'site'=> Yii::$app->view->params['site'],
                        'formfactor'=>'accordion',
                        'currentItem'=> Yii::$app->view->params['currentItem']
                    ]); ?>
                    </ul>

                </div><!-- b-sidebar__no_banner -->

            </div><!-- /.b-sidebar -->
            <div class="col-sm-9 col-xs-12  b-content pt20">


                <?= $content ?>



            </div><!-- /.b-content -->
            <div id="push"></div>
        </div>
    </div><!-- /.b-main -->





</div>

<footer class="footer_">
    <div class="container footer">
        <div class="row">
            <div class="col-xs-6 col-sm-4 b-footer__info">
                <div class="b-footer__info__content">
                    <p>&copy; Транспортная компания ООО &ldquo;Трансзаказ&rdquo;, <?= date('Y') ?><br/>
                        117535, Москва, 3-й дорожный проезд, д.3а<br/>
                        Телефон: +7 (495) 381-99-56</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-8 b-footer__menu">
                <div class="col-sm-3 text-center ">
                    <a href="/services.html">Услуги</a>
                </div>
                <div class="col-sm-3 text-center ">
                    <a href="/services_partnership.html">Сотрудничество</a>
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
<?php include_once("analytics_yandex.php") ?>

<!-- calltouch code -->
<!--<script type="text/javascript">-->
<!--    (function (w, d, nv, ls){-->
<!--        var cid  = function () { try { var m1 = d.cookie.match('(?:^|;)\\s*_ga=([^;]*)');if (!(m1 && m1.length > 1)) return null; var m2 = decodeURIComponent(m1[1]).match(/(\d+\.\d+)$/); if (!(m2 && m2.length > 1)) return null; return m2[1]} catch (err) {}}();-->
<!--        var ct = function (w, d, e, c, n){ var a = 'all', b = 'tou', src = b + 'c' + 'h';  src = 'm' + 'o' + 'd.c' + a + src;-->
<!--            var jsHost = "https://" + src, p = d.getElementsByTagName(e)[0],s = d.createElement(e);-->
<!--            s.async = 1; s.src = jsHost + "." + "r" + "u/d_client.js?param;" + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":170310}") + ";";-->
<!--            if (!w.jQuery) { var jq = d.createElement(e); jq.src = jsHost + "." + "r" + 'u/js/jquery-1.7.min.js'; jq.onload = function () {-->
<!--                p.parentNode.insertBefore(s, p);};-->
<!--                p.parentNode.insertBefore(jq, p);}else{-->
<!--                p.parentNode.insertBefore(s, p);}};-->
<!--        var gaid = function(w, d, o, ct, n){ if (!!o){ w.ct_timer = 0; w.ct_max_iter = (navigator.userAgent.match(/Opera|OPR\//) ? 10 : 20); w.ct_interval = setInterval(function(){-->
<!--            w.ct_timer++; if (w.ct_timer>=w.ct_max_iter) { clearInterval(w.ct_interval); ct(w, d, 'script', null, n); }},200);-->
<!--            w[o](function (){ var clId = null; try { var cnt = w[o] && w[o].getAll ? w[o].getAll() : null; clId = cnt && cnt.length > 0 && !!cnt[0] && cnt[0].get ? cnt[0].get('clientId') : null;} catch(e){ console.warn("Unable to get clientId, Error: "+e.message);} clearInterval(w.ct_interval); if(w.ct_timer < w.ct_max_iter){ct(w, d, 'script', clId, n);}});}else{ct(w, d, 'script', null, n);}};-->
<!--        if (cid === null && !!w.GoogleAnalyticsObject){-->
<!--            if (w.GoogleAnalyticsObject=='ga_ckpr') w.ct_ga='ga'; else w.ct_ga = w.GoogleAnalyticsObject;-->
<!--            if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1){new Promise(function (resolve) {var db, on = function () {  resolve(true)  }, off = function () {  resolve(false)}, tryls = function tryls() { try { ls && ls.length ? off() : (ls.x = 1, ls.removeItem("x"), off());} catch (e) { nv.cookieEnabled ? on() : off(); }};w.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on) : "MozAppearance" in d.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db.onsuccess = off) : /constructor/i.test(w.HTMLElement) ? tryls() : !w.indexedDB && (w.PointerEvent || w.MSPointerEvent) ? on() : off();}).then(function (pm){-->
<!--                if (pm){gaid(w, d, w.ct_ga, ct, 2);}else{gaid(w, d, w.ct_ga, ct, 3);}})}else{gaid(w, d, w.ct_ga, ct, 4);}-->
<!--        }else{ct(w, d, 'script', cid, 1);}})(window, document, navigator, localStorage);-->
<!--</script>-->
<!-- /calltouch code -->

</body>
</html>
<?php $this->endPage() ?>
