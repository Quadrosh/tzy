<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FrontUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Front Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Front User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'site',
            'username',
//            'subscribe_for_answers',
            [
                'attribute'=>'subscribe_for_answers',
                'value' => function($model)
                {
                    if ($model['subscribe_for_answers'] === 1) {
                       return 'да';
                    } else if ($model['subscribe_for_answers']===0) {
                        return 'нет';
                    }

                },
                'format'=> 'html',
            ],
            'email:email',
            'email_status',
//            'auth_key',
//            'password_hash',
            // 'password_reset_token',

            // 'phone',
            // 'city',
            // 'country',
            // 'address',
            // 'status',
            // 'created_at',
            // 'updated_at',

//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => \yii\grid\ActionColumn::class,
                'buttons' => [
                    'update'=>function($url,$item){
                      return false;
                    },
                    'delete'=>function($url,$item){
                        return false;

//                        $_url = Yii::$app->getUrlManager()->createUrl([
//                            '/front-user/delete',
//                            'id'=>$item['id'],
//                        ]);
//                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', $_url,
//                            [
//                                'title' => 'Удалить',
//                                'data-method' => 'post',
//                                'data-confirm'=>'точно удалить пользователя со всеми комментариями и ответами других пользователей на его комментарии?',
//                            ]);
                    },

                ]
            ],
        ],
    ]); ?>
</div>
