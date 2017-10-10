<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//use \yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
//$this->title = 'Page View';
//$this->params['breadcrumbs'][] = $this->title;

$feedback = new \app\models\Feedback();
$preorder = new \app\models\Preorders();
?>


<nav id="w10" class="navbar-inverse  navbar" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a class="navbar-brand" href="/" title="<?= $page ['seo_logo'] ?>"><img src="/img/tz_logo_w.png" alt="<?= $page['seo_logo'] ?>"></a>
            </div>
            <div class="col-sm-6 navbar-centerlead">
                <h1 class="lead"><?= $sections['top']['lead'] ?></h1>
                <h2 class="text"><?= $sections['top']['text'] ?></h2>
            </div>
            <div class="col-sm-3">
                <div  class="navbar-collapse_">
                    <ul id="w11" class="navbar-nav navbar-right nav">
                        <li><svg version="1.1"
                                 class="phone_icon"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 x="0px" y="0px"
                                 viewBox="0 0 16.2 14.6"
                                 style="enable-background:new 0 0 16.2 14.6;"
                                 xml:space="preserve">
                        <style type="text/css">
                            .phone_icon_st0{fill:#FFFFFF;}
                        </style>
                                <g >
                                    <path  class="phone_icon_st0" d="M13.7,12.5c0,0-0.9,0.9-2.2,1.1c0,0-2.7-1.6-3.4-2c-0.7-0.4-2.9-2.4-4.2-4.3S1.9,4,1.9,4
		S1.8,2.7,2.9,1.7l2.4,3.5c0,0-0.4,0.7,0,1.2c0.4,0.5,3.9,3.9,3.9,3.9s0.5,0.2,1-0.1L13.7,12.5z"/>
                                    <path  class="phone_icon_st0" d="M6,4.6L5.6,4.9L3.2,1.5l0.5-0.3C3.8,1,4,1.1,4.1,1.2l2,2.9C6.2,4.3,6.2,4.5,6,4.6z"/>
                                    <path  class="phone_icon_st0" d="M14.2,11.7l-0.3,0.5l-3.6-2.3l0.3-0.5c0.1-0.2,0.3-0.2,0.5-0.1l3,1.9
		C14.2,11.3,14.3,11.5,14.2,11.7z"/>
                                </g>
                        </svg><span class="phone_num">(495) 150-05-83</span></li>
                        <!--                <li><a  id="navbarOrderBtn" class="btn btn-default">Заказать</a></li>-->

                    </ul>
                </div>
            </div>
        </div>

    </div>
</nav>
<div class="container <?= $page['color'] ?>">
<!--   dark top-->
    <section class="<?= $sections['top']['stylekey'] ?> <?= $sections['top']['section_type'] ?>" style=" background-image: url(/img/<?= $sections['top']['image'] ?>)">
        <h1 class="head"><?= $sections['top']['head'] ?></h1>
        <h2 class="extra"><?= $sections['top']['extra'] ?></h2>
        <div class="col-sm-6 col-sm-offset-3 ">
            <?= \app\widgets\Alert::widget() ?>
        </div>
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 garageBox">
            <div class="garage">
                <?php foreach ($sections['topListItems'] as $car) : ?>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="car_head">
                                <?= $car ['head'] ?>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <div class="car_image">
                                <?= Html::img('/img/'.$car ['image'],['alt'=>$car ['image_alt']]) ?>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <div class="car_text">
                                <?= nl2br($car ['text']) ?>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <a data-action="<?= $car ['head'] ?>"
                                class="btn btn-danger garageOrderButton">Заказать</a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <a class="carouselControl garagePrev"><svg version="1.1"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                                      x="0px" y="0px"
                                                      viewBox="0 0 100 100"
                                                      style="enable-background:new 0 0 100 100;"
                                                      xml:space="preserve">
    <style type="text/css">
        .button_x5F_left_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
        .button_x5F_left_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
    </style>
                    <g >
                        <circle  class="button_x5F_left_st0" cx="49.7" cy="50" r="46.4"/>
                        <line  class="button_x5F_left_st1" x1="38.9" y1="50" x2="61.5" y2="27.5"/>
                        <line  class="button_x5F_left_st1" x1="38.9" y1="50.5" x2="61.5" y2="73"/>
                    </g>
    </svg></a>

            <a class="carouselControl garageNext" ><svg version="1.1"
                                                       xmlns="http://www.w3.org/2000/svg"
                                                       xmlns:xlink="http://www.w3.org/1999/xlink"
                                                       x="0px" y="0px"
                                                       viewBox="0 0 100 100"
                                                       style="enable-background:new 0 0 100 100;"
                                                       xml:space="preserve">
    <style type="text/css">
        .button_x5F_right_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
        .button_x5F_right_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
    </style>
                    <g >
                        <circle  class="button_x5F_right_st0" cx="49.7" cy="50" r="46.4"/>
                        <line  class="button_x5F_right_st1" x1="61.5" y1="50.5" x2="38.9" y2="73"/>
                        <line  class="button_x5F_right_st1" x1="61.5" y1="50" x2="38.9" y2="27.5"/>
                    </g>
    </svg></a>

        </div>
    </section>

<!--  Акция  -->
    <section id="actionSection" class="<?= $sections['action']['stylekey'] ?> <?= $sections['action']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-3">
                <h4 class="tillTo">до <?php
                    $now = new \DateTime();
                    $modstr = '+'.$sections['action']['extra'].' day';
                    $actionEnd = $now->modify($modstr);
                    $date=$actionEnd->format('d.m.Y');
                    echo $date;
                    ?></h4>
                <h2 class="spurt"><?= $sections['action']['head'] ?></h2>
                <p class="comment"><?= $sections['action']['text'] ?></p>
            </div>
            <div class="col-sm-6 text-center">
                <h2 class="lead"><?= $sections['action']['lead'] ?></h2>
            </div>
            <div id="dateObj" data-days="<?= $sections['action']['extra'] ?>" class="col-sm-3">
                <h4 class="remainHead">до конца акции осталось:</h4>

                <div class="col-xs-3"><span class="remainNumber" id="RemainsDays"></span><span class="remainDiscr">дней</span></div>
                <div class="col-xs-3"><span class="remainNumber" id="RemainsHours"></span><span class="remainDiscr">часов</span></div>
                <div class="col-xs-3"><span class="remainNumber" id="RemainsMinutes"></span><span class="remainDiscr">минут</span></div>
                <div class="col-xs-3"><span class="remainNumber" id="RemainsSeconds"></span><span class="remainDiscr">секунд</span></div>

<!--                <div class="actionOrderButton">--><?//= Html::a($sections['action']['call2action_name'], ['mline/createfor', 'comment'=>'заказ по акции'], ['class' => 'btn btn-danger']) ?><!--</div>-->
                <div class="actionOrderButton">
                    <a  id="actionOrderButton"
                        data-action="<?= $sections['action']['lead'] ?>"
                        data-action-comment="<?= $sections['action']['text'] ?>"
                        class="btn btn-danger"><?= $sections['action']['call2action_name'] ?></a>
                </div>

            </div>
        </div>
    </section>

<!--Услуги-->
    <section class="<?= $sections['services']['stylekey'] ?> <?= $sections['services']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['services']['head'] ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][0]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][0]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][0]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['servicesListItems'][0]['text'] ?>
                </div>

            </div>
            <div class="col-sm-3 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][1]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][1]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][1]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['servicesListItems'][1]['text'] ?>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][2]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][2]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][2]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['servicesListItems'][2]['text'] ?>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][3]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][3]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][3]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= nl2br($sections['servicesListItems'][3]['text']) ?>
                </div>
            </div>
        </div>
    </section>

<!-- услуги call2action -->
    <section class="<?= $sections['call2action']['stylekey'] ?> <?= $sections['call2action']['section_type'] ?>">
        <div class="row">
            <?php $form = ActiveForm::begin([
                'id' => 'services-call2action',
                'method' => 'post',
                'action' => ['/site/feedback'],
//                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",

                ],
            ]); ?>
            <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>
            <div class="col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-2">
                <div class="styled_select">
                    <?= $form->field($feedback, 'name')->dropDownList([
                        'консультация - отдельной машиной'=>'ОТДЕЛЬНАЯ МАШИНА',
                        'консультация - догруз'=>'ДОГРУЗ',
                        'консультация - негабарит'=>'НЕГАБАРИТ',
                        'консультация - страхование груза'=>'СТРАХОВАНИЕ ГРУЗА'
                    ],  ['options' =>
                        [
                            'консультация - отдельной машиной' => ['selected' => true]
                        ]
                    ])->label(false) ?>
                </div>

            </div>
            <div class="col-sm-5 col-sm-offset-2 col-md-offset-0">

                <?= $form->field($feedback, 'phone', [
                    'inputOptions' => [
                        'placeholder' => 'ТЕЛЕФОН'
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn">'.
                        '<button type="submit" class="btn btn-submit">Получить консультацию</button></span></div>',
                ])
                    ->textInput(['maxlength' => true, 'id' => 'services-call2action-phone'])
                    ->label(false) ?>
            <?= $form->field($feedback, 'from_page')
                    ->hiddenInput(['value'=>'LP Перевозки по России','id' => 'services-call2action-from_page'])
                    ->label(false) ?>

            <?= $form->field($feedback, 'utm_source')->hiddenInput(['value'=>$utm['source'], 'id' => 'services-call2action-utm_source'])->label(false) ?>
            <?= $form->field($feedback, 'utm_medium')->hiddenInput(['value'=>$utm['medium'], 'id' => 'services-call2action-utm_medium'])->label(false) ?>
            <?= $form->field($feedback, 'utm_campaign')->hiddenInput(['value'=>$utm['campaign'], 'id' => 'services-call2action-utm_campaign'])->label(false) ?>
            <?= $form->field($feedback, 'utm_term')->hiddenInput(['value'=>$utm['term'], 'id' => 'services-call2action-utm_term'])->label(false) ?>
            <?= $form->field($feedback, 'utm_content')->hiddenInput(['value'=>$utm['content'], 'id' => 'services-call2action-utm_content'])->label(false) ?>
            </div>

            <?php ActiveForm::end(); ?>

         </div>
    </section>


<!-- Почему мы -->
    <section class="<?= $sections['whyWe']['stylekey'] ?> <?= $sections['whyWe']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head less768"><?= $sections['whyWe']['head'] ?></h2>
            </div>
            <div class="row">
                <div class="col-sm-2 more768">
                    <svg version="1.1" id="whyWeVertical"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         viewBox="0 0 120 580"
                         style="enable-background:new 0 0 120 580;"
                         xml:space="preserve">
<style type="text/css">
    .whyWeVertical_st0{fill:#E5E5E5;}
</style>
                        <g>
                            <path class="whyWeVertical_st0" d="M26.8,504.6h66.3v8.6H34V544h59.1v8.6H26.8V504.6z"/>
                            <path class="whyWeVertical_st0" d="M59.3,433c22.8,0,34.9,13.9,34.9,30.8c0,17.5-13.6,29.8-33.6,29.8
		c-21.1,0-34.8-13.1-34.8-30.8C25.8,444.7,39.6,433,59.3,433z M60.4,484.5c14.2,0,26.9-7.7,26.9-21.1c0-13.6-12.5-21.2-27.5-21.2
		c-13.2,0-27,6.9-27,21.1C32.8,477.4,45.8,484.5,60.4,484.5z"/>
                            <path class="whyWeVertical_st0" d="M26.8,414.5h21.1c9.1,0,14.2-4.7,14.2-14.1c0-4.6-1.6-9.6-3.7-13.1H26.8v-8.7h66.3v8.7H65
		v0.2c2.7,4.6,4.1,10.1,4.1,15.9c0,8.8-3.7,19.6-20,19.6H26.8V414.5z"/>
                            <path class="whyWeVertical_st0" d="M62.1,329.5l0,25.8H86v-28.7h7.2v37.3H26.8V328H34v27.2h21v-25.8H62.1z"/>
                            <path class="whyWeVertical_st0" d="M64,259.6c-9.2,0.5-20.4,1.1-28.6,1v0.3c7.8,2.3,16,5,25.2,8.4l32.2,11.7v6.5l-31.6,10.7
		c-9.3,3.1-17.9,5.8-25.8,7.7v0.2c8.3,0.2,19.4,0.7,29.3,1.3l28.4,1.8v8.2l-66.3-4.6v-10.9l32.1-11.3c8.2-2.8,15.4-5,22.3-6.7v-0.3
		c-6.7-1.7-14-4-22.3-7l-32.1-11.8v-10.9l66.3-4.1v8.4L64,259.6z"/>
                            <path class="whyWeVertical_st0" d="M26.8,234.3l28.2-13.2c3.9-1.7,7.8-3.2,11.7-4.8v-0.2c-3.4-1.2-7.3-2.5-12-4.1l-27.9-10.3
		v-9.1l34,13.9c8.9,3.6,19,7.8,25.2,12.4c5.4,4.3,8.2,9.1,8.2,15.1c0,2.2-0.2,3.7-0.6,4.8l-7-0.9c0.2-0.7,0.3-1.7,0.3-3.1
		c-0.1-6.9-6.7-10.9-11.4-13c-1.5-0.7-2.5-0.5-4,0.3l-44.7,22V234.3z"/>
                            <path class="whyWeVertical_st0" d="M64,108.7c-9.2,0.5-20.4,1.1-28.6,1v0.3c7.8,2.3,16,5,25.2,8.4l32.2,11.7v6.5l-31.6,10.7
		c-9.3,3.1-17.9,5.8-25.8,7.7v0.2c8.3,0.2,19.4,0.7,29.3,1.3l28.4,1.8v8.2l-66.3-4.6v-10.9l32.1-11.3c8.2-2.8,15.4-5,22.3-6.7v-0.3
		c-6.7-1.7-14-4-22.3-7l-32.1-11.8v-10.9l66.3-4.1v8.4L64,108.7z"/>
                            <path class="whyWeVertical_st0" d="M26.8,76.9h24.8c-0.3-2-0.5-5.7-0.5-7.9c0-13.7,6-25.6,20.8-25.6c6.1,0,10.6,2,14.1,5.1
		c5.7,5.4,7.8,14.7,7.8,23.6c0,5.9-0.4,10.4-0.8,13.3H26.8V76.9z M86.6,76.9C87,75.2,87,73,87,70c0-9.4-4.8-17.6-14.9-17.6
		c-10.3,0-14.3,8.9-14.3,17.7c0,3.1,0.3,5.7,0.5,6.8H86.6z M26.8,27.5h66.3v8.7H26.8V27.5z"/>
                        </g>
</svg>
                </div>
                <div class="col-sm-10">
                    <?php foreach ($sections['whyWeListItems'] as $listItem ) : ?>
                        <div class="row">
                            <div class="col-xs-3  col-sm-2 ">
                                <div class="whyWe_icon">
                                    <?= $listItem ['image'] ?>
                                </div>
                            </div>
                            <div class="col-xs-9 col-sm-8 less480noPl noPl ">
                                <div class="whyWe_head">
                                    <?= $listItem ['head'] ?>
                                </div>
                                <div class="whyWe_text">
                                    <?= $listItem ['text'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>


<!-- how we work -->
    <section class="<?= $sections['howWeWork']['stylekey'] ?> <?= $sections['howWeWork']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['howWeWork']['head'] ?></h2>
            </div>
            <div class="col-sm-3 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][0] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][0] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][0] ['text'] ?>
                </div>
                <div class="display_xs">
                    <svg version="1.1" class="arrowDown_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 90 120"
                         style="enable-background:new 0 0 90 120;"
                         xml:space="preserve">
                        <polygon  fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs text-center">
                <div class="howWeWork_arrow">
                    <svg version="1.1" class="arrow_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         viewBox="0 0 110 90"
                         style="enable-background:new 0 0 110 90;"
                         xml:space="preserve">
                    <polygon fill="none" stroke-miterlimit="10" points="104.7,45 72.9,13.2 72.9,29.6 7.6,29.6 7.6,60.4 72.9,60.4 72.9,76.8 "/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][1] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][1] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][1] ['text'] ?>
                </div>
                <div class="display_xs">
                    <svg version="1.1" class="arrowDown_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 90 120"
                         style="enable-background:new 0 0 90 120;"
                         xml:space="preserve">
                        <polygon  fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs text-center">
                <svg version="1.1" class="arrow_ico"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px"
                     viewBox="0 0 110 90"
                     style="enable-background:new 0 0 110 90;"
                     xml:space="preserve">
                    <polygon fill="none" stroke-miterlimit="10" points="104.7,45 72.9,13.2 72.9,29.6 7.6,29.6 7.6,60.4 72.9,60.4 72.9,76.8 "/>
               </svg>
            </div>
            <div class="col-sm-3 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][2] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][2] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][2] ['text'] ?>
                </div>
                <div class="display_xs">
                    <svg version="1.1" class="arrowDown_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 90 120"
                         style="enable-background:new 0 0 90 120;"
                         xml:space="preserve">
                        <polygon  fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-12 hidden-xs text-center">
                <div class="howWeWork_path">
                    <svg version="1.1" id="arrow_long_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         viewBox="0 0 580 140"
                         style="enable-background:new 0 0 580 140;"
                         xml:space="preserve">

                        <g>
                            <path  d="M47,132.6l-33-33h17.1v-30c0-17.3,14-31.3,31.3-31.3h472.7V7.4h31.8v31.4
		c0,17.3-14,31.3-31.3,31.3H62.9v29.5H80L47,132.6z M16.4,100.6L47,131.2l30.6-30.6H61.9V69.1h473.7c16.7,0,30.3-13.6,30.3-30.3V8.4
		h-29.8v30.9H62.4c-16.7,0-30.3,13.6-30.3,30.3v31H16.4z"/>
                            <path  d="M48.4,90.7h-3v-8h3V90.7z M48.4,72.7h-3v-2.8c0-1.9,0.3-3.8,0.9-5.6l2.8,1
		c-0.5,1.5-0.8,3-0.8,4.6V72.7z M54.6,58.3l-1.7-2.5c2.4-1.7,5.3-2.6,8.2-2.9l0.2,3C58.9,56.1,56.6,56.9,54.6,58.3z M529.2,55.9h-8
		v-3h8V55.9z M511.2,55.9h-8v-3h8V55.9z M493.2,55.9h-8v-3h8V55.9z M475.2,55.9h-8v-3h8V55.9z M457.2,55.9h-8v-3h8V55.9z
		 M439.2,55.9h-8v-3h8V55.9z M421.2,55.9h-8v-3h8V55.9z M403.2,55.9h-8v-3h8V55.9z M385.2,55.9h-8v-3h8V55.9z M367.2,55.9h-8v-3h8
		V55.9z M349.2,55.9h-8v-3h8V55.9z M331.2,55.9h-8v-3h8V55.9z M313.2,55.9h-8v-3h8V55.9z M295.2,55.9h-8v-3h8V55.9z M277.2,55.9h-8
		v-3h8V55.9z M259.2,55.9h-8v-3h8V55.9z M241.2,55.9h-8v-3h8V55.9z M223.2,55.9h-8v-3h8V55.9z M205.2,55.9h-8v-3h8V55.9z
		 M187.2,55.9h-8v-3h8V55.9z M169.2,55.9h-8v-3h8V55.9z M151.2,55.9h-8v-3h8V55.9z M133.2,55.9h-8v-3h8V55.9z M115.2,55.9h-8v-3h8
		V55.9z M97.2,55.9h-8v-3h8V55.9z M79.2,55.9h-8v-3h8V55.9z M539.5,55.4l-0.7-2.9c2.3-0.5,4.5-1.7,6.3-3.3l2,2.2
		C545,53.3,542.4,54.7,539.5,55.4z M552.4,41.9l-2.9-0.5c0.2-0.8,0.2-1.7,0.2-2.6v-5.1h3v5.1C552.7,39.8,552.6,40.9,552.4,41.9z
		 M552.7,23.7h-3v-8h3V23.7z"/>
                        </g>
