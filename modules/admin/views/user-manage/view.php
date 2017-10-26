<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
<!--    назначение роли -->
<div class="row mt20 bt pt20">
    <div class="col-xs-6 col-xs-offset-3 ">
        <h4>Роль</h4>
        <?php $form = yii\bootstrap\ActiveForm::begin([
            'method' => 'post',
            'action' => ['/article/update?id='.$model['id']],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{beginWrapper}\n{input}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'wrapper' => 'col-sm-12',
                    'error' => '',
                    'hint' => 'статус',
                ],
            ],
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>
        <?= $form->field($model, 'status',[
            'inputTemplate' => '<div class="input-group"><span class="lRound">{input}</span><span class="input-group-btn">'.
                '<button type="submit" class="btn rRound btn-primary">Назначить <i class="fa fa-share" aria-hidden="true"></i></button></span></div>',
        ])->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Roles::find()->where(['type'=>1])->orderBy('name')->all(), 'name','name')) ?>
        <?php yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
<!--   / назначение роли -->
