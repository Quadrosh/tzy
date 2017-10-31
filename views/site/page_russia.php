<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\widgets\Alert;

?>
<?= Alert::widget() ?>
    <h1 class="text-center"><?= $page->pagehead ?></h1>


<p><span style="font-size:14px;"><em>В таблице приведены ориентировочные цены за отдельную машину из Москвы до крупных городов РФ. Уточнить стоимость доставки по другим направлениям, а так же расчитать стоимость попутного груза(догруз) или с&nbsp;перегрузом&nbsp;можно у менеджера по телефону <strong>+7 (495) 150-05-83</strong>&nbsp;, заказав обратный звонок в шапке сайта или заполнив форму:</em></span></p>

<!-- order form -->
<div class="text-center">
    <?= Html::a('Оформить заявку', '#orderForm',['class' => 'btn btn-primary order-btn mt10 mb20', 'data-toggle'=>'collapse']) ?>
</div>

<div class="feedback-form panel-collapse collapse" id="orderForm">
    <?php $form = ActiveForm::begin([
        'action' =>['site/order'],
        'id' => 'order-form',
        'method' => 'post',]); ?>
    <!--    --><?php //$form = ActiveForm::begin(['action' =>['site/ordercaptcha'], 'method' => 'post',]); ?>
    <div class="row">
        <div class="col-sm-6"><?= $form->field($preorderForm, 'dispatch')->textInput(['required' => true])->label('Откуда') ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'destination')->textInput(['required' => true])->label('Куда') ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'phone')->textInput(['required' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'email')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'cargo')->textInput(['required' => true])->label('Характер груза')  ?></div>
        <div class="col-sm-6"><?= $form->field($preorderForm, 'weight')->textInput(['maxlength' => true])->label('Вес')  ?></div>
        <div class="col-sm-12"> <?= $form->field($preorderForm, 'text')->textarea(['rows' => 1])->label('Комментарий') ?></div>
        <!--        captcha -->
        <!--        <div class="col-sm-12"> --><?//= $form->field($preorderForm, 'captcha')->widget(Captcha::className()) ?><!--</div>-->

        <?= $form->field($preorderForm, 'from_page')->hiddenInput(['value'=>$page->hrurl])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_source')
            ->hiddenInput([ 'id' => 'preorder_form-utm_source'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_medium')
            ->hiddenInput([ 'id' => 'preorder_form-utm_medium'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_campaign')
            ->hiddenInput([ 'id' => 'preorder_form-utm_campaign'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_term')
            ->hiddenInput([ 'id' => 'preorder_form-utm_term'])->label(false) ?>
        <?= $form->field($preorderForm, 'utm_content')
            ->hiddenInput([ 'id' => 'preorder_form-utm_content'])->label(false) ?>
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-primary sendorder-btn mt30 mb50']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::end(); ?>
</div>
<!-- / order form -->

<table class="russia_prices table-striped" border="1" cellpadding="2" cellspacing="0" >
    <tbody>
    <tr class="top_bigtable">
        <td align="center"  width="13%">
            <p >Направление</p>
        </td>
        <td align="center" width="12%">
            <p >1,5 тонны <br>Газель</p>
        </td>
        <td align="center"  width="12%">
            <p >3 тонны <br>Бычок</p>
        </td>
        <td align="center"  width="12%">
            <p >5 тонн</p>
        </td>
        <td align="center" width="12%">
            <p >10 тонн</p>
        </td>
        <td align="center"  width="12%">
            <p >20 тонн<br><span>тент/борт</span></p>
        </td>
        <td align="center" width="12%"  >
            <p >20 тонн<br>изотермический</p>
        </td>
        <td align="center" width="12%" >
            <p >20 тонн<br>рефрижератор</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Абакан</p>
        </td>
        <td align="center" >
            <p >99000</p>
        </td>
        <td align="center" >
            <p >114000</p>
        </td>
        <td align="center" >
            <p >119000</p>
        </td>
        <td align="center" >
            <p >159000</p>
        </td>
        <td align="center" >
            <p >195000</p>
        </td>
        <td align="center" >
            <p >197000</p>
        </td>
        <td align="center"  >
            <p >201000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Архангельск</p>
        </td>
        <td align="center">
            <p >24000</p>
        </td>
        <td align="center">
            <p >29000</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center">
            <p >48000</p>
        </td>
        <td align="center">
            <p >59000</p>
        </td>
        <td align="center">
            <p >61000</p>
        </td>
        <td align="center" >
            <p >65000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Астрахань</p>
        </td>
        <td align="center" >
            <p >28000</p>
        </td>
        <td align="center" >
            <p >32000</p>
        </td>
        <td align="center" >
            <p >37000</p>
        </td>
        <td align="center" >
            <p >49000</p>
        </td>
        <td align="center" >
            <p >60000</p>
        </td>
        <td align="center" >
            <p >62000</p>
        </td>
        <td align="center"  >
            <p >66000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Барнаул</p>
        </td>
        <td align="center">
            <p >72000</p>
        </td>
        <td align="center">
            <p >78000</p>
        </td>
        <td align="center">
            <p >85000</p>
        </td>
        <td align="center">
            <p >120000</p>
        </td>
        <td align="center">
            <p >145000</p>
        </td>
        <td align="center">
            <p >147000</p>
        </td>
        <td align="center" >
            <p >151000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Белгород</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >18000</p>
        </td>
        <td align="center" >
            <p >20000</p>
        </td>
        <td align="center" >
            <p >23000</p>
        </td>
        <td align="center" >
            <p >25000</p>
        </td>
        <td align="center" >
            <p >27000</p>
        </td>
        <td align="center"  >
            <p >31000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Брянск</p>
        </td>
        <td align="center">
            <p >7000</p>
        </td>
        <td align="center">
            <p >9000</p>
        </td>
        <td align="center">
            <p >11000</p>
        </td>
        <td align="center">
            <p >13000</p>
        </td>
        <td align="center">
            <p >18000</p>
        </td>
        <td align="center">
            <p >20000</p>
        </td>
        <td align="center" >
            <p >24000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Владимир</p>
        </td>
        <td align="center" >
            <p >8000</p>
        </td>
        <td align="center" >
            <p >12000</p>
        </td>
        <td align="center" >
            <p >13000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >18000</p>
        </td>
        <td align="center" >
            <p >20000</p>
        </td>
        <td align="center"  >
            <p >24000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >В.Новгород</p>
        </td>
        <td align="center">
            <p >15000</p>
        </td>
        <td align="center">
            <p >17000</p>
        </td>
        <td align="center">
            <p >19000</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >27000</p>
        </td>
        <td align="center">
            <p >29000</p>
        </td>
        <td align="center" >
            <p >32000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Волгоград</p>
        </td>
        <td align="center" >
            <p >24000</p>
        </td>
        <td align="center" >
            <p >27000 </p>
        </td>
        <td align="center" >
            <p >30000</p>
        </td>
        <td align="center" >
            <p >40000</p>
        </td>
        <td align="center" >
            <p >47000</p>
        </td>
        <td align="center" >
            <p >49000</p>
        </td>
        <td align="center"  >
            <p >53000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Вологда</p>
        </td>
        <td align="center">
            <p >12000</p>
        </td>
        <td align="center">
            <p >14000</p>
        </td>
        <td align="center">
            <p >16000</p>
        </td>
        <td align="center">
            <p >20000</p>
        </td>
        <td align="center">
            <p >23000</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center" >
            <p >29000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Воронеж</p>
        </td>
        <td align="center" >
            <p >15000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >23000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center" >
            <p >28000</p>
        </td>
        <td align="center"  >
            <p >32000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Екатеринбург</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >48000</p>
        </td>
        <td align="center">
            <p >53000</p>
        </td>
        <td align="center">
            <p >70000</p>
        </td>
        <td align="center">
            <p >85000</p>
        </td>
        <td align="center">
            <p >90000</p>
        </td>
        <td align="center" >
            <p >94000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Иваново</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >18000</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >22000</p>
        </td>
        <td align="center" >
            <p >23000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center"  >
            <p >28000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Ижевск</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >34000</p>
        </td>
        <td align="center">
            <p >37000</p>
        </td>
        <td align="center">
            <p >50000</p>
        </td>
        <td align="center">
            <p >59000</p>
        </td>
        <td align="center">
            <p >62000</p>
        </td>
        <td align="center" >
            <p >64000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Иркутск</p>
        </td>
        <td align="center" >
            <p >115000</p>
        </td>
        <td align="center" >
            <p >130000</p>
        </td>
        <td align="center" >
            <p >135000</p>
        </td>
        <td align="center" >
            <p >140000</p>
        </td>
        <td align="center" >
            <p >230000</p>
        </td>
        <td align="center" >
            <p >240000</p>
        </td>
        <td align="center"  >
            <p >245000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Йошкар-Ола</p>
        </td>
        <td align="center">
            <p >22000</p>
        </td>
        <td align="center">
            <p >28000</p>
        </td>
        <td align="center">
            <p >30000</p>
        </td>
        <td align="center">
            <p >32000</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >45000</p>
        </td>
        <td align="center" >
            <p >49000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Казань</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >21000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center" >
            <p >36000</p>
        </td>
        <td align="center" >
            <p >47000</p>
        </td>
        <td align="center" >
            <p >50000</p>
        </td>
        <td align="center"  >
            <p >52000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Калининград</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >45000</p>
        </td>
        <td align="center">
            <p >75000</p>
        </td>
        <td align="center">
            <p >80000</p>
        </td>
        <td align="center">
            <p >89000</p>
        </td>
        <td align="center">
            <p >90000</p>
        </td>
        <td align="center" >
            <p >94000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Калуга</p>
        </td>
        <td align="center" >
            <p >10000</p>
        </td>
        <td align="center" >
            <p >12000</p>
        </td>
        <td align="center" >
            <p >14000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >22000</p>
        </td>
        <td align="center"  >
            <p >24000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Кемерово</p>
        </td>
        <td align="center">
            <p >70000</p>
        </td>
        <td align="center">
            <p >80000</p>
        </td>
        <td align="center">
            <p >90000</p>
        </td>
        <td align="center">
            <p >120000</p>
        </td>
        <td align="center">
            <p >150000</p>
        </td>
        <td align="center">
            <p >155000</p>
        </td>
        <td align="center" >
            <p >165000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Киров</p>
        </td>
        <td align="center" >
            <p >30000</p>
        </td>
        <td align="center" >
            <p >35000</p>
        </td>
        <td align="center" >
            <p >44000</p>
        </td>
        <td align="center" >
            <p >50000</p>
        </td>
        <td align="center" >
            <p >60000</p>
        </td>
        <td align="center" >
            <p >62000</p>
        </td>
        <td align="center"  >
            <p >67000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Кострома</p>
        </td>
        <td align="center">
            <p >13000</p>
        </td>
        <td align="center">
            <p >16000</p>
        </td>
        <td align="center">
            <p >17000</p>
        </td>
        <td align="center">
            <p >20000</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >28000</p>
        </td>
        <td align="center" >
            <p >31000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Краснодар</p>
        </td>
        <td align="center" >
            <p >35000</p>
        </td>
        <td align="center" >
            <p >42000</p>
        </td>
        <td align="center" >
            <p >49000</p>
        </td>
        <td align="center" >
            <p >56000</p>
        </td>
        <td align="center" >
            <p >63000</p>
        </td>
        <td align="center" >
            <p >66000</p>
        </td>
        <td align="center"  >
            <p >68000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Красноярск</p>
        </td>
        <td align="center">
            <p >98000</p>
        </td>
        <td align="center">
            <p >110000</p>
        </td>
        <td align="center">
            <p >125000</p>
        </td>
        <td align="center">
            <p >160000</p>
        </td>
        <td align="center">
            <p >180000</p>
        </td>
        <td align="center">
            <p >185000</p>
        </td>
        <td align="center" >
            <p >190000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Курган</p>
        </td>
        <td align="center" >
            <p >44000</p>
        </td>
        <td align="center" >
            <p >49000</p>
        </td>
        <td align="center" >
            <p >56000</p>
        </td>
        <td align="center" >
            <p >109000</p>
        </td>
        <td align="center" >
            <p >110000</p>
        </td>
        <td align="center" >
            <p >114000</p>
        </td>
        <td align="center"  >
            <p >119000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Курск</p>
        </td>
        <td align="center">
            <p >14000</p>
        </td>
        <td align="center">
            <p >16000</p>
        </td>
        <td align="center">
            <p >19000</p>
        </td>
        <td align="center">
            <p >22000</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >27000</p>
        </td>
        <td align="center" >
            <p >30000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Липецк</p>
        </td>
        <td align="center" >
            <p >15000</p>
        </td>
        <td align="center" >
            <p >17000</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >21000</p>
        </td>
        <td align="center" >
            <p >24000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center"  >
            <p >29000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Майкоп</p>
        </td>
        <td align="center">
            <p >28000</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center">
            <p >39000</p>
        </td>
        <td align="center">
            <p >48000</p>
        </td>
        <td align="center">
            <p >53000</p>
        </td>
        <td align="center">
            <p >55000</p>
        </td>
        <td align="center" >
            <p >58000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Мурманск</p>
        </td>
        <td align="center" >
            <p >36000</p>
        </td>
        <td align="center" >
            <p >42000</p>
        </td>
        <td align="center" >
            <p >47000</p>
        </td>
        <td align="center" >
            <p >73000</p>
        </td>
        <td align="center" >
            <p >87000</p>
        </td>
        <td align="center" >
            <p >91000</p>
        </td>
        <td align="center"  >
            <p >96000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Муром</p>
        </td>
        <td align="center">
            <p >13000</p>
        </td>
        <td align="center">
            <p >16000</p>
        </td>
        <td align="center">
            <p >17000</p>
        </td>
        <td align="center">
            <p >19000</p>
        </td>
        <td align="center">
            <p >22000</p>
        </td>
        <td align="center">
            <p >24000</p>
        </td>
        <td align="center" >
            <p >27000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Наб.Челны</p>
        </td>
        <td align="center" >
            <p >34000</p>
        </td>
        <td align="center" >
            <p >39000</p>
        </td>
        <td align="center" >
            <p >43000</p>
        </td>
        <td align="center" >
            <p >56000</p>
        </td>
        <td align="center" >
            <p >60000</p>
        </td>
        <td align="center" >
            <p >65000</p>
        </td>
        <td align="center"  >
            <p >70000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Нижнекамск</p>
        </td>
        <td align="center">
            <p >32000</p>
        </td>
        <td align="center">
            <p >37000</p>
        </td>
        <td align="center">
            <p >44000</p>
        </td>
        <td align="center">
            <p >50000</p>
        </td>
        <td align="center">
            <p >57000</p>
        </td>
        <td align="center">
            <p >61000</p>
        </td>
        <td align="center" >
            <p >66000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Новокузнецк</p>
        </td>
        <td align="center" >
            <p >74000</p>
        </td>
        <td align="center" >
            <p >79000</p>
        </td>
        <td align="center" >
            <p >84000</p>
        </td>
        <td align="center" >
            <p >114000</p>
        </td>
        <td align="center" >
            <p >154000</p>
        </td>
        <td align="center" >
            <p >159000 </p>
        </td>
        <td align="center"  >
            <p >164000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Новороссийск</p>
        </td>
        <td align="center">
            <p >28000</p>
        </td>
        <td align="center">
            <p >33000</p>
        </td>
        <td align="center">
            <p >36000</p>
        </td>
        <td align="center">
            <p >44000</p>
        </td>
        <td align="center">
            <p >54000</p>
        </td>
        <td align="center">
            <p >57000</p>
        </td>
        <td align="center" >
            <p >59000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Новосибирск</p>
        </td>
        <td align="center" >
            <p >80000</p>
        </td>
        <td align="center" >
            <p >98000</p>
        </td>
        <td align="center" >
            <p >104000</p>
        </td>
        <td align="center" >
            <p >140000</p>
        </td>
        <td align="center" >
            <p >175000</p>
        </td>
        <td align="center" >
            <p >180000</p>
        </td>
        <td align="center"  >
            <p >189000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Н.Новгород</p>
        </td>
        <td align="center">
            <p >12000</p>
        </td>
        <td align="center">
            <p >14000</p>
        </td>
        <td align="center">
            <p >15000</p>
        </td>
        <td align="center">
            <p >21000</p>
        </td>
        <td align="center">
            <p >24000</p>
        </td>
        <td align="center">
            <p >27000</p>
        </td>
        <td align="center" >
            <p >29000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Омск</p>
        </td>
        <td align="center" >
            <p >72000</p>
        </td>
        <td align="center" >
            <p >79000</p>
        </td>
        <td align="center" >
            <p >84000</p>
        </td>
        <td align="center" >
            <p >104000</p>
        </td>
        <td align="center" >
            <p >131000</p>
        </td>
        <td align="center" >
            <p >137000</p>
        </td>
        <td align="center"  >
            <p >140000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Орел</p>
        </td>
        <td align="center">
            <p >12000</p>
        </td>
        <td align="center">
            <p >15000</p>
        </td>
        <td align="center">
            <p >17000</p>
        </td>
        <td align="center">
            <p >119000</p>
        </td>
        <td align="center">
            <p >22000</p>
        </td>
        <td align="center">
            <p >23000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Оренбург</p>
        </td>
        <td align="center" >
            <p >38000</p>
        </td>
        <td align="center" >
            <p >43000</p>
        </td>
        <td align="center" >
            <p >48000</p>
        </td>
        <td align="center" >
            <p >64000</p>
        </td>
        <td align="center" >
            <p >72000</p>
        </td>
        <td align="center" >
            <p >77000</p>
        </td>
        <td align="center"  >
            <p >83000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Орск</p>
        </td>
        <td align="center">
            <p >48000</p>
        </td>
        <td align="center">
            <p >53000</p>
        </td>
        <td align="center">
            <p >61000</p>
        </td>
        <td align="center">
            <p >74000</p>
        </td>
        <td align="center">
            <p >80000</p>
        </td>
        <td align="center">
            <p >88000</p>
        </td>
        <td align="center" >
            <p >94000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Пенза</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >23000</p>
        </td>
        <td align="center" >
            <p >29000</p>
        </td>
        <td align="center" >
            <p >35000</p>
        </td>
        <td align="center" >
            <p >40000</p>
        </td>
        <td align="center" >
            <p >41000</p>
        </td>
        <td align="center"  >
            <p >45000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Пермь</p>
        </td>
        <td align="center">
            <p >39000</p>
        </td>
        <td align="center">
            <p >43000</p>
        </td>
        <td align="center">
            <p >50000</p>
        </td>
        <td align="center">
            <p >57000</p>
        </td>
        <td align="center">
            <p >74000</p>
        </td>
        <td align="center">
            <p >78000</p>
        </td>
        <td align="center" >
            <p >86000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Петрозаводск</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center" >
            <p >30000</p>
        </td>
        <td align="center" >
            <p >35000</p>
        </td>
        <td align="center" >
            <p >39000</p>
        </td>
        <td align="center" >
            <p >45000</p>
        </td>
        <td align="center" >
            <p >50000</p>
        </td>
        <td align="center"  >
            <p >55000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Псков</p>
        </td>
        <td align="center">
            <p >21000</p>
        </td>
        <td align="center">
            <p >23000</p>
        </td>
        <td align="center">
            <p >24000</p>
        </td>
        <td align="center">
            <p >28000</p>
        </td>
        <td align="center">
            <p >32000</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center" >
            <p >37000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Пятигорск</p>
        </td>
        <td align="center" >
            <p >36000</p>
        </td>
        <td align="center" >
            <p >41000</p>
        </td>
        <td align="center" >
            <p >46000</p>
        </td>
        <td align="center" >
            <p >55000</p>
        </td>
        <td align="center" >
            <p >67000</p>
        </td>
        <td align="center" >
            <p >70000</p>
        </td>
        <td align="center"  >
            <p >72000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Ростов на Дону</p>
        </td>
        <td align="center">
            <p >26000</p>
        </td>
        <td align="center">
            <p >29000</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >55000</p>
        </td>
        <td align="center">
            <p >57000</p>
        </td>
        <td align="center" >
            <p >59000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Рязань</p>
        </td>
        <td align="center" >
            <p >11000</p >
        </td>
        <td align="center" >
            <p >12000</p>
        </td>
        <td align="center" >
            <p >14000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >20000</p>
        </td>
        <td align="center"  >
            <p >21000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Самара</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >30000</p>
        </td>
        <td align="center">
            <p >34000</p>
        </td>
        <td align="center">
            <p >45000</p>
        </td>
        <td align="center">
            <p >53000</p>
        </td>
        <td align="center">
            <p >56000</p>
        </td>
        <td align="center" >
            <p >58000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Саранск</p>
        </td>
        <td align="center" >
            <p >24000</p>
        </td>
        <td align="center" >
            <p >27000</p>
        </td>
        <td align="center" >
            <p >29000</p>
        </td>
        <td align="center" >
            <p >34000</p>
        </td>
        <td align="center" >
            <p >38000</p>
        </td>
        <td align="center" >
            <p >41000</p>
        </td>
        <td align="center"  >
            <p >44000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Саратов</p>
        </td>
        <td align="center">
            <p >23000</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >31000</p>
        </td>
        <td align="center">
            <p >44000</p>
        </td>
        <td align="center">
            <p >50000</p>
        </td>
        <td align="center">
            <p >54000</p>
        </td>
        <td align="center" >
            <p >57000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >С.Петербург</p>
        </td>
        <td align="center" >
            <p >14000</p>
        </td>
        <td align="center" >
            <p >18000</p>
        </td>
        <td align="center" >
            <p >20000</p>
        </td>
        <td align="center" >
            <p >25000</p>
        </td>
        <td align="center" >
            <p >28000</p>
        </td>
        <td align="center" >
            <p >30000</p>
        </td>
        <td align="center"  >
            <p >32000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Симферополь</p>
        </td>
        <td align="center" >
            <p >45000</p>
        </td>
        <td align="center" >
            <p >55000</p>
        </td>
        <td align="center" >
            <p >85000</p>
        </td>
        <td align="center" >
            <p >105000</p>
        </td>
        <td align="center" >
            <p >150000</p>
        </td>
        <td align="center" >
            <p >152000</p>
        </td>
        <td align="center"  >
            <p >155000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Смоленск</p>
        </td>
        <td align="center">
            <p >12000</p>
        </td>
        <td align="center">
            <p >14000</p>
        </td>
        <td align="center">
            <p >16000</p>
        </td>
        <td align="center">
            <p >19000</p>
        </td>
        <td align="center">
            <p >21000</p>
        </td>
        <td align="center">
            <p >23000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Сочи</p>
        </td>
        <td align="center" >
            <p >35000</p>
        </td>
        <td align="center" >
            <p >43000</p>
        </td>
        <td align="center" >
            <p >62000</p>
        </td>
        <td align="center" >
            <p >71000</p>
        </td>
        <td align="center" >
            <p >100000</p>
        </td>
        <td align="center" >
            <p >104000</p>
        </td>
        <td align="center"  >
            <p >107000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Ставрополь</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >44000</p>
        </td>
        <td align="center">
            <p >52000</p>
        </td>
        <td align="center">
            <p >62000</p>
        </td>
        <td align="center">
            <p >66000</p>
        </td>
        <td align="center" >
            <p >71000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Сыктывкар</p>
        </td>
        <td align="center" >
            <p >30000</p>
        </td>
        <td align="center" >
            <p >36000</p>
        </td>
        <td align="center" >
            <p >41000</p>
        </td>
        <td align="center" >
            <p >55000</p>
        </td>
        <td align="center" >
            <p >64000</p>
        </td>
        <td align="center" >
            <p >66000</p>
        </td>
        <td align="center"  >
            <p >70000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Тамбов</p>
        </td>
        <td align="center">
            <p >13000</p>
        </td>
        <td align="center">
            <p >15000</p>
        </td>
        <td align="center">
            <p >18000</p>
        </td>
        <td align="center">
            <p >20000</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >27000</p>
        </td>
        <td align="center" >
            <p >28000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Тверь</p>
        </td>
        <td align="center" >
            <p >9000</p>
        </td>
        <td align="center" >
            <p >11000</p>
        </td>
        <td align="center" >
            <p >12000</p>
        </td>
        <td align="center" >
            <p >14000</p>
        </td>
        <td align="center" >
            <p >15000</p>
        </td>
        <td align="center" >
            <p >17000</p>
        </td>
        <td align="center"  >
            <p >18000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Томск</p>
        </td>
        <td align="center">
            <p >73000</p>
        </td>
        <td align="center">
            <p >79000</p>
        </td>
        <td align="center">
            <p >84000</p>
        </td>
        <td align="center">
            <p >120000</p>
        </td>
        <td align="center">
            <p >150000</p>
        </td>
        <td align="center">
            <p >155000</p>
        </td>
        <td align="center" >
            <p >165000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Тула</p>
        </td>
        <td align="center" >
            <p >8000</p>
        </td>
        <td align="center" >
            <p >10000</p>
        </td>
        <td align="center" >
            <p >12000</p>
        </td>
        <td align="center" >
            <p >14000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >18000</p>
        </td>
        <td align="center"  >
            <p >20000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Тюмень</p>
        </td>
        <td align="center">
            <p >44000</p>
        </td>
        <td align="center">
            <p >50000</p>
        </td>
        <td align="center">
            <p >58000</p>
        </td>
        <td align="center">
            <p >79000</p>
        </td>
        <td align="center">
            <p >100000</p>
        </td>
        <td align="center">
            <p >105000</p>
        </td>
        <td align="center" >
            <p >110000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Ульяновск</p>
        </td>
        <td align="center" >
            <p >19000</p>
        </td>
        <td align="center" >
            <p >21000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center" >
            <p >41000</p>
        </td>
        <td align="center" >
            <p >47000</p>
        </td>
        <td align="center" >
            <p >51000</p>
        </td>
        <td align="center"  >
            <p >55000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Уфа</p>
        </td>
        <td align="center">
            <p >27000</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >50000</p>
        </td>
        <td align="center">
            <p >70000</p>
        </td>
        <td align="center">
            <p >75000</p>
        </td>
        <td align="center" >
            <p >79000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Ханты-Мансийск</p>
        </td>
        <td align="center" >
            <p >58000</p>
        </td>
        <td align="center" >
            <p >68000</p>
        </td>
        <td align="center" >
            <p >75000</p>
        </td>
        <td align="center" >
            <p >100000</p>
        </td>
        <td align="center" >
            <p >130000</p>
        </td>
        <td align="center" >
            <p >135000</p>
        </td>
        <td align="center"  >
            <p >140000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Чебоксары</p>
        </td>
        <td align="center">
            <p >25000</p>
        </td>
        <td align="center">
            <p >30000</p>
        </td>
        <td align="center">
            <p >33000</p>
        </td>
        <td align="center">
            <p >35000</p>
        </td>
        <td align="center">
            <p >40000</p>
        </td>
        <td align="center">
            <p >42000</p>
        </td>
        <td align="center" >
            <p >45000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  >
            <p >Череповец</p>
        </td>
        <td align="center" >
            <p >14000</p>
        </td>
        <td align="center" >
            <p >16000</p>
        </td>
        <td align="center" >
            <p >18000</p>
        </td>
        <td align="center" >
            <p >20000</p>
        </td>
        <td align="center" >
            <p >26000</p>
        </td>
        <td align="center" >
            <p >28000</p>
        </td>
        <td align="center"  >
            <p >31000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td height="1">
            <p >Энгельс</p>
        </td>
        <td align="center">
            <p >20000</p>
        </td>
        <td align="center">
            <p >23000</p>
        </td>
        <td align="center">
            <p >26000</p>
        </td>
        <td align="center">
            <p >41000</p>
        </td>
        <td align="center">
            <p >45000</p>
        </td>
        <td align="center">
            <p >47000</p>
        </td>
        <td align="center" >
            <p >50000</p>
        </td>
    </tr>
    <tr valign="TOP">
        <td  height=""  " width="120">
        <p >Ярославль</p>
        </td>
        <td align="center" >
            <p >10000</p>
        </td>
        <td align="center" >
            <p >11000</p>
        </td>
        <td align="center" >
            <p >13000</p>
        </td>
        <td align="center" >
            <p >17000</p>
        </td>
        <td align="center" >
            <p >20000</p>
        </td>
        <td align="center" >
            <p >22000</p>
        </td>
        <td align="center"  >
            <p >25000</p>
        </td>
    </tr>
    </tbody>
</table>

<p align="JUSTIFY">&nbsp;</p>

<p align="JUSTIFY">Компания &laquo;ТрансЗаказ&raquo; предоставляет услуги по перевозке всех видов грузов по территории России и стран СНГ как для юридических, так и физических лиц.</p>

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




<!--            --><?//= $page->text ?>