</svg>
                </div>
            </div>
            <div class="col-sm-5 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][3] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][3] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][3] ['text'] ?>
                </div>
                <div class="display_xs">

                     <svg version="1.1" class="arrowDown_ico"
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 90 120"
                          style="enable-background:new 0 0 90 120;"
                          xml:space="preserve">
                        <polygon  fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-2 hidden-xs text-center">
                <svg version="1.1" class="arrow_ico"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px"
                     viewBox="0 0 110 90"
                     style="enable-background:new 0 0 110 90;"
                     xml:space="preserve">
                    <polygon fill="none" stroke-miterlimit="10" points="104.7,45 72.9,13.2 72.9,29.6 7.6,29.6 7.6,60.4 72.9,60.4 72.9,76.8 "/>
               </svg>

            </div>
            <div class="col-sm-5 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][4] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][4] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][4] ['text'] ?>
                </div>

            </div>
            <div class="col-sm-12 text-center">
                <?php $form = ActiveForm::begin([
                    'id' => 'howWeWork_call2action',
                    'method' => 'post',
                    'action' => ['/site/feedback'],
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",
                        'horizontalCssClasses' => [
//                    'label' => 'col-sm-4',
                            'offset' => 'col-sm-offset-3 col-lg-offset-4',
                            'wrapper' => 'col-sm-6 col-lg-4',
//                    'error' => '',
//                    'hint' => 'телефон',
                        ],
                    ],
                ]); ?>

                <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>
                <?= $form->field($feedback, 'name')
                    ->hiddenInput(['value'=>'Секция - Как мы работаем - Рассчитать стоимость','id' => 'howWeWork_call2action-name'])
                    ->label(false) ?>
                <?= $form->field($feedback, 'from_page')
                    ->hiddenInput(['value'=>'LP Перевозки по России','id' => 'howWeWork_call2action-from_page'])
                    ->label(false) ?>

                <?= $form->field($feedback, 'utm_source')->hiddenInput(['value'=>$utm['source'], 'id' => 'howWeWork_call2action-utm_source'])->label(false) ?>
                <?= $form->field($feedback, 'utm_medium')->hiddenInput(['value'=>$utm['medium'], 'id' => 'howWeWork_call2action-utm_medium'])->label(false) ?>
                <?= $form->field($feedback, 'utm_campaign')->hiddenInput(['value'=>$utm['campaign'], 'id' => 'howWeWork_call2action-utm_campaign'])->label(false) ?>
                <?= $form->field($feedback, 'utm_term')->hiddenInput(['value'=>$utm['term'], 'id' => 'howWeWork_call2action-utm_term'])->label(false) ?>
                <?= $form->field($feedback, 'utm_content')->hiddenInput(['value'=>$utm['content'], 'id' => 'howWeWork_call2action-utm_content'])->label(false) ?>

                <?= $form->field($feedback, 'phone', [
                    'inputOptions' => [
                        'placeholder' => 'ТЕЛЕФОН'
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn">'.
                        '<button type="submit" class="btn btn-submit">'.$sections['howWeWork']['call2action_name'].'</button></span></div>',
                ])
                    ->textInput(['maxlength' => true,'id' => 'howWeWork_call2action-phone'])
                    ->label(false) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>



<!--  Цифры  -->
    <section id="numberSection"
             class="<?= $sections['numbers']['stylekey'] ?> <?= $sections['numbers']['section_type'] ?>"
             style=" background-image: url(/img/<?= $sections['numbers']['image'] ?>)">
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbersListItems'][0] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= $sections['numbersListItems'][0] ['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbersListItems'][1] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= $sections['numbersListItems'][1] ['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbersListItems'][2] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= nl2br($sections['numbersListItems'][2] ['text']) ?>
                </div>
            </div>
        </div>
    </section>

<!--  проекты  -->
    <section class="<?= $sections['projects']['stylekey'] ?> <?= $sections['projects']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['projects']['head'] ?></h2>
            </div>
            <div class="col-sm-12">
                <div class="doneProjects">
                    <?php foreach ($sections['projectsListItems'] as $project) : ?>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="project_image" style="background-image: url(/img/<?= $project['image'] ?>);background-size: cover;background-position: center center;">

                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="project_head">
                                    <?= $project ['head'] ?>
                                </div>
                                <div class="project_text">
                                    <?= nl2br($project ['text']) ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <a class="carouselControl slickPrev"><svg version="1.1"
                                                          xmlns="http://www.w3.org/2000/svg"
                                                          xmlns:xlink="http://www.w3.org/1999/xlink"
                                                          x="0px" y="0px"
                                                          viewBox="0 0 100 100"
                                                          style="enable-background:new 0 0 100 100;"
                                                          xml:space="preserve">
    <style type="text/css">
        .button_x5F_left_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
        .button_x5F_left_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
    </style>
                        <g >
                            <circle  class="button_x5F_left_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="button_x5F_left_st1" x1="38.9" y1="50" x2="61.5" y2="27.5"/>
                            <line  class="button_x5F_left_st1" x1="38.9" y1="50.5" x2="61.5" y2="73"/>
                        </g>
    </svg></a>

                <a class="carouselControl slickNext" ><svg version="1.1"
                                                           xmlns="http://www.w3.org/2000/svg"
                                                           xmlns:xlink="http://www.w3.org/1999/xlink"
                                                           x="0px" y="0px"
                                                           viewBox="0 0 100 100"
                                                           style="enable-background:new 0 0 100 100;"
                                                           xml:space="preserve">
    <style type="text/css">
        .button_x5F_right_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
        .button_x5F_right_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
    </style>
                        <g >
                            <circle  class="button_x5F_right_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="button_x5F_right_st1" x1="61.5" y1="50.5" x2="38.9" y2="73"/>
                            <line  class="button_x5F_right_st1" x1="61.5" y1="50" x2="38.9" y2="27.5"/>
                        </g>
    </svg></a>

            </div>
        </div>

    </section>

<!--    Reviews   -->

    <section class="<?= $sections['reviews']['stylekey'] ?> <?= $sections['reviews']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['reviews']['head'] ?></h2>
            </div>
        </div>

            <div class="reviewsCarWrapper ">
                <div class="reviewsCarousel text-center">
                    <?php foreach ($sections['reviewsListItems'] as $review) : ?>
                        <div class="review_item">

                            <a class="caruMagLink" href="/img/<?= $review['image'] ?>"><img src="/img/th_<?= $review['image'] ?>" alt="<?= $review['image_alt'] ?>" /></a>

                        </div>

                    <?php endforeach; ?>

                </div>
                <a class="carouselControl slickReviewsPrev"><svg version="1.1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 x="0px" y="0px"
                                                                 viewBox="0 0 100 100"
                                                                 style="enable-background:new 0 0 100 100;"
                                                                 xml:space="preserve">
<style type="text/css">
    .button_x5F_left_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
    .button_x5F_left_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
</style>
                        <g >
                            <circle  class="button_x5F_left_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="button_x5F_left_st1" x1="38.9" y1="50" x2="61.5" y2="27.5"/>
                            <line  class="button_x5F_left_st1" x1="38.9" y1="50.5" x2="61.5" y2="73"/>
                        </g>
</svg></a>

                <a class="carouselControl slickReviewsNext" ><svg version="1.1"
                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                  x="0px" y="0px"
                                                                  viewBox="0 0 100 100"
                                                                  style="enable-background:new 0 0 100 100;"
                                                                  xml:space="preserve">
<style type="text/css">
    .button_x5F_right_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
    .button_x5F_right_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
</style>
                        <g >
                            <circle  class="button_x5F_right_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="button_x5F_right_st1" x1="61.5" y1="50.5" x2="38.9" y2="73"/>
                            <line  class="button_x5F_right_st1" x1="61.5" y1="50" x2="38.9" y2="27.5"/>
                        </g>
</svg></a>






        </div>

    </section>
    <section class="<?= $sections['clients']['stylekey'] ?> <?= $sections['clients']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['clients']['head'] ?></h2>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clientsListItems'][0]['image'],['alt'=>$sections['clientsListItems'][0]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clientsListItems'][1]['image'],['alt'=>$sections['clientsListItems'][1]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clientsListItems'][2]['image'],['alt'=>$sections['clientsListItems'][2]['image_alt']] ) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clientsListItems'][3]['image'],['alt'=>$sections['clientsListItems'][3]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clientsListItems'][4]['image'],['alt'=>$sections['clientsListItems'][4]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clientsListItems'][5]['image'],['alt'=>$sections['clientsListItems'][5]['image_alt']] ) ?>

                </div>
            </div>
            <div class="col-sm-12 text-center">
                <h4 class="andMore">и еще <span>268</span> компаний</h4>
            </div>


        </div>

    </section>
    <section id="mainOrderSection" class="<?= $sections['order']['stylekey'] ?> <?= $sections['order']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['order']['head'] ?></h2>
                <p class="top_comment">Вы так же можете заказать отправку по телефону (495) 150-05-83</p>
            </div>

            <div class="col-lg-8 col-lg-offset-2">
                <div class="feedback-form " >
                    <?php $form = ActiveForm::begin([
                        'action' =>['site/order'],
                        'id' => 'mainOrderForm',
                        'method' => 'post',]); ?>

                    <?= $form->field($preorderForm, 'utm_source')->hiddenInput(['value'=>$utm['source'], 'id' => 'mainOrderForm-utm_source'])->label(false) ?>
                    <?= $form->field($preorderForm, 'utm_medium')->hiddenInput(['value'=>$utm['medium'], 'id' => 'mainOrderForm-utm_medium'])->label(false) ?>
                    <?= $form->field($preorderForm, 'utm_campaign')->hiddenInput(['value'=>$utm['campaign'], 'id' => 'mainOrderForm-utm_campaign'])->label(false) ?>
                    <?= $form->field($preorderForm, 'utm_term')->hiddenInput(['value'=>$utm['term'], 'id' => 'mainOrderForm-utm_term'])->label(false) ?>
                    <?= $form->field($preorderForm, 'utm_content')->hiddenInput(['value'=>$utm['content'], 'id' => 'mainOrderForm-utm_content'])->label(false) ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'dispatch')
                                ->textInput(['required' => true,'id' => 'mainOrderForm-dispatch'])
                                ->label('Откуда') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'destination')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-destination'])
                                ->label('Куда') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'phone')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-phone']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'email')
                                ->textInput(['maxlength' => true, 'id' => 'mainOrderForm-email']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'cargo')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-cargo'])
                                ->label('Характер груза')  ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'weight')
                                ->textInput(['maxlength' => true, 'id' => 'mainOrderForm-weight'])
                                ->label('Вес')  ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($preorderForm, 'text')
                                ->textarea(['rows' => 1, 'id' => 'mainOrderForm-text'])
                                ->label('Комментарий') ?>
                        </div>
                        <!--        captcha -->
                        <!--        <div class="col-sm-12"> --><?//= $form->field($preorderForm, 'captcha')->widget(Captcha::className()) ?><!--</div>-->

                        <?= $form->field($preorderForm, 'from_page')
                            ->hiddenInput(['value'=>'LP Перевозки по России', 'id' => 'mainOrderForm-from_page'])
                            ->label(false) ?>
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-danger sendorder-btn']) ?>
                        </div>
                    </div>
                    <?php $form = ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 text-center">

                <p class="footer">&copy; Транспортная компания &ldquo;Трансзаказ&rdquo;, <?= date('Y') ?><br/>
                    117535, Москва, 3-й дорожный проезд, д.3а</p>

<!--                <p class="footer">&copy; Транспортная компания ООО &ldquo;Трансзаказ&rdquo;, --><?//= date('Y') ?><!--<br/>-->
<!--                    117535, Москва, 3-й дорожный проезд, д.3а<br/>-->
<!--                    Телефон: +7 (495) 150-05-83</p>-->
            </div>



        </div>


    </section>
</div>








