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
        <h1 class="head c_def"><?= $sections['top']['head'] ?></h1>
        <h2 class="extra c_def"><?= $sections['top']['extra'] ?></h2>
        <div class="col-sm-4 col-sm-offset-4 ">
            <?= \app\widgets\Alert::widget() ?>
            <div class="blackBox">
               <div class="row">
                   <div class="col-xs-6 text-center">
                       <h5 class="c_def">Договор</h5>
                       <a class="topMagLink"
                           href="/img/d_pic_tz_contract.jpg"
                       ><i class="fa fa-file-word-o topIcon" aria-hidden="true"></i></a>
                       <?= Html::a('скачать','/img/d_договор_трансзаказ-перевозчик.docx', ['class'=>'goLink downloadLink']) ?>
                   </div>
                   <div class="col-xs-6 text-center">
                       <h5 class="c_def">Наши реквизиты</h5>
                       <a class="topMagLink"
                          href="/img/d_pic_tz_card.jpg"
                       ><i class="fa fa-file-image-o topIcon" aria-hidden="true"></i></a>
                       <?= Html::a('скачать','/img/d_трансзаказ_реквизиты.jpg', ['class'=>'goLink downloadLink']) ?>
                   </div>
                   <div class="col-xs-12 text-right">
                       <?= Html::a('я не юридическое лицо','/lp/perevozki-po-rossii', ['class'=>'goLink i_m_not mt10']) ?>
                   </div>
               </div>

            </div>
        </div>


    </section>

    <!--Гараж-->
    <section class="<?= $sections['garage']['stylekey'] ?> <?= $sections['garage']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['garage']['head'] ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12  col-lg-10 col-lg-offset-1 garageBox">
                <div class="garageSlick">

                    <?php foreach ($sections['garage']['list_items'] as $car) : ?>
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

        </div>
    </section>

    <!-- /Гараж  -->


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
                                    $modstr = '+'.$sections['action']['extra'].' day';
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

<!--Услуги-->
    <section class="<?= $sections['services']['stylekey'] ?> <?= $sections['services']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 text-center">
                <h2 class="head"><?= $sections['services']['head'] ?></h2>
            </div>
            <div class="col-sm-4  text-center">
                <div class="addIconBox">
                    <div class="col-xs-3">
<!--                        --><?//= Html::img('/img/b2b_s_dogruz.png',
//                            ['alt'=>'','class'=>'addIcon']) ?>
                        <svg version="1.1" id="dogruzIco" class="addIcon"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 90 90"
                             style="enable-background:new 0 0 90 90;"
                             xml:space="preserve">
