<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Price */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <?= $form->field($model, 'price')->textInput() ?>
            </div>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'from_city_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(
                    \common\models\City::find()->all(), 'id','name'),['prompt' => 'Откуда'])?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'to_city_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(
                    \common\models\City::find()->all(), 'id','name'),['prompt' => 'Куда'])?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'truck_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(
                    \common\models\Truck::find()->all(), 'id','name'),['prompt' => 'Выбери кузов'])?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'shipment_type')
                ->dropDownList([
                    'full' => 'полная машина',
                    'half' => 'половина машины',
                ],[
                    'prompt' => 'Выбери тип загрузки',
                    'options'=>['full'=>["Selected"=>true]]
                ])?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'distance')->textInput() ?>
        </div>

    </div>








    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
