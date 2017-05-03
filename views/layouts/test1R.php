<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

//AppAsset::register($this);
app\assets\MainAsset::register($this);
$feedback = Yii::$app->view->params['feedback'];

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

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="b-feedback modal fade" id="feedbackForm"> <!-- feedbackForm modal -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close " data-dismiss="modal" ><span aria-hidden="true" class="b-icon b-icon__close"></span><span class="sr-only"></span></button>

                <h4 class="modal-title">Заказать обратный звонок</h4>
            </div>
            <div class="modal-body">
                <p>Оставьте ваши контактные данные,<br/>
                    и наш специалист свяжется с Вами в течение 30 минут.</p>

                <div id="feedbackLoading">
                    <span class="b-icon b-icon__loading"></span>
                </div>
                <div id="feedbackNote"></div>

                <div class="form-group clearfix">
                    <?php $form = ActiveForm::begin([

                        'id' => 'feedback-form',
                        'method' => 'post',
                        'action' => ['/site/feedback'],
                    ]); ?>
                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>

                    <div class="col-xs-6">
                        <?= $form->field($feedback, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 text-right">
                        <?= $form->field($feedback, 'phone')->textInput(['maxlength' => true]) ?>
                    </div>
                    <?= $form->field($feedback, 'from_page')->hiddenInput(['value'=>Yii::$app->view->params['pageName']])->label(false) ?>
                </div>


            </div>
            <div class="modal-footer">
                <?= Html::submitButton('Отправить', [
                    'class' => 'btn btn-primary btn-sm test-target',
                    'data-tid'=>'4',
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- / feedbackForm modal -->

<div class="b-feedback modal fade" id="orderForm"> <!-- orderForm modal -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close "  data-dismiss="modal" ><span aria-hidden="true" class="b-icon b-icon__close"></span><span class="sr-only"></span></button>

                <h4 class="modal-title">Заказ доставки груза</h4>
            </div>
            <div class="modal-body">

                <?php $form = ActiveForm::begin(['action' =>['test/order'], 'id' => 'order', 'method' => 'post',]); ?>
                <div class="row">
                    <div class="col-sm-6"><?= $form->field($feedback, 'user_id')->textInput(['required' => true])->label('Откуда') ?></div>
                    <div class="col-sm-6"><?= $form->field($feedback, 'city')->textInput(['required' => true])->label('Куда') ?></div>
                    <div class="col-sm-6"><?= $form->field($feedback, 'phone')->textInput(['required' => true]) ?></div>
                    <div class="col-sm-6"><?= $form->field($feedback, 'email')->textInput(['maxlength' => true]) ?></div>
                    <div class="col-sm-6"><?= $form->field($feedback, 'name')->textInput(['required' => true])->label('Характер груза')  ?></div>
                    <div class="col-sm-6"><?= $form->field($feedback, 'contacts')->textInput(['maxlength' => true])->label('Вес')  ?></div>
                    <div class="col-sm-12"> <?= $form->field($feedback, 'text')->textarea(['rows' => 1])->label('Комментарий') ?></div>
                    <?= $form->field($feedback, 'from_page')->hiddenInput(['value'=>Yii::$app->view->params['pageName']])->label(false) ?>
                    <div class="col-sm-6 col-sm-offset-3 text-center">

                        <?= Html::submitButton('отправить заявку', [
                            'class' => 'btn btn-primary test-target sendorder-btn mt20 mb30',

                            'data-tid'=>'7',
                        ]) ?>
                    </div>
                </div>
                <?php $form = ActiveForm::end(); ?>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- / orderForm modal -->


<div class="wrap ">
    <header>
        <div class="container">
            <div class="row b-top__header">
                <div class="col-sm-5 text-center b-top__logo">
                    <a href="/" title="<?= Yii::$app->view->params['meta']['seo_logo'] ?>"><img class="logo_v2" src="/img/transzakaz_logo_v2-1.png" alt="<?= Yii::$app->view->params['meta']['seo_logo'] ?>"/></a>
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
                            <a class="btn btn-primary b-top-btn test-target" href="#" data-toggle="modal" data-tid="3"  data-target="#feedbackForm" title="Заказать обратный звонок">
                                <i class="b-icon b-icon__phone"></i>
                                <span>Заказать обратный звонок</span>
                            </a>
                        </div>



                    </div>
                    <div class="b-top__info__menu">

                        <?= app\widgets\MenuWidget::widget(['formfactor'=>'html','currentItem'=> Yii::$app->view->params['currentItem'] ]); ?>
                    </div>
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
                    <?= app\widgets\SidemenuWidget::widget(['formfactor'=>'accordion','currentItem'=> Yii::$app->view->params['currentItem'] ]); ?>
                    </ul>

                </div><!-- b-sidebar__no_banner -->

            </div><!-- /.b-sidebar -->
            <div class="col-sm-9 col-xs-12  b-content pt20">


                <?= $content ?>

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#prices_abakan" data-toggle="collapse" class="panel-heading btn" >Москва - Абакан</a>
                    <div class="collapse" id="prices_abakan">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>99 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>114 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>119 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>159 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>195 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>197 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>201 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->
                    </div>
                </div> <!-- / город  -->
                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_archangelsk" data-toggle="collapse" class="panel-heading btn" >Москва - Архангельск</a>
                    <div class="collapse" id="pices_archangelsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>29 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>48 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>59 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>61 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>65 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_astrahan" data-toggle="collapse" class="panel-heading btn" >Москва - Астрахань</a>
                    <div class="collapse" id="pices_astrahan">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>32 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>37 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>49 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>60 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>62 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>66 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->


                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_barnaul" data-toggle="collapse" class="panel-heading btn" >Москва - Барнаул</a>
                    <div class="collapse" id="pices_barnaul">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>72 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>78 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>85 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>120 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>145 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>147 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>151 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_belgorod" data-toggle="collapse" class="panel-heading btn" >Москва - Белгород</a>
                    <div class="collapse" id="pices_belgorod">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>31 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_bryansk" data-toggle="collapse" class="panel-heading btn" >Москва - Брянск</a>
                    <div class="collapse" id="pices_bryansk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>7 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>9 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>11 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>13 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>24 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_vladimir" data-toggle="collapse" class="panel-heading btn" >Москва - Владимир</a>
                    <div class="collapse" id="pices_vladimir">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>8 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>13 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>24 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_vnovgorod" data-toggle="collapse" class="panel-heading btn" >Москва - В.Новгород</a>
                    <div class="collapse" id="pices_vnovgorod">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>29 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>32 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_volgograd" data-toggle="collapse" class="panel-heading btn" >Москва - Волгоград</a>
                    <div class="collapse" id="pices_volgograd">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>47 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>49 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>53 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_vologda" data-toggle="collapse" class="panel-heading btn" >Москва - Вологда</a>
                    <div class="collapse" id="pices_vologda">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>29 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_voroneg" data-toggle="collapse" class="panel-heading btn" >Москва - Воронеж</a>
                    <div class="collapse" id="pices_voroneg">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>32 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_eburg" data-toggle="collapse" class="panel-heading btn" >Москва - Екатеринбург</a>
                    <div class="collapse" id="pices_eburg">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>48 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>53 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>70 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>85 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>90 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>94 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_ivanovo" data-toggle="collapse" class="panel-heading btn" >Москва - Иваново</a>
                    <div class="collapse" id="pices_ivanovo">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>28 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_igevsk" data-toggle="collapse" class="panel-heading btn" >Москва - Ижевск</a>
                    <div class="collapse" id="pices_igevsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>34 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>37 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>59 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>62 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>64 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_irkutsk" data-toggle="collapse" class="panel-heading btn" >Москва - Иркутск</a>
                    <div class="collapse" id="pices_irkutsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>115 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>130 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>135 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>140 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>230 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>240 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>245 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_ioshkarola" data-toggle="collapse" class="panel-heading btn" >Москва - Йошкар-Ола</a>
                    <div class="collapse" id="pices_ioshkarola">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>32 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>45 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>49 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kazan" data-toggle="collapse" class="panel-heading btn" >Москва - Казань</a>
                    <div class="collapse" id="pices_kazan">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>21 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>36 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>47 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>52 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kaliningrad" data-toggle="collapse" class="panel-heading btn" >Москва - Калининград</a>
                    <div class="collapse" id="pices_kaliningrad">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>45 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>75 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>80 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>89 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>90 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>94 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kaluga" data-toggle="collapse" class="panel-heading btn" >Москва - Калуга</a>
                    <div class="collapse" id="pices_kaluga">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>10 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>24 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kemerovo" data-toggle="collapse" class="panel-heading btn" >Москва - Кемерово</a>
                    <div class="collapse" id="pices_kemerovo">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>70 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>80 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>90 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>120 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>150 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>155 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>165 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kirov" data-toggle="collapse" class="panel-heading btn" >Москва - Киров</a>
                    <div class="collapse" id="pices_kirov">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>60 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>62 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>67 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kostroma" data-toggle="collapse" class="panel-heading btn" >Москва - Кострома</a>
                    <div class="collapse" id="pices_kostroma">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>13 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>31 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_krasnodar" data-toggle="collapse" class="panel-heading btn" >Москва - Краснодар</a>
                    <div class="collapse" id="pices_krasnodar">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>42 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>49 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>56 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>63 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>66 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>68 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_krasnoyarsk" data-toggle="collapse" class="panel-heading btn" >Москва - Красноярск</a>
                    <div class="collapse" id="pices_krasnoyarsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>98 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>110 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>125 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>160 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>180 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>185 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>190 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kurgan" data-toggle="collapse" class="panel-heading btn" >Москва - Курган</a>
                    <div class="collapse" id="pices_kurgan">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>49 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>56 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>109 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>110 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>114 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>119 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_kursk" data-toggle="collapse" class="panel-heading btn" >Москва - Курск</a>
                    <div class="collapse" id="pices_kursk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>30 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_lipetsk" data-toggle="collapse" class="panel-heading btn" >Москва - Липецк</a>
                    <div class="collapse" id="pices_lipetsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>21 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>29 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_maikop" data-toggle="collapse" class="panel-heading btn" >Москва - Майкоп</a>
                    <div class="collapse" id="pices_maikop">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>39 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>48 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>53 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>55 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>58 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_murmansk" data-toggle="collapse" class="panel-heading btn" >Москва - Мурманск</a>
                    <div class="collapse" id="pices_murmansk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>36 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>42 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>47 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>73 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>87 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>91 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>96 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_murom" data-toggle="collapse" class="panel-heading btn" >Москва - Муром</a>
                    <div class="collapse" id="pices_murom">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>13 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>27 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_nabchelny" data-toggle="collapse" class="panel-heading btn" >Москва - Набережные Челны</a>
                    <div class="collapse" id="pices_nabchelny">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>34 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>39 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>43 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>56 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>60 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>65 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>70 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_nignekamsk" data-toggle="collapse" class="panel-heading btn" >Москва - Нижнекамск</a>
                    <div class="collapse" id="pices_nignekamsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>32 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>37 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>57 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>61 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>66 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_novokuznetsk" data-toggle="collapse" class="panel-heading btn" >Москва - Новокузнецк</a>
                    <div class="collapse" id="pices_novokuznetsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>74 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>79 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>84 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>114 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>154 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>159 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>164 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_novorossiysk" data-toggle="collapse" class="panel-heading btn" >Москва - Новороссийск</a>
                    <div class="collapse" id="pices_novorossiysk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>33 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>36 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>54 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>57 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>59 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_novosibirsk" data-toggle="collapse" class="panel-heading btn" >Москва - Новосибирск</a>
                    <div class="collapse" id="pices_novosibirsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>80 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>98 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>104 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>140 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>175 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>180 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>189 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_nnovgorod" data-toggle="collapse" class="panel-heading btn" >Москва - Нижний Новгород</a>
                    <div class="collapse" id="pices_nnovgorod">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>21 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>29 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_omsk" data-toggle="collapse" class="panel-heading btn" >Москва - Омск</a>
                    <div class="collapse" id="pices_omsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>72 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>79 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>84 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>104 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>131 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>137 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>140 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_orel" data-toggle="collapse" class="panel-heading btn" >Москва - Орел</a>
                    <div class="collapse" id="pices_orel">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>26 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_oreburg" data-toggle="collapse" class="panel-heading btn" >Москва - Оренбург</a>
                    <div class="collapse" id="pices_oreburg">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>38 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>43 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>48 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>64 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>72 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>77 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>83 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_orsk" data-toggle="collapse" class="panel-heading btn" >Москва - Орск</a>
                    <div class="collapse" id="pices_orsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>48 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>53 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>61 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>74 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>80 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>88 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>94 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_penza" data-toggle="collapse" class="panel-heading btn" >Москва - Пенза</a>
                    <div class="collapse" id="pices_penza">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>29 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>41 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>45 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_perm" data-toggle="collapse" class="panel-heading btn" >Москва - Пермь</a>
                    <div class="collapse" id="pices_perm">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>39 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>43 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>57 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>74 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>78 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>86 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_petrozavodsk" data-toggle="collapse" class="panel-heading btn" >Москва - Петрозаводск</a>
                    <div class="collapse" id="pices_petrozavodsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>39 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>45 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>55 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_pskov" data-toggle="collapse" class="panel-heading btn" >Москва - Псков</a>
                    <div class="collapse" id="pices_pskov">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>21 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>32 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>37 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_pyatigorsk" data-toggle="collapse" class="panel-heading btn" >Москва - Пятигорск</a>
                    <div class="collapse" id="pices_pyatigorsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>36 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>41 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>46 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>55 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>67 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>70 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>72 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_rostovdon" data-toggle="collapse" class="panel-heading btn" >Москва - Ростов на Дону</a>
                    <div class="collapse" id="pices_rostovdon">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>29 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>55 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>57 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>59 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_ryazan" data-toggle="collapse" class="panel-heading btn" >Москва - Рязань</a>
                    <div class="collapse" id="pices_ryazan">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>11 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>21 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_samara" data-toggle="collapse" class="panel-heading btn" >Москва - Самара</a>
                    <div class="collapse" id="pices_samara">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>34 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>45 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>53 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>56 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>58 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_saransk" data-toggle="collapse" class="panel-heading btn" >Москва - Саранск</a>
                    <div class="collapse" id="pices_saransk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>24 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>29 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>34 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>38 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>41 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>44 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_saratov" data-toggle="collapse" class="panel-heading btn" >Москва - Саратов</a>
                    <div class="collapse" id="pices_saratov">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>31 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>54 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>57 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_spb" data-toggle="collapse" class="panel-heading btn" >Москва - Санкт-Петербург</a>
                    <div class="collapse" id="pices_spb">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>32 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_smolensk" data-toggle="collapse" class="panel-heading btn" >Москва - Смоленск</a>
                    <div class="collapse" id="pices_smolensk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>21 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>26 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_sochi" data-toggle="collapse" class="panel-heading btn" >Москва - Сочи</a>
                    <div class="collapse" id="pices_sochi">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>43 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>62 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>71 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>100 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>104 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>107 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_stavropol" data-toggle="collapse" class="panel-heading btn" >Москва - Ставрополь</a>
                    <div class="collapse" id="pices_stavropol">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>52 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>62 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>66 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>71 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_syktyvkar" data-toggle="collapse" class="panel-heading btn" >Москва - Сыктывкар</a>
                    <div class="collapse" id="pices_syktyvkar">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>36 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>41 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>55 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>64 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>66 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>70 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_tambov" data-toggle="collapse" class="panel-heading btn" >Москва - Тамбов</a>
                    <div class="collapse" id="pices_tambov">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>13 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>28 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_tver" data-toggle="collapse" class="panel-heading btn" >Москва - Тверь</a>
                    <div class="collapse" id="pices_tver">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>9 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>11 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>15 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>18 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_tomsk" data-toggle="collapse" class="panel-heading btn" >Москва - Томск</a>
                    <div class="collapse" id="pices_tomsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>73 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>79 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>84 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>120 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>150 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>155 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>165 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_tula" data-toggle="collapse" class="panel-heading btn" >Москва - Тула</a>
                    <div class="collapse" id="pices_tula">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>8 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>10 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>12 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>20 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_tymen" data-toggle="collapse" class="panel-heading btn" >Москва - Тюмень</a>
                    <div class="collapse" id="pices_tymen">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>44 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>58 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>79 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>100 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>105 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>110 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_ulianovsk" data-toggle="collapse" class="panel-heading btn" >Москва - Ульяновск</a>
                    <div class="collapse" id="pices_ulianovsk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>19 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>21 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>41 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>47 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>51 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>55 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_ufa" data-toggle="collapse" class="panel-heading btn" >Москва - Уфа</a>
                    <div class="collapse" id="pices_ufa">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>27 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>50 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>70 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>75 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>79 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_hantymansiysk" data-toggle="collapse" class="panel-heading btn" >Москва - Ханты-Мансийск</a>
                    <div class="collapse" id="pices_hantymansiysk">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>58 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>68 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>75 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>100 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>130 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>135 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>140 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_cheboksary" data-toggle="collapse" class="panel-heading btn" >Москва - Чебоксары</a>
                    <div class="collapse" id="pices_cheboksary">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>25 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>30 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>33 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>35 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>40 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>42 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>45 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_cherepovets" data-toggle="collapse" class="panel-heading btn" >Москва - Череповец</a>
                    <div class="collapse" id="pices_cherepovets">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>14 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>16 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>18 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>28 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>31 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_engels" data-toggle="collapse" class="panel-heading btn" >Москва - Энгельс</a>
                    <div class="collapse" id="pices_engels">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>23 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>26 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>41 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>45 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>47 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>50 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

                <div class="test_clean_collapse"> <!-- город  -->
                    <a href="#pices_yaroslavl" data-toggle="collapse" class="panel-heading btn" >Москва - Ярославль</a>
                    <div class="collapse" id="pices_yaroslavl">
                        <table class="russia_prices table-bordered">
                            <thead>
                            <tr>
                                <th>Тип автомобиля</th>
                                <th>Стоимость руб.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,5 тонны Газель </td>
                                <td>10 000</td>
                            </tr>
                            <tr>
                                <td>3 тонны Бычок</td>
                                <td>11 000</td>
                            </tr>
                            <tr>
                                <td>5 тонн</td>
                                <td>13 000</td>
                            </tr>
                            <tr>
                                <td>10 тонн</td>
                                <td>17 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (тент/борт)</td>
                                <td>20 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (изотермический)</td>
                                <td>22 000</td>
                            </tr>
                            <tr>
                                <td>20 тонн (рефрижератор)</td>
                                <td>25 000</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center">  <!-- order button -->

                            <?= Html::a('Оформить заявку', ['#'],[
                                'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                                'data-toggle'=>'modal',
                                'data-target'=>'#orderForm',
                                'data-tid'=>'6',
                            ]) ?>
                        </div> <!-- / order button -->

                    </div>
                </div> <!-- / город  -->

<!--                Last  -->
                <div class="text-center">  <!-- order form -->

                    <?= Html::a('Оформить заявку', ['#'],[
                        'class' => 'btn btn-primary test-target order-btn mt30 mb30',
                        'data-toggle'=>'modal',
                        'data-target'=>'#orderForm',
                        'data-tid'=>'6',
                    ]) ?>
                </div>

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
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-91546284-1', 'auto');
    ga('send', 'pageview');

</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
