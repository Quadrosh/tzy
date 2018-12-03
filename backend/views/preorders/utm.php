<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'UTM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'date',
                'value' => function($data)
                {
                    return \Yii::$app->formatter->asDatetime($data['date'], 'HH:mm dd/MM/yy');
                },
                'format'=> 'html',
            ],
            'id',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'buttons' => [
                    'delete'=>function($url,$model){
                        return false;

                    },
                    'view'=>function($url,$model){
                        return false;
                    },
                    'update'=>function($url,$model){

                        if (Yii::$app->user->can('Creator')) {
                            if ($model['type']=='quickForm') {
                                $newUrl = Yii::$app->getUrlManager()->createUrl(['/feedback/delete','id'=>$model['id']]);
                            } else {

                                $newUrl = Yii::$app->getUrlManager()->createUrl(['/preorders/delete','id'=>$model['id']]);

                            }
                            return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', $newUrl,
                                [
                                    'title' => Yii::t('yii', 'удалить'),
                                    'data-pjax' => '0','data-method'=>'post',
                                    'data-confirm'=> 'точно удалить?'
                                ]);
                        } else {
                            return false;
                        }

                    },

                ]
            ],
            'site',

//            'type',
            [
                'label' => 'Type',
                'attribute'=>'type',
                'value' => function($data)
                {
                    if ($data['from_page']=='call') {
                        return 'call';
                    } else {
                        return $data['type'];
                    }
                },
            ],
            'name',
            'phone',
            'from_page',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',

            'comment',

            [
                'label' => 'Статус',
                'attribute'=>'quality',
                'value' => function($data)
                {
                    $theData = \common\models\OrderStatus::find()->where(['id'=>$data['quality']])->one();
                    return $theData['name'];
                },
            ],

        ],
    ]);?>

</div>
