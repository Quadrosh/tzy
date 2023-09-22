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
tszakaz_ru\assets\MainAsset::register($this);
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
                <p class="modal-title">Заказать обратный звонок</p>
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
                        ->hiddenInput(['value'=>Yii::$app->view->params['pageName'], 'id' => 'feedback_form-from_page'])->label(false) ?>

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
                        <a href="/" title="<?= Yii::$app->view->params['meta']['seo_logo'] ?>"><img src="/img/logo.png" alt="<?= Yii::$app->view->params['meta']['seo_logo'] ?>"/></a>
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
                                    <span class="tel" title="8 800 350 05 56">8 800 350 05 56</span>
                                </p>
                            </div>
                            <div class="col-md-6 col-md-pull-6">
                                <a class="btn btn-primary b-top-btn"
                                   href="#"
                                   data-toggle="modal"
                                   data-target="#feedbackForm"
                                   title="Заказать обратный звонок">
                                    <svg version="1.1"
                                         class="phoneIconSvg"
                                         xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 70.9 70.9"
                                         style="enable-background:new 0 0 70.9 70.9;" xml:space="preserve">
<style type="text/css">
    .phoneIconSvg_st0{fill:#FFFFFF;}
</style>
                                        <path class="phoneIconSvg_st0" d="M54.6,31.8c-0.6,0-1.2-0.4-1.4-1c-3.9-12.3-16.2-14-16.7-14.1c-0.8-0.1-1.4-0.9-1.3-1.7s0.9-1.4,1.7-1.3
	c0.6,0.1,14.7,2,19.2,16.1c0.3,0.8-0.2,1.6-1,1.9C54.9,31.8,54.8,31.8,54.6,31.8z"/>
                                        <path class="phoneIconSvg_st0" d="M50.4,33.6c-0.6,0-1.2-0.4-1.4-1c-3.1-9.6-12.7-11-13.1-11c-0.8-0.1-1.4-0.9-1.3-1.7c0.1-0.8,0.9-1.4,1.7-1.3
	c0.5,0.1,12,1.6,15.6,13.1c0.3,0.8-0.2,1.6-1,1.9C50.7,33.5,50.6,33.6,50.4,33.6z"/>
                                        <path class="phoneIconSvg_st0" d="M46,53.8c2.1-0.5,3.4-1.5,3.6-1.7c1-0.8,1.8-1.8,2.4-3c0.3-0.7,0.5-1.3,0.4-2.1c-0.1-0.9-0.4-1.7-1-2.4
	c-0.5-0.5-1.1-0.7-1.7-0.9c-2-0.4-4-0.8-6-1.2c-1-0.2-2-0.3-3-0.2c-0.6,0-1.1,0.2-1.4,0.8c-0.3,0.5-0.6,1-0.8,1.4
	c-0.2,0.3-0.4,0.7-0.6,1c-5.2-2.4-9.1-6-11.8-11c0.2-0.1,0.4-0.2,0.6-0.4c0.6-0.4,1.2-0.8,1.8-1.2c0.5-0.3,0.6-0.8,0.7-1.3
	c0.1-0.9,0-1.7-0.2-2.6c-0.5-2.2-1-4.4-1.5-6.6c-0.3-1.2-0.9-2-2.1-2.4c-0.9-0.3-1.8-0.4-2.8-0.1c-2,0.8-3.5,2.1-4.5,4
	c-1,2.1-1.3,4.3-1,6.6c0.2,1.8,0.7,3.5,1.4,5.1c1.4,3.1,3.4,5.8,5.8,8.2c2.8,2.8,6.1,5.1,9.6,7.1c2.8,1.5,4.6,2.1,6,2.5
	C41.6,54,43.6,54.4,46,53.8z"/>
                                        <path class="phoneIconSvg_st0" d="M35.4,65.7c-16.7,0-30.3-13.6-30.3-30.3S18.7,5.1,35.4,5.1s30.3,13.6,30.3,30.3c0,5.7-2.3,10.6-6.6,14
	c-5.6,4.4-13,5.4-16.2,4.6c-0.8-0.2-1.3-1-1.1-1.8c0.2-0.8,1-1.3,1.8-1.1c2.7,0.6,9.2-0.4,13.7-4c3.6-2.9,5.5-6.8,5.5-11.6
	c0-15.1-12.2-27.3-27.3-27.3S8.1,20.4,8.1,35.4c0,15.1,12.2,27.3,27.3,27.3c0.8,0,1.5,0.7,1.5,1.5C36.9,65.1,36.3,65.7,35.4,65.7z"
                                        />
</svg>
                                    <span>Заказать обратный звонок</span>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div id="w0-collapse" class="collapse navbar-collapse b-top__info__menu col-sm-12">

                        <?= common\widgets\MenuWidget::widget([
                            'site'=>Yii::$app->params['site'],
                            'formfactor'=>'tszakaz',
                            'currentItem'=> isset(Yii::$app->view->params['currentItem'])? Yii::$app->view->params['currentItem']:0,
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
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-xs-12  b-content pt20">



                <?= $content ?>



            </div><!-- /.b-content -->
            <div id="push"></div>
        </div>
    </div><!-- /.b-main -->





</div>

<?= $this->render('/layouts/footer', []) ?>

<?php $this->endBody() ?>
<!-- чат -->
<script type="text/javascript" src="//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=6459688720400384"></script>
<!-- /чат -->

<?php include_once("analytics_yandex.php") ?>

</body>
</html>
<?php $this->endPage() ?>
