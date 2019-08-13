<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $formModel common\models\SignupAdminForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'username')
                ->textInput(['value'=>'','maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'password')
                ->passwordInput() ?>
        </div>
    </div>






    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
