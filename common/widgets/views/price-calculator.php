<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $price common\models\Price */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$price = new \common\models\PriceCalculator();

//if (!$toCityName) {
//    $toCityName = 'Санкт-Петербург';
//}

$city = \common\models\City::find()->where(['name'=>$toCityName])->one();
//$this->title = $name;

?>



<div class="price-calculator">

    <div class="box">



        <div class="price-form">

            <?php $form = ActiveForm::begin([
                'id'=>'priceCalculator',
                'action' => ['/article/calculator'],
//                'options' => ['data-pjax' => true ]

            ]); ?>
            <div class="row">

                <div class="col-sm-6">
                    <?= $form->field($price, 'from_city_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(
                            \common\models\City::find()->all(), 'id','name'))?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($price, 'to_city_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(
                            \common\models\City::find()->where(['name'=>$toCityName])->orWhere(['parent_id'=>$city->id])->all(), 'id','name'),['options'=>[$city->id =>['selected'=>true]]]) ?>
                </div>
                <div class="col-sm-4 ">
                    <?= $form->field($price, 'truck_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(
                            \common\models\Truck::find()->all(), 'id','name'))?>
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
