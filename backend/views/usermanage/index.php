<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-sm-6">
            <p>
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="col-xs-6 ">
            <h4>Приглос</h4>
            <?php
            $invite = new \common\models\InviteForm();
             $form = yii\bootstrap\ActiveForm::begin([
                'method' => 'post',
                'action' => ['/usermanage/invite'],
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
            <div class="col-sm-6">
                <?= $form->field($invite, 'email')->textInput(['placeholder'=>'email'])->label('email') ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($invite, 'role',[
                    'inputTemplate' => '<div class="input-group"><span class="lRound">{input}</span><span class="input-group-btn">'.
                        '<button type="submit" class="btn rRound btn-primary">Send </button></span></div>',
                ])->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Roles::find()->where(['type'=>1])->andWhere(['!=','name','Creator'])->orderBy('name')->all(), 'name','name')) ?>
            </div>
            <?php yii\bootstrap\ActiveForm::end() ?>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'role',
            [
                'attribute'=>'role',
                'value' => function($data)
                {
                    $theData = common\models\RolesAssignment::find()->where(['user_id'=>$data['id']])->one();
                    return $theData['item_name'];
                },
            ],

             'email:email',
            [
                'attribute'=>'status',
                'value'=> function($data){
                    if ($data->status == \common\models\User::STATUS_INVITED) {
                        return 'invited';
                    } else if ($data->status == \common\models\User::STATUS_ACTIVE) {
                        return 'active';
                    }  else if ($data->status == \common\models\User::STATUS_DELETED) {
                        return 'deleted';
                    }

                }
            ],


            [
                'attribute'=>'updated_at',
                'value'=> function($data){
                    return  \Yii::$app->formatter->asDatetime($data->updated_at, "php:d-m-Y H:i:s");
                }
            ],

            [
                'attribute'=>'created_at',
                'value'=> function($data){
                    return  \Yii::$app->formatter->asDatetime($data->created_at, "php:d-m-Y H:i:s");
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
