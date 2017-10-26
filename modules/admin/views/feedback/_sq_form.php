<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->hiddenInput(['maxlength' => true])->label(false) ?>

    <div class="row">
        <div class="col-sm-4">
            <h6>Телефон</h6>
            <p><?= $model['phone'] ?></p>
        </div>
        <div class="col-sm-4">
            <h6>Страница</h6>
            <p><?= $model['from_page'] ?></p>
        </div>
        <div class="col-sm-4">
            <h6>Дата</h6>
            <p><?= \Yii::$app->formatter->asDatetime($model['date'], 'dd/MM/yy HH:mm'); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p><?= $form->field($model, 'quality')->dropDownList([
                    '?'=>'непонятно',
                    'good'=>'Хорошо',
                    'bad'=>'Плохо'
                ]) ?>
            </p>
        </div>
        <div class="col-sm-6">
            <p><?= $form->field($model, 'comment')->textarea(['rows'=>3,'maxlength' => true]) ?></p>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
