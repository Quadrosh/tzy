<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//use \yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
//$this->title = 'Page View';
//$this->params['breadcrumbs'][] = $this->title;

$feedback = new common\models\Feedback();
$preorder = new common\models\Preorders();
?>


<nav id="w10" class="navbar-inverse  navbar" role="navigation">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3 text-center">
                <a class="navbar-brand" href="/" title="<?= $page ['seo_logo'] ?>"><img src="/img/negabarit_logo_white.png" alt="<?= $page['seo_logo'] ?>"></a>
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
    <section id="topSection"
        class="<?= $sections['top']['stylekey'] ?> <?= $sections['top']['section_type'] ?>"
        style=" background-image: url(/img/<?= $sections['top']['image'] ?>)">
        <?= common\widgets\Alert::widget() ?>
        <div class="row">
            <div class="col-sm-6 text-left">
                <div class="col-sm-12">
                    <h1 class="head c_def"><?= $sections['top']['head'] ?></h1>
                </div>
                <div class="col-sm-9">
                    <h2 class="lead c_def"><?= nl2br($sections['top']['lead']) ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-12">
                    <?php $form = ActiveForm::begin([
                        'id' => 'quickorder-form-top',
                        'method' => 'post',
                        'action' => ['/site/feedback'],
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",
                            'horizontalCssClasses' => [
    //                            'label' => 'col-sm-4',
                                'offset' => 'col-sm-offset-0 col-lg-offset-0',
                                'wrapper' => 'col-sm-6 col-lg-4 xsTopForm',
    //                            'error' => '',
    //                            'hint' => 'телефон',
                            ],
                        ],
                    ]); ?>

                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>

                    <?= $form->field($feedback, 'phone', [
                        'inputOptions' => [
                            'placeholder' => 'ТЕЛЕФОН'
                        ],
                        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn">'.
                            '<button type="submit" class="btn btn-submit">Получить консультацию</button></span></div>',
                    ])->textInput(['maxlength' => true, 'id' => 'quickorder-form-top-phone'])->label(false) ?>

                    <?= $form->field($feedback, 'name')
                        ->hiddenInput(['value'=>'Noname from top form', 'id' => 'quickorder-form-top-name'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput(['value'=>$utm['source'], 'id' => 'quickorder-form-top-utm_source'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput(['value'=>$utm['medium'], 'id' => 'quickorder-form-top-utm_medium'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput(['value'=>$utm['campaign'], 'id' => 'quickorder-form-top-utm_campaign'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput(['value'=>$utm['term'], 'id' => 'quickorder-form-top-utm_term'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput(['value'=>$utm['content'], 'id' => 'quickorder-form-top-utm_content'])->label(false) ?>

                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>$page ['hrurl'],'id' => 'quickorder-form-top-from_page'])->label(false) ?>
                    <?php ActiveForm::end(); ?>
                 </div>
            </div>
        </div>

        <div
            style=" background-image: url(/img/slim_angle_to_bottom_right.svg)"
            class="smooth_angle">

        </div>


    </section>


    <!--Услуги-->
    <section id="servicesSection"
        class="<?= $sections['services']['stylekey'] ?> <?= $sections['services']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 text-center">
                <h2 class="head"><?= $sections['services']['head'] ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][0]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][0]['head'] ?>
                </div>
                <div class="service_type__text">
                    <?= nl2br($sections['services']['list_items'][0]['text']) ?>
                </div>

            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][1]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][1]['head'] ?>
                </div>
                <div class="service_type__text">
                    <?= nl2br($sections['services']['list_items'][1]['text']) ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][2]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][2]['head'] ?>
                </div>
                <div class="service_type__text">
                    <?= nl2br($sections['services']['list_items'][2]['text']) ?>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][3]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][3]['head'] ?>
                </div>
                <div class="service_type__text">
                    <?= nl2br($sections['services']['list_items'][3]['text']) ?>
                </div>

            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][4]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][4]['head'] ?>
                </div>
                <div class="service_type__text">
                    <?= nl2br($sections['services']['list_items'][4]['text']) ?>
                </div>
            </div>


        </div>
    </section>


    <!-- услуги call2action -->
    <section id="servicesCall2action"
        class="<?= $sections['call2action']['stylekey'] ?> <?= $sections['call2action']['section_type'] ?>">
        <div class="row">
            <?php $form = ActiveForm::begin([
                'action' => ['/site/feedback'],
                'id' => 'services-call2action',
                'method' => 'post',
//                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",

                ],
            ]); ?>
            <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>
            <div class="col-xs-12 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-2">
                <div class="styled_select">
                    <?= $form->field($feedback, 'name')->dropDownList([
                        'консультация - аренда трала'=>'АРЕНДА ТРАЛА',
                        'консультация - разработка марщрута'=>'РАЗРАБОТКА МАРШРУТА',
                        'консультация - оформление разрешений'=>'ОФОРМЛЕНИЕ РАЗРЕШЕНИЙ',
                        'консультация - автомобили прикрытия'=>'АВТОМОБИЛИ ПРИКРЫТИЯ',
                        'консультация - перевозки для юр. лиц'=>'ГРУЗОПЕРЕВОЗКИ ДЛЯ ЮР. ЛИЦ'
                    ],  ['options' =>
                            [
                                'консультация - аренда трала' => ['selected' => true]
                            ]
                        ])->label(false) ?>
                </div>

            </div>
            <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-offset-0">

                <?= $form->field($feedback, 'phone', [
                    'inputOptions' => [
                        'placeholder' => 'ТЕЛЕФОН'
                    ],
                    'inputTemplate' => '<div class="input-group xsServiceForm">{input}<span class="input-group-btn">'.
                        '<button type="submit" class="btn btn-submit">Получить консультацию</button></span></div>',
                ])
                    ->textInput(['maxlength' => true, 'id' => 'services-call2action-phone'])
                    ->label(false) ?>
                <?= $form->field($feedback, 'from_page')
                    ->hiddenInput(['value'=>$page ['hrurl'],'id' => 'services-call2action-from_page'])
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


    <!--  Акция  -->
    <section id="actionSection"
             class="<?= $sections['action']['stylekey'] ?> <?= $sections['action']['section_type'] ?>"
             style=" background-image: url(/img/<?= $sections['action']['image'] ?>)">
        <div class="row">
            <div class="col-sm-6 ">
                <div class="left">
                    <div class="square_box">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <h2 class="spurt"><?= $sections['action']['head'] ?></h2>
                            </div>
                            <div class="col-xs-6 text-right">
                                <h4 class="tillTo">до <?php
                                    $now = new \DateTime();
                                    $add = -(($now->getTimestamp() /3600/24 ) % ($sections['action']['extra'])+1)+$sections['action']['extra'];
                                    $modstr = '+'.$add.' day';
                                    $actionEnd = $now->modify($modstr);
                                    $date=$actionEnd->format('d.m.Y');
                                    echo $date;
                                    ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2 class="lead"><?= $sections['action']['lead'] ?></h2>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 ">
                <div class="right">
                    <div class="square_box timer_box">
                        <div id="dateObj" data-days="<?= $sections['action']['extra'] ?>" class="col-sm-10 col-sm-offset-1 text-center">
                            <h4 class="remainHead">до конца акции осталось:</h4>

                            <div class="col-xs-3"><span class="remainNumber" id="RemainsDays"></span><span class="remainDiscr">дней</span></div>
                            <div class="col-xs-3"><span class="remainNumber" id="RemainsHours"></span><span class="remainDiscr">часов</span></div>
                            <div class="col-xs-3"><span class="remainNumber" id="RemainsMinutes"></span><span class="remainDiscr">минут</span></div>
                            <div class="col-xs-3"><span class="remainNumber" id="RemainsSeconds"></span><span class="remainDiscr">секунд</span></div>




                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="left">
                    <div class="square_box">
                        <div class="col-sm-12">
                            <p class="comment"><?= $sections['action']['text'] ?></p>
                        </div>

                    </div>
                </div>



            </div>
            <div class="col-sm-6 text-center">
                <div class="right">
                    <div class="square_box_transparent">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="actionOrderButton">
                                <a  id="actionOrderButton"
                                    data-action="<?= $sections['action']['lead'] ?>"
                                    data-action-comment="<?= $sections['action']['text'] ?>"
                                    class="btn btn-danger"><?= $sections['action']['call2action_name'] ?></a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

    </section>



