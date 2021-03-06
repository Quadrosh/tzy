<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $price common\models\Price */
/* @var $toCityName string */
/* @var $fromCityName string */
/* @var $selectFromCityName string */
/* @var $selectToCityName string */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$price = new \common\models\PriceCalculator();

if ($toCityName) {
    $city = \common\models\City::find()->where(['name'=>$toCityName])->one();
} elseif ($fromCityName) {
    $city = \common\models\City::find()->where(['name'=>$fromCityName])->one();
} else {
    $city =  \common\models\City::find()->where(['name'=>'Москва'])->one();
}

$from = [];
$to = [];

    if ($onlyExisted) {
        $existedPrices = \common\models\Price::find()->all();
        foreach ($existedPrices as $_price) {
            if (!in_array($_price->from_city_id,$from)) {
                $from[]=$_price->from_city_id;
            }
            if (!in_array($_price->to_city_id,$to)) {
                $to[]=$_price->to_city_id;
            }
        }
    }

?>



<div class="price-calculator">

    <div class="box">

        <div class="price-form">

            <?php $form = ActiveForm::begin([
                'id'=>'priceCalculator',
                'action' => ['/article/calculator'],
            ]); ?>
            <div class="row">

                <div class="col-sm-6">
                    <?php if ($fromCityName) : ?>
                        <?= $form->field($price, 'from_city_id')
                            ->dropDownList(\yii\helpers\ArrayHelper::map(
                                \common\models\City::find()
                                    ->where(['name'=>$fromCityName])
                                    ->all(), 'id','name'),[
                                'options'=>[$city->id =>['selected'=>true]]]) ?>
                    <?php endif; ?>
                    <?php if (!$fromCityName) : ?>

                        <?php
                        if (!$selectFromCityName) {
                            $selectedFromCityOption = []; // фура по умолчанию
                        } else {
                            $selectedFromCityModel = \common\models\City::findOne(['name'=>$selectFromCityName]);
                            $selectedFromCityOption = [$selectedFromCityModel->id=>['selected'=>true]];
                        }
                        if ($onlyExisted) {
                            $fromCities = \common\models\City::find()
                                ->where(['id'=>$from])->all();
                        } else {
                            $fromCities =  \common\models\City::find()->all();
                        }

                        echo $form->field($price, 'from_city_id')
                            ->dropDownList(\yii\helpers\ArrayHelper::map($fromCities , 'id','name'),[
                                'options'=>$selectedFromCityOption,
                            ]); ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <?php if ($toCityName) : ?>
                        <?= $form->field($price, 'to_city_id')
                            ->dropDownList(\yii\helpers\ArrayHelper::map(
                                \common\models\City::find()
                                    ->where(['name'=>$toCityName])
                                    ->all(), 'id','name'),[
                                'options'=>[$city->id =>['selected'=>true]]]) ?>
                    <?php endif; ?>

                    <?php if (!$toCityName) : ?>
                    <?php
                        if (!$selectToCityName) {
                            $selectedToCityOption = []; // фура по умолчанию
                        } else {
                            $selectedCityModel = \common\models\City::findOne(['name'=>$selectToCityName]);
                            $selectedToCityOption = [$selectedCityModel->id=>['selected'=>true]];
                        }

                        if ($onlyExisted) {
                            $toCities = \common\models\City::find()
                                ->where(['id'=>$to])->all();
                        } else {
                            $toCities =  \common\models\City::find()->all();
                        }

                        echo $form->field($price, 'to_city_id')
                            ->dropDownList(\yii\helpers\ArrayHelper::map($toCities , 'id','name'),[
                                'options'=>$selectedToCityOption,
                            ]); ?>

                    <?php endif; ?>

                </div>
                <div class="col-sm-4 ">
                    <?php
                    if (!$truckName) {
                        $selectedTruck = ['4'=>['selected'=>true]]; // фура по умолчанию
                    } else {
                        $truck = \common\models\Truck::findOne(['name'=>$truckName]);
                        $selectedTruck = [$truck->id=>['selected'=>true]];
                    }
                    ?>
                    <?= $form->field($price, 'truck_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(
                            \common\models\Truck::find()->all(), 'id','name'),['options'=>$selectedTruck])?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($price, 'shipment_type')
                        ->dropDownList([
                            'full' => 'полная машина',
                            'half' => 'половина машины',
                        ])?>
                </div>

                <div class="col-sm-4 text-center mt25">
                    <?= Html::submitButton( 'Рассчитать', ['class' => 'btn btn-primary']) ?>
                </div>

            </div>


            <div class="row">
                <div class="col-sm-12 text-center mt20">
                    <p id="calculatorResult"></p>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

    <sup>
        <?= \common\models\PriceCalculator::INFO_MESSAGE ?>
    </sup>


</div>
