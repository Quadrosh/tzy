<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Preorders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="preorders-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <h6>Дата</h6>
            <p><?=  \Yii::$app->formatter->asDatetime($model['date'], 'dd/MM/yy HH:mm'); ?></p>
        </div>
        <div class="col-sm-6">
            <p><?= $form->field($model, 'dispatch')->textInput(['maxlength' => true]) ?></p>
        </div>
        <div class="col-sm-6">
            <p><?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?></p>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-3">
            <p><?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?></p>
        </div>
        <div class="col-sm-3">
            <p><?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?></p>
        </div>
        <div class="col-sm-3">
            <p><?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?></p>
        </div>
        <div class="col-sm-3">
            <p><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></p>
        </div>

<!--        <div class="col-sm-12">-->
<!--            <p>--><?//= $form->field($model, 'text')->textInput(['maxlength' => true]) ?><!--</p>-->
<!--        </div>-->
        <div class="col-sm-6">
            <p><?= $form->field($model, 'from_page')->hiddenInput(['value' => 'call'])->label(false) ?></p>
        </div>
        <div class="col-sm-6">
<!--            <h6>Дата</h6>-->
<!--            <p>--><?//=  \Yii::$app->formatter->asDatetime($model['date'], 'dd/MM/yy HH:mm'); ?><!--</p>-->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p><?= $form->field($model, 'quality')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\OrderStatus::find()->orderBy('name')->all(), 'id','name'),[
                    'prompt'=>'',
                ])->label('Статус') ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p><?= $form->field($model, 'manager')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Manager::find()->orderBy('name')->all(), 'id','name'),[
                    'prompt'=>'',
                ]) ?>
            </p>
        </div>
        <div class="col-sm-6">
            <p><?= $form->field($model, 'comment')->textarea(['rows'=>3,'maxlength' => true]) ?></p>
        </div>
    </div>

<!--    --><?//= $form->field($model, 'dispatch')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
<!---->
<!--    --><?//= $form->field($model, 'from_page')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'done')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
