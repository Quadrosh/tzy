<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

//$this->title = 'Page View';
//$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="text-center"><?= $page->pagehead ?></h1>



<p><span style="font-size:14px;"><em>Ниже приведены ориентировочные цены за отдельную машину из Москвы до крупных городов РФ. Уточнить стоимость доставки по другим направлениям, а так же расчитать стоимость попутного груза(догруз) или с&nbsp;перегрузом&nbsp;можно у менеджера по телефону <strong>+7 (495) 150-05-83</strong>&nbsp;, заказав обратный звонок в шапке сайта или заполнив форму заявки.</em></span></p>


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

<p class="mt50" align="JUSTIFY">Компания &laquo;ТрансЗаказ&raquo; предоставляет услуги по перевозке всех видов грузов по территории России и стран СНГ как для юридических, так и физических лиц.</p>

<p align="JUSTIFY">Имея в распоряжении транспортные средства различного типа и грузоподъемности<wbr />, мы предоставим наиболее подходящий вид техники именно для Вашего груза.</p>

<p align="JUSTIFY">Залогом надежности грузоперевозок с компанией &laquo;ТрансЗаказ&raquo; является профессионализм наших сотрудников, отличное состояние автопарка, соблюдение всех стандартов и требований российского законодательства<wbr />, индивидуальный подход к клиентам.</p>

<p align="JUSTIFY">Доверяя перевозку груза специалистам компании &laquo;ТрансЗаказ&raquo;, вы можете быть уверены в качестве предоставляемых нами услуг.</p>

<p align="JUSTIFY">Уточнить стоимость доставки по другим направлениям, а так же расчитать стоимость попутного груза(догруз) можно у менеджера по телефону <strong>+7 (495) 150-05-83</strong></p>

<p align="JUSTIFY">Или заказав обратный звонок в шапке сайта.</p>

<p>&nbsp;</p>

<h2 style="text-align: justify;">Грузоперевозки по России и СНГ. Попутные грузоперевозки</h2>

<p style="text-align: justify;"><img alt="Попутные грузоперевозки" src="/img/gruz_po_Rossii.png" class="w360static" />В современных условиях, в связи с тем, что расширились границы предпринимательской деятельности, с ростом продаж, возросла и потребность в качественных услугах по реализации грузоперевозок по всей России, и по странам СНГ. Требования, предъявляемые к таким услугам, как грузоперевозки по России, грузоперевозки стройматериалов, грузоперевозки по СНГ, доставка металлопроката существенно возросли. Сегодня от фирмы-перевозчика требуют не просто экспресс - доставки грузов, а сохранность и предельную надежность, высокий уровень обслуживания, гибкую систему цен, возможность дополнительных услуг, начиная от погрузки и заканчивая страховкой грузов.</p>

<p style="text-align: justify;"><strong>Компания &laquo;ТрансЗаказ&raquo;</strong> предлагает воспользоваться услугами по транспортировке грузов, удовлетворяющие всем современным требованиям по цене и качеству. Наши сотрудники эффективно и оперативно осуществят все мероприятия для организации грузоперевозок по России и по странам СНГ. В независимости от того, надо ли вам перевезти бытовую технику из супермаркета или отправить в другой конец страны огромную партию товара, в нашей компании с большой ответственно подойдут к выполнению поставленной задачи и предложат оптимальные условия для сотрудничества.</p>

<p style="text-align: justify;">Особо мы уделяем внимание попутной перевозке грузов. Попутные перевозки - это разновидность транспортных перевозок, состоящие в загрузке транспортного средства, которое осуществляет холостой пробег. Довольно часто возникают ситуации, когда машина вынуждена двигаться без груза, именно в этом случае используются попутные перевозки. Как правило, такие перевозки гораздо ниже по стоимости.</p>

<p style="text-align: justify;"><strong>Преимущества работы с компанией ТрансЗаказ:</strong></p>

<p style="text-align: justify;">- Своим клиентам мы предлагаем авто доставку любой сложности, которая будет удовлетворять всем современным требованиям по качеству и стоимости.</p>

<p style="text-align: justify;">- Наше грузовое такси в сжатые сроки способно перевести любой товар. Уделяя большое внимание логистике, мы способны разработать наилучший маршрут следования, при этом вам не надо будет бояться того, что груз не прибудет в обозначенное время. Мы делаем все качественно и в срок!</p>

<p style="text-align: justify;">- Грузодоставка в нашей фирме осуществляется круглосуточно, поэтому вы легко можете оформить заявку на транспортировку в любое время, даже в праздники.</p>

<p style="text-align: justify;">- Выгодные условия и время отъезда автотранспорта, которые определяет сам клиент.</p>

<p style="text-align: justify;">- Перевозка груза начнется сразу же после вашего непосредственного обращения в компанию.</p>

<p style="text-align: justify;">- Мы осуществляем перевозку любых грузов: перевозка жби; грузоперевозки металла; перевозка кирпича; продукты питания, личные вещи, бытовую технику и т.д.</p>

<p style="text-align: justify;">- Менеджеры компании своевременно сделают вам предварительный расчет стоимости услуг, а также ответят на вопросы, которые касаются перевозки груза.</p>

<p style="text-align: justify;">- Специалисты фирмы занимаются решение всех вопросов, связанных с реализацией грузодоставки, начиная от оформления сопроводительных документов и заканчивая страхованием ценных грузов.</p>




<?//= $page->text ?>



