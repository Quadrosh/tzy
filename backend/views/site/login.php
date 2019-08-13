<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
//        'layout' => 'horizontal',
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
        ]); ?>


        <div class="col-sm-8 col-sm-offset-2">
            <div class="col-sm-6">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div class="col-sm-12 text-center">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <div class="col-sm-10 text-right">
            <?= Html::a('Забыл пароль','/site/request-password-reset', ['class' => 'btn btn-link']) ?>
        </div>



    </div>











    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
