<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $formModel common\models\SignupAdminForm */

$this->title = 'Регистрация пользователя '.$model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

   <p>Спасибо за регистрацию. <br>
       Тепрь Вы можете войти, используя указанные при регистрации данные.</p>
    <?= Html::a('Войти','/site/login',['class'=>'btn btn-lg btn-primary']) ?>

</div>
