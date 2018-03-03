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
        <div class="col-sm-6">
            <h6>Откуда</h6>
            <p><?= $model['dispatch'] ?></p>
        </div>
        <div class="col-sm-6">
            <h6>Куда</h6>
            <p><?= $model['destination'] ?></p>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-3">
            <h6>Телефон</h6>
            <p><?= $model['phone'] ?></p>
        </div>
        <div class="col-sm-3">
            <h6>Груз</h6>
            <p><?= $model['cargo'] ?></p>
        </div>
        <div class="col-sm-3">
            <h6>Вес</h6>
            <p><?= $model['weight'] ?></p>
        </div>
        <div class="col-sm-3">
            <h6>email</h6>
            <p><?= $model['email'] ?></p>
        </div>

        <div class="col-sm-12">
            <h6>Текст</h6>
            <p><?= $model['text'] ?></p>
        </div>
        <div class="col-sm-6">
            <h6>Страница</h6>
            <p><?= $model['from_page'] ?></p>
        </div>
        <div class="col-sm-6">
            <h6>Дата</h6>
            <p><?=  \Yii::$app->formatter->asDatetime($model['date'], 'dd/MM/yy HH:mm'); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p><?= $form->field($model, 'quality')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\OrderStatus::find()->orderBy('name')->all(), 'id','name'),[
                    'prompt'=>'',
                ]) ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p><?= $form->field($model, 'manager')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Manager::find()->orderBy('name')->all(), 'id','name'),[
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