<!-- Почему мы -->
    <section id="whyWeSection"
        class="<?= $sections['whyWe']['stylekey'] ?> <?= $sections['whyWe']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= nl2br($sections['whyWe']['head']) ?></h2>
            </div>
            <div class="row">

                <div class="col-sm-10 col-sm-offset-2 mt30">
                    <?php foreach ($sections['whyWe']['list_items'] as $listItem ) : ?>
                        <div class="row mt10">
                            <div class="col-xs-3  col-sm-2 text-center">
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
    <section id="howWeWorkSection"
        class="<?= $sections['howWeWork']['stylekey'] ?> <?= $sections['howWeWork']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['howWeWork']['head'] ?></h2>
            </div>
            <div class="col-sm-3 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWork']['list_items'][0] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWork']['list_items'][0] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWork']['list_items'][0] ['text'] ?>
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
                    <?= $sections['howWeWork']['list_items'][1] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWork']['list_items'][1] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWork']['list_items'][1] ['text'] ?>
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
                    <?= $sections['howWeWork']['list_items'][2] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWork']['list_items'][2] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWork']['list_items'][2] ['text'] ?>
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
                    <?= $sections['howWeWork']['list_items'][3] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWork']['list_items'][3] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWork']['list_items'][3] ['text'] ?>
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
                    <?= $sections['howWeWork']['list_items'][4] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWork']['list_items'][4] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWork']['list_items'][4] ['text'] ?>
                </div>

            </div>
            <div class="col-sm-12 text-center">
                <?php $form = ActiveForm::begin([
                    'action' => ['/site/feedback'],
                    'id' => 'howWeWork_call2action',
                    'method' => 'post',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",
                        'horizontalCssClasses' => [
//                    'label' => 'col-sm-4',
                            'offset' => 'col-sm-offset-3 col-lg-offset-4',
                            // xsHowWeWorkForm
                            'wrapper' => 'col-sm-6 col-lg-4 xsHowWeWorkForm',
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
                    ->hiddenInput(['value'=>$page ['hrurl'],'id' => 'howWeWork_call2action-from_page'])
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


<!-- what we do -->
    <section
        id="whatWeDoSection"
        class="<?= $sections['whatWeDo']['stylekey'] ?> <?= $sections['whatWeDo']['section_type'] ?>">
        <?php foreach ($sections['whatWeDo']['list_items'] as $whatWeDoLisItem) : ?>
            <div class="row">
                <div class="col-sm-6 carPlace <?php
                    if ($whatWeDoLisItem['order_num'] % 2 != 0) {
                     echo ' col-sm-offset-6 ';
                    }
                ?> ">
                    <div class="truckHead">
                        <svg version="1.1" class="truck_head"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px"
                             viewBox="0 0 180 135"
                             style="enable-background:new 0 0 180 135;"
                             xml:space="preserve">
<style type="text/css">
    .truck_head_st0{fill:#D1D1D0;}
    .truck_head_st1{fill:#121112;}
    .truck_head_st2{fill:#878887;}
    .truck_head_st3{fill:#343533;}
    .truck_head_st4{fill:#181717;}
    .truck_head_st5{fill:#222221;}
    .truck_head_st6{fill:#252424;}
    .truck_head_st7{fill:#171C1E;}
    .truck_head_st8{fill:#55575B;}
    .truck_head_st9{fill:#2E3033;}
    .truck_head_st10{fill:#404144;}
    .truck_head_st11{fill:#D8D8D9;}
    .truck_head_st12{fill:#393939;}
    .truck_head_st13{fill:#131213;}
    .truck_head_st14{fill:#4C4B4D;}
    .truck_head_st15{fill:#B7B9B9;}
    .truck_head_st16{fill:#EFCB3C;}
    .truck_head_st17{fill:#434546;}
    .truck_head_st18{fill:#E8E9EA;}
    .truck_head_st19{fill:#D3D4D3;}
    .truck_head_st20{fill:#A8A7A8;}
    .truck_head_st21{fill:#E9EAEB;}
    .truck_head_st22{fill:none;stroke:#191D24;stroke-linecap:round;stroke-miterlimit:10;}
    .truck_head_st23{fill:#191D24;}
    .truck_head_st24{fill:#6F7270;}
</style>
                            <g >
                                <path  class="truck_head_st0" d="M17.2,18.9v-4.5c0-7.3,5.9-13.2,13.2-13.2h10.7v2.1h98V1.1h12c7.3,0,13.2,5.9,13.2,13.2v4.5
		l-3.6,3l0.6,84.5l-142.9-0.8l1.1-79.7L17.2,18.9z"/>
                                <polygon  class="truck_head_st1" points="37.5,112.5 37.5,130.3 15.3,130.3 15.3,127.1 15.9,127 15.8,104.6 37.5,104.6 	"/>
                                <polygon  class="truck_head_st1" points="142.2,112.5 142.2,130.3 164.4,130.3 164.4,127.1 163.8,127 163.8,104.6
		142.2,104.6 	"/>
                                <rect  x="63.2" y="113.7" class="truck_head_st1" width="55.2" height="20.4"/>
                                <path  class="truck_head_st2" d="M33.3,102.6c0,0-0.5,8.4,3.1,11.1h106.5c0,0,4.3-1.5,3.8-11.1H33.3z"/>
                                <path  class="truck_head_st3" d="M33.8,109c0.4,1.9,1.2,3.7,2.6,4.7h106.5c0,0,2.2-0.8,3.3-4.7H33.8z"/>
                                <path  class="truck_head_st4" d="M34.6,111.3c0.4,0.9,1,1.8,1.8,2.3h106.5c0,0,1.2-0.4,2.3-2.3H34.6z"/>
                                <path  class="truck_head_st5" d="M20.8,104.6h138.7c0,0-1.2-2.8-4.1-2.8H25.2c-0.4,0-0.7,0.1-1.1,0.2
		C23.5,102.3,22.4,103,20.8,104.6z"/>
                                <path  class="truck_head_st6" d="M27.4,2.8c7.2-0.4,69.4-3.9,124.6,0c0.4,0,0.7,0.4,0.7,0.7v0.6c0,0.4-0.4,0.8-0.8,0.7
		c-6.7-0.6-55.1-4.7-124.4,0c-0.4,0-0.8-0.3-0.8-0.7V3.5C26.7,3.1,27,2.8,27.4,2.8z"/>
                                <path  class="truck_head_st7" d="M26.7,28.2l-0.9-12.7c0,0,0.3-5.8,8-6.8s69.1-6.5,110.5,0c5.9,0.9,8.5,4.4,8.9,5.7
		c0.4,1.2-1.1,13.8-1.1,13.8s-7.1-4.9-12.5-6c-5.4-1.1-74.7-3.4-98.1-0.5C41.6,21.7,33.1,22.9,26.7,28.2z"/>
                                <path  class="truck_head_st8" d="M149.9,25.4c1,0.6,1.9,1.6,2.3,2.7c0,0-2-1.1-6.1-2.5c-8.2-2.7-15-3.3-18.4-3.5
		c-12.8-0.8-26.7-0.3-35.8-0.3c-18.4,0.1-47.3-1.1-57.1,2.9c-0.4,0.2-8,3.3-8,3.3v0c0,0,7.3-8.9,29.9-8.9c22.5,0,51.3-0.1,62.4,0
		C129.4,19.3,140.9,20.1,149.9,25.4z"/>
                                <path  class="truck_head_st9" d="M154.4,103.9c0,0,6.4,6.3,7.8,25.8h3.1v-3.2l-0.6-0.6l0-106.8h0.4c0,0,1.4-14.4-11.3-18.1
		c0,0,10.2,5.6,9.5,17.2l-5.9,1.1c0,0,1,4.8,0.2,7.1l3.3-1.4l0.1,23.2l-1.5,0.2l1.2,56.5C160.7,105,157.4,103.9,154.4,103.9z"/>
                                <path  class="truck_head_st9" d="M26,103.9c0,0-6.4,6.3-7.8,25.8h-3.1v-3.2l0.6-0.6l0-106.8h-0.4c0,0-1.4-14.4,11.3-18.1
		c0,0-10.2,5.6-9.5,17.2l5.9,1.1c0,0-1,4.8-0.2,7.1l-3.3-1.4l-0.1,23.2l1.5,0.2L19.6,105C19.6,105,23,103.9,26,103.9z"/>
                                <g >
                                    <path  class="truck_head_st10" d="M20.6,71.2c0,0-1.7,0.5-1.8,1.9c0,0-0.1,9.5,0,10.2c0.1,0.7,1.8,1.3,1.8,1.3
			s0.4-2.2-0.1-2.9c-0.4-0.8-0.7,0.2-0.6-2.7s0-3.2,0.1-3.9c0-0.8,0.7-0.7,0.7-0.7S20.9,72.2,20.6,71.2z"/>
                                    <g >
                                        <path  class="truck_head_st11" d="M18.6,81.6c0,0-0.1,0.3-0.1,0.7s0.1,0.7,0.1,0.7c0,0,0.1-0.3,0.1-0.7S18.6,81.6,18.6,81.6
				z"/>
                                        <path  class="truck_head_st11" d="M18.9,81.6h-0.2c0.1,0.1,0.2,0.5,0.2,0.8c0,0.3,0,0.6-0.2,0.8h0.2c0.1,0,0.2-0.3,0.2-0.8
				S19,81.6,18.9,81.6z"/>
                                    </g>
                                </g>
                                <g >
                                    <path  class="truck_head_st10" d="M159.7,71.2c0,0,1.7,0.5,1.8,1.9c0,0,0.1,9.5,0,10.2c-0.1,0.7-1.8,1.3-1.8,1.3
			s-0.4-2.2,0.1-2.9c0.4-0.8,0.7,0.2,0.6-2.7s0-3.2-0.1-3.9c0-0.8-0.7-0.7-0.7-0.7S159.4,72.2,159.7,71.2z"/>
                                    <g >
                                        <path  class="truck_head_st11" d="M161.7,81.6c0,0,0.1,0.3,0.1,0.7s-0.1,0.7-0.1,0.7c0,0-0.1-0.3-0.1-0.7
				S161.6,81.6,161.7,81.6z"/>
                                        <path  class="truck_head_st11" d="M161.4,81.6h0.2c-0.1,0.1-0.2,0.5-0.2,0.8c0,0.3,0,0.6,0.2,0.8h-0.2
				c-0.1,0-0.2-0.3-0.2-0.8S161.3,81.6,161.4,81.6z"/>
                                    </g>
                                </g>
                                <path  class="truck_head_st12" d="M24.5,31.1c0,0-0.6,49-1.7,50.6c0,0-0.5-8.2-0.3-24.9C22.6,39.9,23.6,31.2,24.5,31.1z"/>
                                <path  class="truck_head_st12" d="M155.4,31.1c0,0,0.6,49,1.7,50.6c0,0,0.5-8.2,0.3-24.9C157.3,39.9,156.3,31.2,155.4,31.1z"/>
                                <g >
                                    <path id="XMLID_2933_" class="truck_head_st13" d="M24.1,31.9c-0.1,0-0.2,0-0.2,0L7.1,24.2c-0.3-0.1-0.4-0.4-0.2-0.7c0.1-0.3,0.4-0.4,0.7-0.2
			L24.3,31c0.3,0.1,0.4,0.4,0.2,0.7C24.5,31.8,24.3,31.9,24.1,31.9z"/>
                                    <path  class="truck_head_st14" d="M22.2,24.7C22.2,24.7,22.2,24.7,22.2,24.7L6.8,24.6c-0.3,0-0.5-0.2-0.5-0.5
			c0-0.3,0.2-0.5,0.5-0.5c0,0,0,0,0,0l15.4,0.1c0.3,0,0.5,0.2,0.5,0.5C22.7,24.5,22.5,24.7,22.2,24.7z"/>
                                    <path  class="truck_head_st13" d="M11.1,22.1l-6.8,6.9c-0.6,0.6-0.6,1.5,0,2.1L5,31.7l9-9l-0.7-0.6
			C12.7,21.5,11.7,21.5,11.1,22.1z"/>

                                    <rect  x="3.6" y="26.5" transform="matrix(0.706 -0.7082 0.7082 0.706 -16.3713 14.439)" class="truck_head_st15" width="11.3" height="0.9"/>
                                    <circle  class="truck_head_st13" cx="7.1" cy="24.7" r="2.2"/>
                                    <path  class="truck_head_st13" d="M24.9,30.1c-1,0-1.8,0.8-1.8,1.8c0,1,0.8,1.8,1.8,1.8c0-1.3,0.2-2.4,0.7-3.5
			C25.4,30.1,25.2,30.1,24.9,30.1z"/>

                                    <ellipse  transform="matrix(0.9743 0.2252 -0.2252 0.9743 5.4536 -1.0933)" class="truck_head_st14" cx="7.5" cy="23.4" rx="1.4" ry="0.8"/>
                                </g>
                                <g >
                                    <path  class="truck_head_st13" d="M155.9,31.9c0.1,0,0.2,0,0.2,0l16.8-7.6c0.3-0.1,0.4-0.4,0.2-0.7c-0.1-0.3-0.4-0.4-0.7-0.2
			L155.7,31c-0.3,0.1-0.4,0.4-0.2,0.7C155.5,31.8,155.7,31.9,155.9,31.9z"/>
                                    <path  class="truck_head_st14" d="M157.8,24.7L157.8,24.7l15.4-0.1c0.3,0,0.5-0.2,0.5-0.5c0-0.3-0.2-0.5-0.5-0.5h0l-15.4,0.1
			c-0.3,0-0.5,0.2-0.5,0.5C157.3,24.5,157.5,24.7,157.8,24.7z"/>
                                    <path  class="truck_head_st13" d="M168.9,22.1l6.8,6.9c0.6,0.6,0.6,1.5,0,2.1l-0.7,0.6l-9-9l0.7-0.6
			C167.3,21.5,168.3,21.5,168.9,22.1z"/>

                                    <rect  x="165.1" y="26.5" transform="matrix(-0.706 -0.7082 0.7082 -0.706 272.2967 166.9162)" class="truck_head_st15" width="11.3" height="0.9"/>
                                    <circle  class="truck_head_st13" cx="172.9" cy="24.7" r="2.2"/>
                                    <path  class="truck_head_st13" d="M155.1,30.1c1,0,1.8,0.8,1.8,1.8c0,1-0.8,1.8-1.8,1.8c0-1.3-0.2-2.4-0.7-3.5
			C154.6,30.1,154.8,30.1,155.1,30.1z"/>

                                    <ellipse  transform="matrix(-0.9743 0.2252 -0.2252 -0.9743 345.7918 7.2578)" class="truck_head_st14" cx="172.5" cy="23.4" rx="1.4" ry="0.8"/>
                                </g>
                                <g >
                                    <path  class="truck_head_st16" d="M16.9,55.9c0-1.3-0.6-2.4-1.4-2.5c-1.1,0.2-2,1.3-2,2.5s0.9,2.3,2,2.5
			C16.3,58.2,16.9,57.2,16.9,55.9z"/>
                                    <path  class="truck_head_st17" d="M16.1,52.9c-0.2,0-0.4,0.2-0.6,0.4c0.5,0.1,1,1.2,1,2.6c0,1.3-0.4,2.4-1,2.6
			c0.2,0.3,0.4,0.4,0.6,0.4c0.7,0,1.2-1.3,1.2-3C17.3,54.2,16.8,52.9,16.1,52.9z"/>
                                </g>
                                <g >
                                    <path  class="truck_head_st16" d="M162.9,55.9c0,1.3,0.6,2.4,1.4,2.5c1.1-0.2,2-1.3,2-2.5s-0.9-2.3-2-2.5
			C163.5,53.5,162.9,54.5,162.9,55.9z"/>
                                    <path id="XMLID_2854_" class="truck_head_st17" d="M163.7,58.8c0.2,0,0.4-0.2,0.6-0.4c-0.5-0.1-1-1.2-1-2.6c0-1.3,0.4-2.4,1-2.6
			c-0.2-0.3-0.4-0.4-0.6-0.4c-0.7,0-1.2,1.3-1.2,3C162.5,57.5,163,58.8,163.7,58.8z"/>
                                </g>
                                <path  class="truck_head_st18" d="M153.3,101.3L153.3,101.3c0.1,0-2-49.8-3.5-65.8c-1.3-14.2-47.1-13.5-57-13.2
		c-1.1,0-2.2,0-3.3,0c-1.1,0-2.2,0-3.3,0c-9.9-0.3-55.7-1-57,13.2c-1.5,16-3.6,65.8-3.6,65.8l0.1,0l-0.1,0.6l63.8-0.3l63.8,0.3
		L153.3,101.3z"/>
                                <g >
                                    <polygon  class="truck_head_st19" points="37.4,101.8 40.5,40.7 45.7,39.8 42.2,101.8 		"/>
                                    <path  class="truck_head_st20" d="M37.4,102.1C37.4,102.1,37.4,102.1,37.4,102.1c-0.2,0-0.3-0.1-0.2-0.3l3.2-61.1
			c0-0.1,0.1-0.2,0.3-0.2c0.1,0,0.2,0.1,0.2,0.3l-3.2,61.1C37.6,102,37.5,102.1,37.4,102.1z"/>
                                    <path  class="truck_head_st20" d="M42.2,102.1L42.2,102.1c-0.2,0-0.3-0.1-0.2-0.3l3.5-62c0-0.1,0.1-0.3,0.3-0.2
			c0.1,0,0.2,0.1,0.2,0.3l-3.5,62C42.4,102,42.3,102.1,42.2,102.1z"/>
                                    <polygon  class="truck_head_st19" points="58.9,101.8 61.3,38.1 63.2,38.1 63.2,101.8 		"/>
                                    <path  class="truck_head_st20" d="M58.9,102.1C58.9,102.1,58.9,102.1,58.9,102.1c-0.1,0-0.3-0.1-0.2-0.3L61,38.1
			c0-0.1,0.1-0.2,0.3-0.2c0.1,0,0.2,0.1,0.2,0.3l-2.3,63.7C59.2,102,59.1,102.1,58.9,102.1z"/>
                                    <path  class="truck_head_st20" d="M63.2,102.1c-0.1,0-0.2-0.1-0.2-0.2V38.1c0-0.1,0.1-0.2,0.2-0.2s0.2,0.1,0.2,0.2v63.7
			C63.4,101.9,63.3,102.1,63.2,102.1z"/>
                                    <path  class="truck_head_st19" d="M72.9,101.8V37.6c0,0,5.5-0.6,10.9,0v64.2H72.9z"/>
                                    <path  class="truck_head_st20" d="M72.9,102.1c-0.1,0-0.2-0.1-0.2-0.2V37.6c0-0.1,0.1-0.2,0.2-0.2s0.2,0.1,0.2,0.2v64.2
			C73.1,101.9,73,102.1,72.9,102.1z"/>
                                    <path  class="truck_head_st20" d="M83.8,102.1c-0.1,0-0.2-0.1-0.2-0.2V37.6c0-0.1,0.1-0.2,0.2-0.2s0.2,0.1,0.2,0.2v64.2
			C84.1,101.9,83.9,102.1,83.8,102.1z"/>
                                    <polygon  class="truck_head_st19" points="142.1,101.8 138.9,40.7 133.8,39.8 137.2,101.8 		"/>
                                    <path  class="truck_head_st20" d="M142.1,102.1C142.1,102.1,142.1,102.1,142.1,102.1c0.2,0,0.3-0.1,0.2-0.3l-3.2-61.1
			c0-0.1-0.1-0.2-0.3-0.2c-0.1,0-0.2,0.1-0.2,0.3l3.2,61.1C141.8,102,141.9,102.1,142.1,102.1z"/>
                                    <path  class="truck_head_st20" d="M137.2,102.1L137.2,102.1c0.2,0,0.3-0.1,0.2-0.3l-3.5-62c0-0.1-0.1-0.3-0.3-0.2
			c-0.1,0-0.2,0.1-0.2,0.3l3.5,62C137,102,137.1,102.1,137.2,102.1z"/>
                                    <polygon  class="truck_head_st19" points="120.5,101.8 118.2,38.1 116.2,38.1 116.2,101.8 		"/>
                                    <path  class="truck_head_st20" d="M120.5,102.1L120.5,102.1c0.1,0,0.3-0.1,0.2-0.3l-2.3-63.7c0-0.1-0.1-0.2-0.3-0.2
			c-0.1,0-0.2,0.1-0.2,0.3l2.3,63.7C120.2,102,120.4,102.1,120.5,102.1z"/>
                                    <path  class="truck_head_st20" d="M116.2,102.1c0.1,0,0.2-0.1,0.2-0.2V38.1c0-0.1-0.1-0.2-0.2-0.2S116,38,116,38.1v63.7
			C116,101.9,116.1,102.1,116.2,102.1z"/>
                                    <path  class="truck_head_st19" d="M106.5,101.8V37.6c0,0-5.5-0.6-10.9,0v64.2H106.5z"/>
                                    <path  class="truck_head_st20" d="M106.5,102.1c0.1,0,0.2-0.1,0.2-0.2V37.6c0-0.1-0.1-0.2-0.2-0.2s-0.2,0.1-0.2,0.2v64.2
			C106.3,101.9,106.4,102.1,106.5,102.1z"/>
                                    <path  class="truck_head_st20" d="M95.6,102.1c0.1,0,0.2-0.1,0.2-0.2V37.6c0-0.1-0.1-0.2-0.2-0.2s-0.2,0.1-0.2,0.2v64.2
			C95.4,101.9,95.5,102.1,95.6,102.1z"/>
                                </g>
                                <path  class="truck_head_st21" d="M108.9,79.7h-39c-1.7,0-3.2-1.4-3.2-3.2V52.9c0-1.7,1.4-3.2,3.2-3.2h39
		c1.7,0,3.2,1.4,3.2,3.2v23.6C112.1,78.3,110.7,79.7,108.9,79.7z"/>
                                <path  class="truck_head_st20" d="M108.9,79.9h-39c-1.9,0-3.4-1.5-3.4-3.4V52.9c0-1.9,1.5-3.4,3.4-3.4h39
		c1.9,0,3.4,1.5,3.4,3.4v23.6C112.3,78.4,110.8,79.9,108.9,79.9z M69.9,50c-1.6,0-2.9,1.3-2.9,2.9v23.6c0,1.6,1.3,2.9,2.9,2.9h39
		c1.6,0,2.9-1.3,2.9-2.9V52.9c0-1.6-1.3-2.9-2.9-2.9H69.9z"/>
                                <line  class="truck_head_st22" x1="103.5" y1="5" x2="128.9" y2="5"/>
                                <g >
                                    <path  class="truck_head_st23" d="M128.7,5.7h-25.4c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h25.4c0.3,0,0.5,0.2,0.5,0.5
			S129,5.7,128.7,5.7z"/>
                                    <path  class="truck_head_st23" d="M121.5,8.4c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			c0.2-0.1,0.5-0.1,0.7,0.2c0.1,0.2,0.1,0.5-0.2,0.7l-4.2,2.6C121.7,8.3,121.6,8.4,121.5,8.4z"/>
                                    <path  class="truck_head_st23" d="M123.6,8.4c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			c0.2-0.1,0.5-0.1,0.7,0.2c0.1,0.2,0.1,0.5-0.2,0.7l-4.2,2.6C123.8,8.3,123.7,8.4,123.6,8.4z"/>
                                    <path  class="truck_head_st24" d="M122.3,8.4c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			c0.2-0.1,0.5-0.1,0.7,0.2c0.1,0.2,0.1,0.5-0.2,0.7l-4.2,2.6C122.5,8.3,122.4,8.4,122.3,8.4z"/>
                                    <path  class="truck_head_st24" d="M129.3,5.2h-23.6c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h23.6c0.3,0,0.5,0.2,0.5,0.5
			S129.6,5.2,129.3,5.2z"/>
                                    <path  class="truck_head_st24" d="M124.5,8.4c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			c0.2-0.1,0.5-0.1,0.7,0.2c0.1,0.2,0.1,0.5-0.2,0.7l-4.2,2.6C124.7,8.3,124.6,8.4,124.5,8.4z"/>
                                    <path  class="truck_head_st23" d="M148.1,11.1C148,11.1,148,11.1,148.1,11.1c-5.1-0.8-10.3-1.5-15.4-1.8
			C126,8.8,119.2,8.7,112.5,9c-0.3,0-0.5-0.2-0.5-0.5c0-0.3,0.2-0.5,0.5-0.5c6.7-0.3,13.6-0.2,20.3,0.3c5.1,0.4,10.3,1,15.4,1.8
			c0.3,0,0.5,0.3,0.4,0.6C148.5,11,148.3,11.1,148.1,11.1z"/>
                                    <path  class="truck_head_st24" d="M148.1,10.6C148,10.6,148,10.5,148.1,10.6c-5.1-0.8-10.3-1.5-15.4-1.8
			c-6.7-0.5-13.5-0.6-20.2-0.3c-0.3,0-0.5-0.2-0.5-0.5c0-0.3,0.2-0.5,0.5-0.5c6.7-0.3,13.6-0.2,20.3,0.3c5.1,0.4,10.3,1,15.4,1.8
			c0.3,0,0.5,0.3,0.4,0.6C148.5,10.4,148.3,10.6,148.1,10.6z"/>
                                </g>
                                <g >
                                    <path  class="truck_head_st23" d="M71.9,5H46.5C46.2,5,46,4.8,46,4.5S46.2,4,46.5,4h25.4c0.3,0,0.5,0.2,0.5,0.5
			S72.2,5,71.9,5z"/>
                                    <path  class="truck_head_st23" d="M64.7,7.7c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			C68.8,4,69.1,4,69.3,4.3c0.1,0.2,0.1,0.5-0.2,0.7l-4.2,2.6C64.9,7.6,64.8,7.7,64.7,7.7z"/>
                                    <path  class="truck_head_st23" d="M66.8,7.7c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			C70.9,4,71.2,4,71.4,4.3c0.1,0.2,0.1,0.5-0.2,0.7L67,7.6C66.9,7.6,66.8,7.7,66.8,7.7z"/>
                                    <path  class="truck_head_st23" d="M91.8,8.3C91.8,8.3,91.8,8.3,91.8,8.3c-6.1-0.1-12.3-0.1-18.3-0.1c-5.9,0-11.9,0-17.8,0.1
			c0,0,0,0,0,0c-0.3,0-0.5-0.2-0.5-0.5c0-0.3,0.2-0.5,0.5-0.5c5.9-0.1,11.9-0.1,17.9-0.1c6.1,0,12.2,0,18.3,0.1
			c0.3,0,0.5,0.2,0.5,0.5C92.3,8,92.1,8.3,91.8,8.3z"/>
                                    <path  class="truck_head_st24" d="M65.5,7.7c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6C69.6,4,70,4,70.1,4.3
			c0.1,0.2,0.1,0.5-0.2,0.7l-4.2,2.6C65.7,7.6,65.6,7.7,65.5,7.7z"/>
                                    <path  class="truck_head_st24" d="M72.5,4.6H48.9c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h23.6c0.3,0,0.5,0.2,0.5,0.5
			S72.8,4.6,72.5,4.6z"/>
                                    <path  class="truck_head_st24" d="M67.7,7.7c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.2-0.1-0.5,0.2-0.7l4.2-2.6
			C71.8,4,72.2,4,72.3,4.3c0.1,0.2,0.1,0.5-0.2,0.7L68,7.6C67.9,7.6,67.8,7.7,67.7,7.7z"/>
                                    <path  class="truck_head_st24" d="M55.6,7.8c-0.3,0-0.5-0.2-0.5-0.5c0-0.3,0.2-0.5,0.5-0.5c5.9-0.1,11.9-0.1,17.9-0.1
			c6.1,0,12.3,0,18.3,0.1c0.3,0,0.5,0.2,0.5,0.5c0,0.3-0.2,0.5-0.5,0.5c0,0,0,0,0,0c-6.1-0.1-12.2-0.1-18.3-0.1
			C67.5,7.7,61.5,7.7,55.6,7.8C55.6,7.8,55.6,7.8,55.6,7.8z"/>
                                </g>
                            </g>
</svg>

                    </div>
                    <div class="truckBodywork bright">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="whatWeDo_icon">
                                    <?= $whatWeDoLisItem ['image'] ?>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="whatWeDo_head">
                                    <?= $whatWeDoLisItem ['head'] ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="whatWeDo_text">
                                    <?= $whatWeDoLisItem ['text'] ?>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>
        <?php endforeach; ?>
    </section>


<!--  Цифры  -->
    <section id="numberSection"
             class="<?= $sections['numbers']['stylekey'] ?> <?= $sections['numbers']['section_type'] ?>"
             style="position: relative;background-image: url(/img/<?= $sections['numbers']['image'] ?>)">

        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbers']['list_items'][0] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= $sections['numbers']['list_items'][0] ['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbers']['list_items'][1] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= $sections['numbers']['list_items'][1] ['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbers']['list_items'][2] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= nl2br($sections['numbers']['list_items'][2] ['text']) ?>
                </div>
            </div>

        </div>
        <svg version="1.1" id="numbersName"
             xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             viewBox="0 0 20 160"
             style="enable-background:new 0 0 20 160;position: absolute;left: 10px;width: 20px;height: 160px;top:15px;"
             xml:space="preserve">
<style type="text/css">
    .numbersName_st0{fill:#FFFFFF;}
</style>
            <g>
                <g>
                    <path class="numbersName_st0" d="M3.6,154.1h4.8v-0.4l-4.8-3.7v-1.7l4.9,4.1c0.2-1.8,1.3-2.5,2.8-3c1.1-0.4,2.1-0.7,3.1-1.2
			v1.5c-0.7,0.4-1.7,0.7-2.5,1c-1.4,0.5-2.4,1.2-2.4,3v0.4h4.9v1.4H3.6V154.1z"/>
                    <path class="numbersName_st0" d="M8.9,137.9c3.7,0,5.7,2.3,5.7,5c0,2.8-2.2,4.9-5.5,4.9c-3.4,0-5.7-2.1-5.7-5
			C3.4,139.8,5.7,137.9,8.9,137.9z M9.1,146.2c2.3,0,4.4-1.2,4.4-3.4c0-2.2-2-3.5-4.5-3.5c-2.1,0-4.4,1.1-4.4,3.4
			C4.6,145.1,6.7,146.2,9.1,146.2z"/>
                    <path class="numbersName_st0" d="M3.6,134.7h4.5v-5.2H3.6V128h10.8v1.4H9.3v5.2h5.1v1.4H3.6V134.7z"/>
                    <path class="numbersName_st0" d="M3.6,124.2h4.8v-0.4l-4.8-3.7v-1.7l4.9,4.1c0.2-1.8,1.3-2.5,2.8-3c1.1-0.4,2.1-0.7,3.1-1.2
			v1.5c-0.7,0.4-1.7,0.7-2.5,1c-1.4,0.5-2.4,1.2-2.4,3v0.4h4.9v1.4H3.6V124.2z"/>
                    <path class="numbersName_st0" d="M3.7,116.9c-0.1-0.7-0.2-1.6-0.2-2.7c0-1.4,0.3-2.4,0.9-3c0.5-0.6,1.3-0.9,2.3-0.9
			c1,0,1.7,0.3,2.3,0.8c0.8,0.7,1.2,1.9,1.2,3.3c0,0.4,0,0.8-0.1,1.1h4.3v1.4H3.7z M8.9,115.6c0.1-0.3,0.1-0.7,0.1-1.2
			c0-1.7-0.8-2.7-2.3-2.7c-1.4,0-2.1,1-2.1,2.5c0,0.6,0,1.1,0.1,1.3H8.9z"/>
                    <path class="numbersName_st0" d="M9.3,102.8v4.2h3.9v-4.7h1.2v6.1H3.6v-5.8h1.2v4.4h3.4v-4.2H9.3z"/>
                    <path class="numbersName_st0" d="M4.8,98.4v3.3H3.6v-8h1.2V97h9.6v1.4H4.8z"/>
                    <path class="numbersName_st0" d="M3.6,91.1h4.5v-5.2H3.6v-1.4h10.8v1.4H9.3v5.2h5.1v1.4H3.6V91.1z"/>
                    <path class="numbersName_st0" d="M3.6,80.7h4c0-0.3-0.1-0.9-0.1-1.3c0-2.2,1-4.2,3.4-4.2c1,0,1.7,0.3,2.3,0.8
			c0.9,0.9,1.3,2.4,1.3,3.8c0,1-0.1,1.7-0.1,2.2H3.6V80.7z M13.3,80.7c0.1-0.3,0.1-0.6,0.1-1.1c0-1.5-0.8-2.9-2.4-2.9
			c-1.7,0-2.3,1.4-2.3,2.9c0,0.5,0,0.9,0.1,1.1H13.3z M3.6,72.7h10.8v1.4H3.6V72.7z"/>
                    <path class="numbersName_st0" d="M9.3,64.6v4.2h3.9v-4.7h1.2v6.1H3.6v-5.8h1.2v4.4h3.4v-4.2H9.3z"/>
                </g>
                <g>
                    <path class="numbersName_st0" d="M3.5,53.7h9.6v-4.9H3.5v-1.4h9.7l0-0.9l3.7,0.1v1.1l-2.6,0.1v7.4H3.5V53.7z"/>
                    <path class="numbersName_st0" d="M3.5,43.3h4.5c1.7,0,3.1,0,4.6,0.1l0,0c-1.1-0.5-2.3-1.2-3.6-2l-5.6-3.5v-1.4h10.8v1.3H9.7
			c-1.7,0-3,0-4.4-0.1l0,0c1.2,0.5,2.4,1.3,3.6,2l5.4,3.4v1.5H3.5V43.3z"/>
                    <path class="numbersName_st0" d="M3.1,28.8h1c0.1-2.3,1.5-4.5,4.9-4.5s4.7,2.3,4.8,4.6h1v1.3h-1c-0.1,2.3-1.3,4.5-4.8,4.5
			c-3.5,0-4.8-2.5-4.9-4.6h-1V28.8z M5.1,30.2c0.1,1.4,1.1,3.1,3.9,3.1c2.6,0,3.7-1.5,3.8-3.1H5.1z M12.7,28.9
			c-0.1-1.6-1.2-3.1-3.8-3.1c-2.8,0-3.8,1.6-3.8,3.1H12.7z"/>
                    <path class="numbersName_st0" d="M3.7,22.5c-0.1-0.7-0.2-1.6-0.2-2.7c0-1.4,0.3-2.4,0.9-3c0.5-0.6,1.3-0.9,2.3-0.9
			c1,0,1.7,0.3,2.3,0.8c0.8,0.7,1.2,1.9,1.2,3.3c0,0.4,0,0.8-0.1,1.1h4.3v1.4H3.7z M8.9,21.1C8.9,20.8,9,20.4,9,20
			c0-1.7-0.8-2.7-2.3-2.7c-1.4,0-2.1,1-2.1,2.5c0,0.6,0,1.1,0.1,1.3H8.9z"/>
                    <path class="numbersName_st0" d="M3.5,12.6h4c0-0.3-0.1-0.9-0.1-1.3c0-2.2,1-4.2,3.4-4.2c1,0,1.7,0.3,2.3,0.8
			c0.9,0.9,1.3,2.4,1.3,3.8c0,1-0.1,1.7-0.1,2.2H3.5V12.6z M13.2,12.6c0.1-0.3,0.1-0.6,0.1-1.1c0-1.5-0.8-2.9-2.4-2.9
			c-1.7,0-2.3,1.4-2.3,2.9c0,0.5,0,0.9,0.1,1.1H13.2z M3.5,4.6h10.8V6H3.5V4.6z"/>
                </g>
            </g>
</svg>

    </section>

<!--  проекты  -->
    <section
        id="ourProjectsSection"
        class="<?= $sections['projects']['stylekey'] ?> <?= $sections['projects']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['projects']['head'] ?></h2>
            </div>
            <div class="col-sm-12">
                <div class="doneProjects">
                    <?php foreach ($sections['projects']['list_items'] as $project) : ?>
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

    <section
        id="reviewsSection"
        class="<?= $sections['reviews']['stylekey'] ?> <?= $sections['reviews']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['reviews']['head'] ?></h2>
            </div>
        </div>

            <div class="reviewsCarWrapper ">
                <div class="reviewsCarousel text-center">
                    <?php foreach ($sections['reviews']['list_items'] as $review) : ?>
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
                    <?= Html::img('/img/'. $sections['clients']['list_items'][0]['image'],['alt'=>$sections['clients']['list_items'][0]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clients']['list_items'][1]['image'],['alt'=>$sections['clients']['list_items'][1]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clients']['list_items'][2]['image'],['alt'=>$sections['clients']['list_items'][2]['image_alt']] ) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clients']['list_items'][3]['image'],['alt'=>$sections['clients']['list_items'][3]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clients']['list_items'][4]['image'],['alt'=>$sections['clients']['list_items'][4]['image_alt']] ) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::img('/img/'. $sections['clients']['list_items'][5]['image'],['alt'=>$sections['clients']['list_items'][5]['image_alt']] ) ?>

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
                            <?= $form->field($preorderForm, 'weight')
                                ->textInput(['maxlength' => true, 'id' => 'mainOrderForm-weight'])
                                ->label('Вес')  ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'cargo')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-cargo'])
                                ->label('Характер груза')  ?>
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
                        <div class="col-sm-12">
                            <?= $form->field($preorderForm, 'text')
                                ->textarea(['rows' => 1, 'id' => 'mainOrderForm-text'])
                                ->label('Комментарий') ?>
                        </div>
                        <!--        captcha -->
                        <!--        <div class="col-sm-12"> --><?//= $form->field($preorderForm, 'captcha')->widget(Captcha::className()) ?><!--</div>-->

                        <?= $form->field($preorderForm, 'from_page')
                            ->hiddenInput(['value'=>$page ['hrurl'], 'id' => 'mainOrderForm-from_page'])
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