<style type="text/css">
    .dogruzIco_st0{fill:#58595B;}
    .dogruzIco_st1{fill:none;stroke:#58595B;stroke-miterlimit:10;}
    .dogruzIco_st2{fill:none;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
    .dogruzIco_st3{fill:#FFFFFF;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
</style>

                            <g>
                                <path class="dogruzIco_st0" d="M34.3,68.5H30v1.4h-1v-2.3h0.6c0,0,0.1,0,0.1-0.1c0.1-0.1,0.2-0.1,0.3-0.3
		c0.1-0.1,0.1-0.2,0.2-0.4c0-0.1,0.1-0.3,0.1-0.5c0-0.2,0-0.3,0.1-0.5s0-0.3,0-0.4c0-0.1,0-0.3,0-0.5c0-0.2,0-0.4,0-0.6
		c0-0.2,0-0.5,0-0.7c0-0.3,0-0.6,0-1h3.9v4.8h0.9v2.3h-1V68.5z M30.9,67.7h2.4v-4h-2c0,0.4,0,0.7,0,0.9c0,0.3,0,0.5,0,0.8
		c0,0.2,0,0.5,0,0.7s-0.1,0.4-0.1,0.7c0,0.2-0.1,0.4-0.1,0.6C31,67.4,31,67.6,30.9,67.7z"/>
                                <path class="dogruzIco_st0" d="M38.4,62.7c0.4,0,0.8,0.1,1.1,0.2s0.6,0.4,0.9,0.6c0.2,0.3,0.4,0.6,0.5,1
		c0.1,0.4,0.2,0.7,0.2,1.2c0,0.4-0.1,0.8-0.2,1.2c-0.1,0.4-0.3,0.7-0.5,1c-0.2,0.3-0.5,0.5-0.9,0.6s-0.7,0.2-1.1,0.2
		s-0.8-0.1-1.1-0.2c-0.3-0.2-0.6-0.4-0.9-0.6c-0.2-0.3-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.7-0.2-1.2c0-0.4,0.1-0.8,0.2-1.2
		c0.1-0.4,0.3-0.7,0.5-1c0.2-0.3,0.5-0.5,0.9-0.6C37.6,62.8,38,62.7,38.4,62.7z M38.4,63.5c-0.3,0-0.6,0.1-0.8,0.2
		c-0.2,0.1-0.4,0.3-0.5,0.5c-0.1,0.2-0.2,0.4-0.3,0.7s-0.1,0.5-0.1,0.8c0,0.3,0,0.5,0.1,0.8c0.1,0.3,0.2,0.5,0.3,0.7
		c0.1,0.2,0.3,0.4,0.5,0.5c0.2,0.1,0.5,0.2,0.8,0.2c0.3,0,0.6-0.1,0.8-0.2s0.4-0.3,0.5-0.5c0.1-0.2,0.2-0.4,0.3-0.7
		c0.1-0.3,0.1-0.5,0.1-0.8c0-0.3,0-0.5-0.1-0.8c-0.1-0.3-0.2-0.5-0.3-0.7c-0.1-0.2-0.3-0.4-0.5-0.5C39,63.6,38.7,63.5,38.4,63.5z"
                                />
                                <path class="dogruzIco_st0" d="M42,62.8H46v0.9H43v4.8h-1V62.8z"/>
                                <path class="dogruzIco_st0" d="M46.8,62.8h2.5c0.4,0,0.7,0.1,1,0.2c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.2,0.2,0.4,0.3,0.6
		c0,0.2,0.1,0.4,0.1,0.6s0,0.4-0.1,0.6c-0.1,0.2-0.1,0.4-0.3,0.6c-0.1,0.2-0.3,0.3-0.6,0.4c-0.3,0.1-0.6,0.2-1,0.2h-1.5v2.2h-1
		V62.8z M47.8,65.5h1.5c0.1,0,0.2,0,0.3,0c0.1,0,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.2,0.2-0.3s0.1-0.3,0.1-0.5c0-0.2,0-0.3-0.1-0.5
		c-0.1-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.2-0.1-0.3-0.1c-0.1,0-0.2,0-0.4,0h-1.5V65.5z"/>
                                <path class="dogruzIco_st0" d="M52.4,67.7c0.2,0,0.4-0.1,0.6-0.2c0.2-0.1,0.3-0.3,0.4-0.5l-1.9-4.2h1.2L54,66h0l1.3-3.2
		h1.1L54.5,67c-0.2,0.5-0.5,0.9-0.9,1.2c-0.3,0.2-0.7,0.4-1.2,0.4c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0v-0.9c0.1,0,0.1,0,0.2,0
		C52.3,67.7,52.3,67.7,52.4,67.7z"/>
                                <path class="dogruzIco_st0" d="M58.4,65.2c0.4,0,0.7,0,0.9-0.2c0.2-0.1,0.3-0.4,0.3-0.7c0-0.3-0.1-0.4-0.2-0.6
		c-0.2-0.1-0.4-0.2-0.6-0.2c-0.2,0-0.3,0-0.4,0.1s-0.2,0.1-0.3,0.2c-0.1,0.1-0.1,0.2-0.2,0.4c0,0.1,0,0.3,0,0.4h-1
		c0-0.3,0.1-0.5,0.1-0.8c0.1-0.2,0.2-0.4,0.4-0.6c0.2-0.2,0.4-0.3,0.6-0.4c0.2-0.1,0.5-0.1,0.8-0.1c0.2,0,0.5,0,0.7,0.1
		c0.2,0.1,0.4,0.2,0.6,0.3s0.3,0.3,0.4,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.3-0.1,0.5-0.2,0.8c-0.1,0.2-0.3,0.4-0.6,0.5v0
		c0.3,0.1,0.6,0.2,0.8,0.5c0.2,0.3,0.3,0.6,0.3,1c0,0.3-0.1,0.5-0.2,0.7c-0.1,0.2-0.2,0.4-0.4,0.6c-0.2,0.2-0.4,0.3-0.7,0.3
		c-0.3,0.1-0.5,0.1-0.8,0.1c-0.4,0-0.7,0-0.9-0.1c-0.3-0.1-0.5-0.2-0.6-0.4c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.2-0.1-0.5-0.1-0.8h1
		c0,0.4,0.1,0.7,0.2,0.9c0.2,0.2,0.4,0.3,0.8,0.3c0.3,0,0.6-0.1,0.8-0.2c0.2-0.2,0.3-0.4,0.3-0.7c0-0.2,0-0.4-0.1-0.5
		s-0.2-0.2-0.3-0.3c-0.1-0.1-0.3-0.1-0.5-0.1c-0.2,0-0.4,0-0.6,0V65.2z"/>
                            </g>
                            <circle class="dogruzIco_st1" cx="45" cy="45" r="40"/>
                            <g>
                                <g>
                                    <path class="dogruzIco_st2" d="M21.2,22.2h29.7c0.6,0,1.2,0.5,1.2,1.2v17.2c0,0.6-0.5,1.2-1.2,1.2H21.2
			c-0.6,0-1.2-0.5-1.2-1.2V23.4C20,22.8,20.5,22.2,21.2,22.2z"/>
                                    <line class="dogruzIco_st2" x1="23.4" y1="41.7" x2="23.4" y2="43.8"/>
                                    <line class="dogruzIco_st2" x1="50.8" y1="41.7" x2="50.8" y2="43"/>
                                    <polyline class="dogruzIco_st2" points="27.4,43.8 21.2,43.8 21.2,45.1 25.9,45.8 			"/>
                                    <line class="dogruzIco_st2" x1="32.9" y1="43.8" x2="38.2" y2="43.8"/>
                                    <line class="dogruzIco_st2" x1="42.4" y1="43" x2="58.8" y2="43"/>
                                    <line class="dogruzIco_st2" x1="34.5" y1="47.3" x2="36.6" y2="47.3"/>
                                    <line class="dogruzIco_st2" x1="45.3" y1="47.3" x2="55.8" y2="47.3"/>
                                    <path class="dogruzIco_st2" d="M53.6,43V28.6c0-0.6,0.5-1.2,1.2-1.2h10.1c0.4,0,0.8,0.3,1,0.7l4,8.3v6.5h-1.9v0.8h0.2"/>
                                    <polyline class="dogruzIco_st2" points="66.7,29.7 59.7,29.7 59.7,35.7 69.7,35.7 			"/>
                                    <line class="dogruzIco_st2" x1="64.7" y1="29.7" x2="64.7" y2="35.7"/>
                                    <path class="dogruzIco_st2" d="M68.3,43.6h0.6c0.6,0,1.2,0.5,1.2,1.2l0,0c0,0.6-0.5,1.2-1.2,1.2h-4.6"/>
                                    <g>
                                        <circle class="dogruzIco_st2" cx="30.1" cy="47.1" r="1.9"/>
                                        <circle class="dogruzIco_st2" cx="30.1" cy="47.1" r="4.3"/>
                                    </g>
                                    <g>
                                        <circle class="dogruzIco_st2" cx="41" cy="47.1" r="1.9"/>
                                        <circle class="dogruzIco_st2" cx="41" cy="47.1" r="4.3"/>
                                    </g>
                                    <g>
                                        <circle class="dogruzIco_st2" cx="60.1" cy="47.1" r="1.9"/>
                                        <circle class="dogruzIco_st2" cx="60.1" cy="47.1" r="4.3"/>
                                    </g>
                                    <path class="dogruzIco_st2" d="M68.3,43.6"/>
                                </g>
                                <path class="dogruzIco_st3" d="M35.6,50.8"/>
                                <rect x="21.2" y="23.4" class="dogruzIco_st0" width="14.8" height="17.2"/>
                            </g>

</svg>

                    </div>
                    <div class="col-xs-3">
                        <svg version="1.1" id="generalIco" class="addIcon"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px"
                             viewBox="0 0 90 90"
                             style="enable-background:new 0 0 90 90;"
                             xml:space="preserve">
<style type="text/css">
    .generalIco_st0{fill:#58595B;}
    .generalIco_st1{fill:none;stroke:#58595B;stroke-miterlimit:10;}
    .generalIco_st2{fill:none;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
    .generalIco_st3stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
</style>
                            <g>
                                <g>
                                    <path class="generalIco_st0" d="M23,57.8c0.4,0,0.8,0.1,1.1,0.2c0.3,0.2,0.6,0.4,0.9,0.6c0.2,0.3,0.4,0.6,0.5,1
			c0.1,0.4,0.2,0.7,0.2,1.2c0,0.4-0.1,0.8-0.2,1.2c-0.1,0.4-0.3,0.7-0.5,1c-0.2,0.3-0.5,0.5-0.9,0.6s-0.7,0.2-1.1,0.2
			s-0.8-0.1-1.1-0.2c-0.3-0.2-0.6-0.4-0.9-0.6c-0.2-0.3-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.2c0-0.4,0.1-0.8,0.2-1.2
			c0.1-0.4,0.3-0.7,0.5-1c0.2-0.3,0.5-0.5,0.9-0.6C22.2,57.9,22.6,57.8,23,57.8z M23,58.6c-0.3,0-0.6,0.1-0.8,0.2
			c-0.2,0.1-0.4,0.3-0.5,0.5s-0.2,0.4-0.3,0.7c-0.1,0.3-0.1,0.5-0.1,0.8c0,0.3,0,0.5,0.1,0.8s0.2,0.5,0.3,0.7s0.3,0.4,0.5,0.5
			c0.2,0.1,0.5,0.2,0.8,0.2c0.3,0,0.6-0.1,0.8-0.2c0.2-0.1,0.4-0.3,0.5-0.5s0.2-0.4,0.3-0.7c0.1-0.3,0.1-0.5,0.1-0.8
			c0-0.3,0-0.5-0.1-0.8c-0.1-0.3-0.2-0.5-0.3-0.7s-0.3-0.4-0.5-0.5S23.3,58.6,23,58.6z"/>
                                    <path class="generalIco_st0" d="M26.1,58h4.6v0.9H29v4.8h-1v-4.8h-1.8V58z"/>
                                    <path class="generalIco_st0" d="M36.2,63.7h-4.3v1.4h-1v-2.3h0.6c0,0,0.1,0,0.1-0.1c0.1-0.1,0.2-0.1,0.3-0.3
			c0.1-0.1,0.1-0.2,0.2-0.4c0-0.1,0.1-0.3,0.1-0.5c0-0.2,0-0.3,0.1-0.5s0-0.3,0-0.4s0-0.3,0-0.5s0-0.4,0-0.6c0-0.2,0-0.5,0-0.7
			c0-0.3,0-0.6,0-1h3.9v4.8h0.9v2.3h-1V63.7z M32.8,62.8h2.4v-4h-2c0,0.4,0,0.7,0,0.9c0,0.3,0,0.5,0,0.8c0,0.2,0,0.5,0,0.7
			c0,0.2-0.1,0.4-0.1,0.7c0,0.2-0.1,0.4-0.1,0.6C32.9,62.6,32.9,62.7,32.8,62.8z"/>
                                    <path class="generalIco_st0" d="M37.9,58H42v0.9h-3.1v1.5h2.9v0.8h-2.9v1.7h3.2v0.9h-4.2V58z"/>
                                    <path class="generalIco_st0" d="M42.7,62.8c0.1,0,0.3,0,0.4-0.1s0.2-0.1,0.3-0.3s0.1-0.2,0.2-0.4s0.1-0.3,0.1-0.5
			c0-0.2,0-0.3,0.1-0.5c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.5s0-0.4,0-0.6c0-0.2,0-0.5,0-0.7c0-0.3,0-0.6,0-1h3.9v5.7h-1v-4.8h-2
			c0,0.4,0,0.7,0,0.9c0,0.3,0,0.5,0,0.8c0,0.2,0,0.5,0,0.7c0,0.2-0.1,0.4-0.1,0.7c0,0.2-0.1,0.4-0.1,0.6S44.2,62.9,44,63
			c-0.1,0.2-0.3,0.3-0.5,0.5c-0.2,0.1-0.5,0.2-0.8,0.2c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0v-0.9c0.1,0,0.1,0,0.2,0
			C42.5,62.8,42.6,62.8,42.7,62.8z"/>
                                    <path class="generalIco_st0" d="M48.8,58h1v2.2h1.5c0.4,0,0.7,0.1,1,0.2s0.5,0.3,0.6,0.4c0.1,0.2,0.2,0.4,0.3,0.6
			s0.1,0.4,0.1,0.6s0,0.4-0.1,0.6s-0.1,0.4-0.3,0.6c-0.1,0.2-0.3,0.3-0.6,0.4s-0.6,0.2-1,0.2h-2.5V58z M49.8,62.9h1.5
			c0.1,0,0.3,0,0.4,0c0.1,0,0.2-0.1,0.3-0.1s0.2-0.2,0.2-0.3c0.1-0.1,0.1-0.3,0.1-0.5c0-0.2,0-0.3-0.1-0.5c-0.1-0.1-0.1-0.2-0.2-0.3
			c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1,0-0.2,0-0.3,0h-1.5V62.9z"/>
                                    <path class="generalIco_st0" d="M54.1,58h1v2.3h2.6V58h1v5.7h-1v-2.6h-2.6v2.6h-1V58z"/>
                                    <path class="generalIco_st0" d="M61.5,58h1.1l2.2,5.7h-1.1l-0.5-1.5h-2.3l-0.5,1.5h-1L61.5,58z M61.1,61.4h1.7L62,58.9h0
			L61.1,61.4z"/>
                                    <path class="generalIco_st0" d="M69.4,63.7h-1v-2.2h-1.1l-1.5,2.2h-1.2l1.6-2.3c-0.3-0.1-0.5-0.2-0.6-0.3
			c-0.2-0.1-0.3-0.3-0.4-0.4c-0.1-0.2-0.2-0.3-0.2-0.5c0-0.2-0.1-0.3-0.1-0.5c0-0.2,0-0.4,0.1-0.6s0.1-0.4,0.3-0.6s0.3-0.3,0.6-0.4
			c0.3-0.1,0.6-0.2,1-0.2h2.5V63.7z M68.4,58.8h-1.5c-0.1,0-0.3,0-0.4,0c-0.1,0-0.2,0.1-0.3,0.1c-0.1,0.1-0.2,0.2-0.2,0.3
			c-0.1,0.1-0.1,0.3-0.1,0.5c0,0.2,0,0.3,0.1,0.5s0.1,0.2,0.2,0.3s0.2,0.1,0.3,0.2s0.2,0,0.3,0h1.5V58.8z"/>
                                    <path class="generalIco_st0" d="M26.7,67.6h1.4l1.6,4.5h0l1.5-4.5h1.4v5.7h-1v-4.4h0l-1.6,4.4h-0.8l-1.6-4.4h0v4.4h-1V67.6z
			"/>
                                    <path class="generalIco_st0" d="M35.4,67.6h1.1l2.2,5.7h-1.1L37,71.8h-2.3l-0.5,1.5h-1L35.4,67.6z M35,71h1.7l-0.9-2.5h0
			L35,71z"/>
                                    <path class="generalIco_st0" d="M43.3,72.4h2.1v-4.8h1v5.7h-7.2v-5.7h1v4.8h2.1v-4.8h1V72.4z"/>
                                    <path class="generalIco_st0" d="M47.6,67.6h1v4.3l2.4-4.3h1.2v5.7h-1V69l-2.5,4.3h-1.1V67.6z"/>
                                    <path class="generalIco_st0" d="M53.3,67.6h1v2.3h2.6v-2.3h1v5.7h-1v-2.6h-2.6v2.6h-1V67.6z"/>
                                    <path class="generalIco_st0" d="M60.7,67.6h1.1l2.2,5.7h-1.1l-0.5-1.5H60l-0.5,1.5h-1L60.7,67.6z M60.3,71h1.7l-0.9-2.5h0
			L60.3,71z"/>
                                </g>
                                <circle class="generalIco_st1" cx="45" cy="45" r="40"/>
                                <g>
                                    <g>
                                        <path class="generalIco_st2" d="M22,22.2h29.7c0.6,0,1.2,0.5,1.2,1.2v17.2c0,0.6-0.5,1.2-1.2,1.2H22
				c-0.6,0-1.2-0.5-1.2-1.2V23.4C20.8,22.8,21.3,22.2,22,22.2z"/>
                                        <line class="generalIco_st2" x1="24.2" y1="41.7" x2="24.2" y2="43.8"/>
                                        <line class="generalIco_st2" x1="51.6" y1="41.7" x2="51.6" y2="43"/>
                                        <polyline class="generalIco_st2" points="28.2,43.8 22,43.8 22,45.1 26.7,45.8 			"/>
                                        <line class="generalIco_st2" x1="33.7" y1="43.8" x2="39" y2="43.8"/>
                                        <line class="generalIco_st2" x1="43.2" y1="43" x2="59.6" y2="43"/>
                                        <line class="generalIco_st2" x1="35.3" y1="47.3" x2="37.4" y2="47.3"/>
                                        <line class="generalIco_st2" x1="46.1" y1="47.3" x2="56.6" y2="47.3"/>
                                        <path class="generalIco_st2" d="M54.4,43V28.6c0-0.6,0.5-1.2,1.2-1.2h10.1c0.4,0,0.8,0.3,1,0.7l4,8.3v6.5h-1.9v0.8h0.2"/>
                                        <polyline class="generalIco_st2" points="67.6,29.7 60.5,29.7 60.5,35.7 70.5,35.7 			"/>
                                        <line class="generalIco_st2" x1="65.5" y1="29.7" x2="65.5" y2="35.7"/>
                                        <path class="generalIco_st2" d="M69.1,43.6h0.6c0.6,0,1.2,0.5,1.2,1.2v0c0,0.6-0.5,1.2-1.2,1.2h-4.6"/>
                                        <g>
                                            <circle class="generalIco_st2" cx="30.9" cy="47.1" r="1.9"/>
                                            <circle class="generalIco_st2" cx="30.9" cy="47.1" r="4.3"/>
                                        </g>
                                        <g>
                                            <circle class="generalIco_st2" cx="41.8" cy="47.1" r="1.9"/>
                                            <circle class="generalIco_st2" cx="41.8" cy="47.1" r="4.3"/>
                                        </g>
                                        <g>
                                            <circle class="generalIco_st2" cx="60.9" cy="47.1" r="1.9"/>
                                            <circle class="generalIco_st2" cx="60.9" cy="47.1" r="4.3"/>
                                        </g>
                                        <path class="generalIco_st2" d="M69.1,43.6"/>
                                    </g>
                                    <path class="generalIco_st3" d="M36.4,50.8"/>
                                    <rect x="22" y="23.4" class="generalIco_st0" width="29.6" height="17.2"/>
                                </g>
                            </g>
</svg>

                    </div>
                    <div class="col-xs-3">
                        <svg version="1.1" id="negabaritIco" class="addIcon"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px"
                             viewBox="0 0 90 90"
                             style="enable-background:new 0 0 90 90;"
                             xml:space="preserve">
<style type="text/css">
    .negabaritIco_st0{fill:#58595B;}
    .negabaritIco_st1{fill:none;stroke:#58595B;stroke-miterlimit:10;}
    .negabaritIco_st2{fill:none;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
    .negabaritIco_st3{fill:#FFFFFF;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
</style>
                            <g>
                                <g>
                                    <path class="negabaritIco_st0" d="M22.5,62.8h1V65h2.6v-2.3h1v5.7h-1v-2.6h-2.6v2.6h-1V62.8z"/>
                                    <path class="negabaritIco_st0" d="M28.3,62.8h4.1v0.9h-3.1v1.5h2.9v0.8h-2.9v1.7h3.2v0.9h-4.2V62.8z"/>
                                    <path class="negabaritIco_st0" d="M33.3,62.8h3.9v0.9h-2.9v4.8h-1V62.8z"/>
                                    <path class="negabaritIco_st0" d="M39.6,62.8h1.1l2.2,5.7h-1.1L41.2,67h-2.3l-0.5,1.5h-1L39.6,62.8z M39.2,66.2H41l-0.9-2.5h0
			L39.2,66.2z"/>
                                    <path class="negabaritIco_st0" d="M43.4,62.8h3.9v0.9h-2.9V65h1.5c0.4,0,0.7,0.1,1,0.2s0.5,0.3,0.6,0.4
			c0.1,0.2,0.2,0.4,0.3,0.6s0.1,0.4,0.1,0.6s0,0.4-0.1,0.6s-0.1,0.4-0.3,0.6c-0.1,0.2-0.3,0.3-0.6,0.4s-0.6,0.2-1,0.2h-2.5V62.8z
			 M44.4,67.7h1.5c0.1,0,0.3,0,0.4,0c0.1,0,0.2-0.1,0.3-0.1s0.2-0.2,0.2-0.3c0.1-0.1,0.1-0.3,0.1-0.5c0-0.2,0-0.3-0.1-0.5
			c-0.1-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1,0-0.2,0-0.3,0h-1.5V67.7z"/>
                                    <path class="negabaritIco_st0" d="M50.2,62.8h1.1l2.2,5.7h-1.1L51.9,67h-2.3l-0.5,1.5h-1L50.2,62.8z M49.9,66.2h1.7l-0.9-2.5
			h0L49.9,66.2z"/>
                                    <path class="negabaritIco_st0" d="M54,62.8h2.5c0.4,0,0.7,0.1,1,0.2c0.3,0.1,0.5,0.3,0.6,0.4s0.2,0.4,0.3,0.6
			c0.1,0.2,0.1,0.4,0.1,0.6c0,0.2,0,0.4-0.1,0.6c-0.1,0.2-0.1,0.4-0.3,0.6s-0.3,0.3-0.6,0.4c-0.3,0.1-0.6,0.2-1,0.2H55v2.2h-1V62.8z
			 M55,65.5h1.5c0.1,0,0.2,0,0.3,0s0.2-0.1,0.3-0.2s0.2-0.2,0.2-0.3c0.1-0.1,0.1-0.3,0.1-0.5c0-0.2,0-0.3-0.1-0.5
			c-0.1-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.2-0.1-0.3-0.1c-0.1,0-0.2,0-0.4,0H55V65.5z"/>
                                    <path class="negabaritIco_st0" d="M59.4,62.8h1V67l2.4-4.3H64v5.7h-1v-4.3l-2.5,4.3h-1.1V62.8z"/>
                                    <path class="negabaritIco_st0" d="M64.6,62.8h4.6v0.9h-1.8v4.8h-1v-4.8h-1.8V62.8z"/>
                                </g>
                                <circle class="negabaritIco_st1" cx="45" cy="45" r="40"/>
                                <g>
                                    <g>
                                        <rect x="18.8" y="31.5" class="negabaritIco_st0" width="18.8" height="1"/>
                                        <g>
                                            <path class="negabaritIco_st0" d="M16.4,32c1.1,0.4,2.5,1.1,3.4,1.9L19.1,32l0.7-1.9C19,30.9,17.5,31.6,16.4,32z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <rect x="37.2" y="19.5" class="negabaritIco_st0" width="1" height="13"/>
                                        <g>
                                            <path class="negabaritIco_st0" d="M37.7,17.1c-0.4,1.1-1.1,2.5-1.9,3.4l1.9-0.7l1.9,0.7C38.8,19.6,38.1,18.2,37.7,17.1z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <path class="negabaritIco_st2" d="M22.8,22.3h29.7c0.6,0,1.2,0.5,1.2,1.2v17.2c0,0.6-0.5,1.2-1.2,1.2H22.8
				c-0.6,0-1.2-0.5-1.2-1.2V23.4C21.7,22.8,22.2,22.3,22.8,22.3z"/>
                                        <line class="negabaritIco_st2" x1="25" y1="41.7" x2="25" y2="43.8"/>
                                        <line class="negabaritIco_st2" x1="52.4" y1="41.7" x2="52.4" y2="43"/>
                                        <polyline class="negabaritIco_st2" points="29.1,43.8 22.8,43.8 22.8,45.1 27.5,45.8 			"/>
                                        <line class="negabaritIco_st2" x1="34.6" y1="43.8" x2="39.9" y2="43.8"/>
                                        <line class="negabaritIco_st2" x1="44" y1="43" x2="60.4" y2="43"/>
                                        <line class="negabaritIco_st2" x1="36.1" y1="47.3" x2="38.2" y2="47.3"/>
                                        <line class="negabaritIco_st2" x1="46.9" y1="47.3" x2="57.4" y2="47.3"/>
                                        <path class="negabaritIco_st2" d="M55.3,43V28.6c0-0.6,0.5-1.2,1.2-1.2h10.1c0.4,0,0.8,0.3,1,0.7l4,8.3v6.5h-1.9v0.8h0.2"/>
                                        <polyline class="negabaritIco_st2" points="68.4,29.7 61.3,29.7 61.3,35.7 71.3,35.7 			"/>
                                        <line class="negabaritIco_st2" x1="66.3" y1="29.8" x2="66.3" y2="35.7"/>
                                        <path class="negabaritIco_st2" d="M69.9,43.6h0.6c0.6,0,1.2,0.5,1.2,1.2l0,0c0,0.6-0.5,1.2-1.2,1.2h-4.6"/>
                                        <g>
                                            <circle class="negabaritIco_st2" cx="31.8" cy="47.1" r="1.9"/>
                                            <circle class="negabaritIco_st2" cx="31.8" cy="47.1" r="4.3"/>
                                        </g>
                                        <g>
                                            <circle class="negabaritIco_st2" cx="42.7" cy="47.1" r="1.9"/>
                                            <circle class="negabaritIco_st2" cx="42.7" cy="47.1" r="4.3"/>
                                        </g>
                                        <g>
                                            <circle class="negabaritIco_st2" cx="61.8" cy="47.1" r="1.9"/>
                                            <circle class="negabaritIco_st2" cx="61.8" cy="47.1" r="4.3"/>
                                        </g>
                                        <path class="negabaritIco_st2" d="M70,43.6"/>
                                    </g>
                                    <path class="negabaritIco_st3" d="M37.2,50.8"/>
                                </g>
                            </g>
</svg>

                    </div>
                    <div class="col-xs-3">
                        <svg version="1.1" id="strahovanieIco" class="addIcon"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px"
                             viewBox="0 0 90 90"
                             style="enable-background:new 0 0 90 90;"
                             xml:space="preserve">
<style type="text/css">
    .strahovanieIco_st0{fill:#58595B;}
    .strahovanieIco_st1{fill:none;stroke:#58595B;stroke-miterlimit:10;}
    .strahovanieIco_st2{fill:none;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
    .strahovanieIco_st3{fill:#FFFFFF;stroke:#58595B;stroke-width:0.7;stroke-linejoin:round;stroke-miterlimit:10;}
</style>

                            <g>
                                <path class="strahovanieIco_st0" d="M19.2,64.5c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.2-0.3-0.3-0.4s-0.3-0.2-0.4-0.2
		c-0.2-0.1-0.3-0.1-0.5-0.1c-0.3,0-0.6,0.1-0.8,0.2c-0.2,0.1-0.4,0.3-0.5,0.5c-0.1,0.2-0.2,0.4-0.3,0.7C16,65,16,65.3,16,65.6
		c0,0.3,0,0.5,0.1,0.8s0.2,0.5,0.3,0.7s0.3,0.4,0.5,0.5c0.2,0.1,0.5,0.2,0.8,0.2c0.2,0,0.4,0,0.6-0.1c0.2-0.1,0.3-0.2,0.4-0.3
		c0.1-0.1,0.2-0.3,0.3-0.5s0.1-0.4,0.1-0.6h1c0,0.3-0.1,0.7-0.2,0.9c-0.1,0.3-0.3,0.5-0.5,0.7s-0.5,0.4-0.8,0.5
		c-0.3,0.1-0.6,0.2-1,0.2c-0.4,0-0.8-0.1-1.1-0.2c-0.3-0.2-0.6-0.4-0.9-0.6c-0.2-0.3-0.4-0.6-0.5-1C15.1,66.4,15,66,15,65.6
		c0-0.4,0.1-0.8,0.2-1.2c0.1-0.4,0.3-0.7,0.5-1c0.2-0.3,0.5-0.5,0.9-0.6c0.3-0.2,0.7-0.2,1.1-0.2c0.3,0,0.6,0,0.9,0.1
		c0.3,0.1,0.5,0.2,0.7,0.4s0.4,0.4,0.5,0.6c0.1,0.2,0.2,0.5,0.2,0.8H19.2z"/>
                                <path class="strahovanieIco_st0" d="M20.5,62.7h4.6v0.9h-1.8v4.8h-1v-4.8h-1.8V62.7z"/>
                                <path class="strahovanieIco_st0" d="M25.8,62.7h2.5c0.4,0,0.7,0.1,1,0.2c0.3,0.1,0.5,0.3,0.6,0.4s0.2,0.4,0.3,0.6
		c0.1,0.2,0.1,0.4,0.1,0.6c0,0.2,0,0.4-0.1,0.6c-0.1,0.2-0.1,0.4-0.3,0.6s-0.3,0.3-0.6,0.4c-0.3,0.1-0.6,0.2-1,0.2h-1.5v2.2h-1
		V62.7z M26.8,65.4h1.5c0.1,0,0.2,0,0.3,0s0.2-0.1,0.3-0.2s0.2-0.2,0.2-0.3c0.1-0.1,0.1-0.3,0.1-0.5c0-0.2,0-0.3-0.1-0.5
		c-0.1-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.2-0.1-0.3-0.1c-0.1,0-0.2,0-0.4,0h-1.5V65.4z"/>
                                <path class="strahovanieIco_st0" d="M32.7,62.7h1.1l2.2,5.7h-1.1l-0.5-1.5h-2.3l-0.5,1.5h-1L32.7,62.7z M32.3,66.1h1.7l-0.9-2.5
		h0L32.3,66.1z"/>
                                <path class="strahovanieIco_st0" d="M36,62.7h1.2l1.3,2l1.4-2H41l-1.9,2.8l2,3h-1.2l-1.4-2.2L37,68.4h-1.1l2-3L36,62.7z"/>
                                <path class="strahovanieIco_st0" d="M44.1,62.6c0.4,0,0.8,0.1,1.1,0.2c0.3,0.2,0.6,0.4,0.9,0.6c0.2,0.3,0.4,0.6,0.5,1
		c0.1,0.4,0.2,0.7,0.2,1.2c0,0.4-0.1,0.8-0.2,1.2c-0.1,0.4-0.3,0.7-0.5,1c-0.2,0.3-0.5,0.5-0.9,0.6s-0.7,0.2-1.1,0.2
		s-0.8-0.1-1.1-0.2s-0.6-0.4-0.9-0.6c-0.2-0.3-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.2c0-0.4,0.1-0.8,0.2-1.2
		c0.1-0.4,0.3-0.7,0.5-1c0.2-0.3,0.5-0.5,0.9-0.6C43.3,62.6,43.7,62.6,44.1,62.6z M44.1,63.4c-0.3,0-0.6,0.1-0.8,0.2
		c-0.2,0.1-0.4,0.3-0.5,0.5c-0.1,0.2-0.2,0.4-0.3,0.7c-0.1,0.3-0.1,0.5-0.1,0.8c0,0.3,0,0.5,0.1,0.8c0.1,0.3,0.2,0.5,0.3,0.7
		s0.3,0.4,0.5,0.5c0.2,0.1,0.5,0.2,0.8,0.2c0.3,0,0.6-0.1,0.8-0.2c0.2-0.1,0.4-0.3,0.5-0.5s0.2-0.4,0.3-0.7s0.1-0.5,0.1-0.8
		c0-0.3,0-0.5-0.1-0.8c-0.1-0.3-0.2-0.5-0.3-0.7c-0.1-0.2-0.3-0.4-0.5-0.5C44.7,63.4,44.4,63.4,44.1,63.4z"/>
                                <path class="strahovanieIco_st0" d="M47.8,62.7h2.8c0.5,0,0.9,0.1,1.2,0.4c0.3,0.2,0.5,0.6,0.5,1.1c0,0.3-0.1,0.5-0.2,0.7
		c-0.1,0.2-0.3,0.4-0.6,0.5v0c0.4,0.1,0.6,0.2,0.8,0.5c0.2,0.3,0.3,0.6,0.3,1c0,0.2,0,0.4-0.1,0.6c-0.1,0.2-0.2,0.4-0.4,0.5
		c-0.2,0.1-0.4,0.3-0.7,0.3c-0.3,0.1-0.6,0.1-1,0.1h-2.6V62.7z M48.8,65.1h1.6c0.2,0,0.4-0.1,0.6-0.2c0.2-0.1,0.2-0.3,0.2-0.6
		c0-0.3-0.1-0.5-0.2-0.6c-0.1-0.1-0.4-0.2-0.6-0.2h-1.6V65.1z M48.8,67.6h1.8c0.3,0,0.5-0.1,0.7-0.2s0.3-0.4,0.3-0.7
		c0-0.3-0.1-0.5-0.3-0.7c-0.2-0.2-0.4-0.2-0.7-0.2h-1.8V67.6z"/>
                                <path id="XMLID_1802_" class="strahovanieIco_st0" d="M54.9,62.7H56l2.2,5.7h-1.1l-0.5-1.5h-2.3l-0.5,1.5h-1L54.9,62.7z M54.6,66.1h1.7l-0.9-2.5
		h0L54.6,66.1z"/>
                                <path class="strahovanieIco_st0" d="M58.7,62.7h1V65h2.6v-2.3h1v5.7h-1v-2.6h-2.6v2.6h-1V62.7z"/>
                                <path class="strahovanieIco_st0" d="M64.5,62.7h1V67l2.4-4.3h1.2v5.7h-1v-4.3l-2.5,4.3h-1.1V62.7z"/>
                                <path class="strahovanieIco_st0" d="M70.3,62.7h4.1v0.9h-3.1v1.5h2.9v0.8h-2.9v1.7h3.2v0.9h-4.2V62.7z"/>
                            </g>
                            <circle class="strahovanieIco_st1" cx="45" cy="45" r="40"/>
                            <g>
                                <g>
                                    <path class="strahovanieIco_st0" d="M36.3,40.7c-0.1,0-0.2,0-0.2,0c-6.7-2.3-6.9-8.6-7-13.7l0-0.8l0.8,0c0,0,0.7,0,1.3-0.4
			c0.6-0.4,0.9-1,1-1.8l0.1-0.5l0.5-0.1c2.2-0.4,4.7-0.4,7.3,0l0.5,0.1l0.1,0.5c0.1,0.8,0.4,1.4,1,1.8c0.6,0.4,1.3,0.4,1.3,0.4
			l0.8,0l0,0.8c-0.1,5.1-0.3,11.4-7,13.7C36.4,40.7,36.4,40.7,36.3,40.7C36.3,40.7,36.3,40.7,36.3,40.7z M30.5,27.6
			c0.2,5.5,0.9,9.8,5.8,11.6c5-1.8,5.6-6,5.8-11.6c-0.3-0.1-0.6-0.2-1-0.3c0,0-0.1,0-0.1,0l0,0l-0.1-0.1c0,0,0,0,0,0c0,0,0,0,0,0
			L40.6,27l0,0c-0.5-0.4-1.1-1-1.4-2.2c-2-0.3-4-0.3-5.8,0c-0.3,1.2-1,1.9-1.6,2.3C31.3,27.4,30.8,27.6,30.5,27.6z"/>
                                    <path class="strahovanieIco_st0" d="M36.3,25v13.8c0,0-4.5-1.4-5.1-6.8h10.1c0,0,0.4-2,0.3-4c0,0-2.5-0.8-2.8-2.7
			C38.9,25.2,37.5,24.9,36.3,25z"/>
                                </g>
                                <g>
                                    <path class="strahovanieIco_st2" d="M21.4,22.2h29.7c0.6,0,1.2,0.5,1.2,1.2v17.2c0,0.6-0.5,1.2-1.2,1.2H21.4
			c-0.6,0-1.2-0.5-1.2-1.2V23.4C20.3,22.7,20.8,22.2,21.4,22.2z"/>
                                    <line class="strahovanieIco_st2" x1="23.7" y1="41.7" x2="23.7" y2="43.8"/>
                                    <line class="strahovanieIco_st2" x1="51.1" y1="41.7" x2="51.1" y2="42.9"/>
                                    <polyline class="strahovanieIco_st2" points="27.7,43.8 21.5,43.8 21.5,45 26.2,45.8 			"/>
                                    <line class="strahovanieIco_st2" x1="33.2" y1="43.8" x2="38.5" y2="43.8"/>
                                    <line class="strahovanieIco_st2" x1="42.6" y1="42.9" x2="59" y2="42.9"/>
                                    <line class="strahovanieIco_st2" x1="34.7" y1="47.2" x2="36.9" y2="47.2"/>
                                    <line class="strahovanieIco_st2" x1="45.6" y1="47.2" x2="56.1" y2="47.2"/>
                                    <path class="strahovanieIco_st2" d="M53.9,42.9V28.5c0-0.6,0.5-1.2,1.2-1.2h10.1c0.4,0,0.8,0.3,1,0.7l4,8.3v6.5h-1.9v0.8h0.2"
                                    />
                                    <polyline class="strahovanieIco_st2" points="67,29.6 59.9,29.6 59.9,35.6 69.9,35.6 			"/>
                                    <line class="strahovanieIco_st2" x1="64.9" y1="29.7" x2="64.9" y2="35.6"/>
                                    <path class="strahovanieIco_st2" d="M68.5,43.6h0.6c0.6,0,1.2,0.5,1.2,1.2v0c0,0.6-0.5,1.2-1.2,1.2h-4.6"/>
                                    <g>
                                        <circle class="strahovanieIco_st2" cx="30.4" cy="47.1" r="1.9"/>
                                        <circle class="strahovanieIco_st2" cx="30.4" cy="47.1" r="4.3"/>
                                    </g>
                                    <g>
                                        <circle class="strahovanieIco_st2" cx="41.3" cy="47.1" r="1.9"/>
                                        <circle class="strahovanieIco_st2" cx="41.3" cy="47.1" r="4.3"/>
                                    </g>
                                    <g>
                                        <circle class="strahovanieIco_st2" cx="60.4" cy="47.1" r="1.9"/>
                                        <circle class="strahovanieIco_st2" cx="60.4" cy="47.1" r="4.3"/>
                                    </g>
                                    <path class="strahovanieIco_st2" d="M68.6,43.6"/>
                                </g>
                                <path class="strahovanieIco_st3" d="M35.8,50.8"/>
                            </g>

</svg>

                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
<!--                    --><?//= Html::img('/img/'.$sections['services']['list_items'][0]['image'],
//                        ['alt'=>$sections['services']['list_items'][0]['image_alt']]) ?>
                    <?= $sections['services']['list_items'][0]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][0]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['services']['list_items'][0]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['services']['list_items'][0]['text'] ?>
                </div>

            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][1]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][1]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['services']['list_items'][1]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['services']['list_items'][1]['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['services']['list_items'][2]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['services']['list_items'][2]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['services']['list_items'][2]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['services']['list_items'][2]['text'] ?>
                </div>
            </div>

        </div>
    </section>

<!-- услуги call2action -->
    <section class="<?= $sections['call2action']['stylekey'] ?> <?= $sections['call2action']['section_type'] ?>">
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
                <div class="col-sm-10 mt30">
                    <?php foreach ($sections['whyWe']['list_items'] as $listItem ) : ?>
                        <div class="row mt10">
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

            <div class="col-sm-3 text-center">
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

            <div class="col-sm-3 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWork']['list_items'][3] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWork']['list_items'][3] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWork']['list_items'][3] ['text'] ?>
                </div>

            </div>
<!--            <div class="col-sm-12 hidden-xs  text-center">-->
<!--                <div class="howWeWork_path">-->
<!--                    <svg version="1.1"-->
<!--                         id="arrow_long_ico"-->
<!--                         xmlns="http://www.w3.org/2000/svg"-->
<!--                         xmlns:xlink="http://www.w3.org/1999/xlink"-->
<!--                         x="0px" y="0px"-->
<!--                         viewBox="0 0 840 140"-->
<!--                         style="enable-background:new 0 0 840 140;"-->
<!--                         xml:space="preserve">-->
<!---->
<!--<path   d="M802.9,17c-13.8,0-25,11.2-25,25l12.5,21.6l0,0l10,17.3c-1.5,0.9-2.5,2.5-2.5,4.3-->
<!--	c0,0,0,0.1,0,0.1c-42.4,13.2-130.6,23.2-238.2,27.9c-0.4-0.7-1-1.3-1.8-1.7l10-17.3l0,0l12.5-21.6c0-13.8-11.2-25-25-25-->
<!--	s-25,11.2-25,25l12.5,21.6l0,0l10,17.3c-0.8,0.5-1.5,1.2-2,2.1c-40.9,1.7-84.5,2.5-129.3,2.5c-44.4,0-87.6-0.9-128.2-2.5-->
<!--	c-0.4-0.9-1.1-1.6-2-2.1l10-17.3l0,0L314,72.6c0-13.8-11.2-25-25-25s-25,11.2-25,25l12.5,21.6l0,0l10,17.3c-0.7,0.4-1.3,1-1.8,1.8-->
<!--	c-108-4.7-196.6-14.7-239.2-27.9c-0.1-1.7-1.1-3.2-2.5-4l10-17.3l0,0l12.5-21.6c0-13.8-11.2-25-25-25s-25,11.2-25,25l12.5,21.6l0,0-->
<!--	l10,17.3c-1.5,0.9-2.5,2.5-2.5,4.3c0,2.8,2.2,5,5,5c1,0,1.9-0.3,2.7-0.8c42.7,13.4,132.2,23.7,241.3,28.4c0.9,1.5,2.5,2.6,4.3,2.6-->
<!--	c1.7,0,3.3-0.9,4.2-2.2c40.7,1.6,84,2.5,128.5,2.5c44.9,0,88.5-0.9,129.6-2.6c0.9,1.4,2.4,2.3,4.2,2.3c1.9,0,3.5-1.1,4.4-2.6-->
<!--	c109.2-4.8,198.6-15.1,240.9-28.6c0.7,0.3,1.4,0.5,2.2,0.5c2.8,0,5-2.2,5-5c0-1.9-1-3.4-2.5-4.3l10-17.3l0,0L827.9,42-->
<!--	C827.9,28.2,816.7,17,802.9,17z M280.7,72.6c0-4.6,3.7-8.2,8.2-8.2c4.6,0,8.2,3.7,8.2,8.2c0,4.6-3.7,8.2-8.2,8.2-->
<!--	C284.4,80.9,280.7,77.2,280.7,72.6z M32.3,42.5c0-4.6,3.7-8.2,8.2-8.2c4.6,0,8.2,3.7,8.2,8.2s-3.7,8.2-8.2,8.2-->
<!--	C36,50.7,32.3,47,32.3,42.5z M547.1,72.6c0-4.6,3.7-8.2,8.2-8.2c4.6,0,8.2,3.7,8.2,8.2c0,4.6-3.7,8.2-8.2,8.2-->
<!--	C550.8,80.9,547.1,77.2,547.1,72.6z M802.9,50.2c-4.6,0-8.2-3.7-8.2-8.2c0-4.6,3.7-8.2,8.2-8.2c4.6,0,8.2,3.7,8.2,8.2-->
<!--	C811.1,46.5,807.4,50.2,802.9,50.2z"/>-->
<!--                    </svg>-->
<!--                </div>-->
<!---->
<!--            </div>-->
            <div class="col-sm-12 text-center mt50">
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



<!--  Цифры  -->
    <section id="numberSection"
             class="<?= $sections['numbers']['stylekey'] ?> <?= $sections['numbers']['section_type'] ?>"
             style=" background-image: url(/img/<?= $sections['numbers']['image'] ?>)">
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
    </section>

<!--  проекты  -->
    <section class="<?= $sections['projects']['stylekey'] ?> <?= $sections['projects']['section_type'] ?>">
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

    <section class="<?= $sections['reviews']['stylekey'] ?> <?= $sections['reviews']['section_type'] ?>">
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








