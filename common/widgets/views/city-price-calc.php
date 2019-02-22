<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $price common\models\Price */
/* @var $toCityName string */
/* @var $fromCityName string */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$price = new \common\models\CityPriceCalc();

if (!$city) {
    $city ='Москва';
}
$allPrices = \common\models\CityPriceCalc::find()
    ->where(['city'=>$city])->all();
?>



<div class="city-price-calc">

    <div class="box ">

        <div class="price-form">

            <?php $form = ActiveForm::begin([
                'id'=>'cityPriceCalc',
                'action' => ['/article/city-price-calc'],
            ]); ?>
            <div class="row">

                <div class="col-sm-4 mt20">

                    <?= $form->field($price, 'id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map($allPrices , 'id','load_capacity'),[
                            'prompt'=>'Выберите грузоподъемность',
//                            'onchange'=>'var id = $(this).val(); alert(id)'
                        ])
                        ->label('Грузоподъемность') ?>

                </div>

                <div class="col-sm-4 mt30">

                    <div >
                        <?= $form->field($price, 'to_center')
                            ->checkbox(['label'=>'Въезд в пределы ТТК'])?>
                    </div>
                    <div >
                        <?= $form->field($price, 'to_hist_center')
                            ->checkbox(['label'=>'Въезд в пределы Бульварного кольца'])?>
                    </div>



                </div>
                <div class="col-sm-4 text-center">
                    <div class="submit">
                        <?= Html::submitButton( 'Рассчитать', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-sm-12 text-center mt20">
                    <p id="calcResult"></p>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>




</div>
