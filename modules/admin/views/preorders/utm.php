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


<!--    <table class="table table-striped table-bordered" >-->
<!---->
<!--        <thead>-->
<!--            <tr>-->
<!--                <th>ID</th>-->
<!--                <th>Тип</th>-->
<!--                <th>Имя/Груз</th>-->
<!--                <th>Телефон</th>-->
<!--                <th>From Page</th>-->
<!--                <th>UTM Source</th>-->
<!--                <th>UTM Medium</th>-->
<!--                <th>UTM Campaign</th>-->
<!--                <th>UTM Term</th>-->
<!--                <th>UTM Content</th>-->
<!--                <th>Дата</th>-->
<!--                <th>Качество</th>-->
<!--                <th>коментарий</th>-->
<!--            </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php //foreach ($leads as $lead ) : ?>
<!--            <tr >-->
<!--                <td>--><?//= $lead['id'] ?><!--</td>-->
<!--                <td>--><?//= $lead['type'] ?><!--</td>-->
<!--                <td>--><?//= $lead['name'] ?><!--</td>-->
<!--                <td>--><?//= $lead['phone'] ?><!--</td>-->
<!--                <td>--><?//= $lead['from_page'] ?><!--</td>-->
<!--                <td>--><?//= $lead['utm_source'] ?><!--</td>-->
<!--                <td>--><?//= $lead['utm_medium'] ?><!--</td>-->
<!--                <td>--><?//= $lead['utm_campaign'] ?><!--</td>-->
<!--                <td>--><?//= $lead['utm_term'] ?><!--</td>-->
<!--                <td>--><?//= $lead['utm_content'] ?><!--</td>-->
<!--                <td>--><?//=
//                    \Yii::$app->formatter->asDatetime($lead['date'], 'HH:mm dd/MM/yy');
//                    ?><!--</td>-->
<!--                <td>--><?//= $lead['quality'] ?><!--</td>-->
<!--                <td>--><?//= $lead['comment'] ?><!--</td>-->
<!---->
<!--            </tr>-->
<!--        --><?php //endforeach; ?>
<!---->
<!---->
<!--        </tbody></table>-->

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
//            'manager',
//            [
//                'label' => 'Менеджер',
//                'attribute'=>'manager',
//                'value' => function($data)
//                {
//                    $theData = \app\models\Manager::find()->where(['id'=>$data['manager']])->one();
//                    return $theData['name'];
//                },
//            ],
//            'quality',
            [
                'label' => 'Статус',
                'attribute'=>'quality',
                'value' => function($data)
                {
                    $theData = \app\models\OrderStatus::find()->where(['id'=>$data['quality']])->one();
                    return $theData['name'];
                },
            ],

            // 'done',

//            ['class' => 'yii\grid\ActionColumn'],
//            [
//                'class' => \yii\grid\ActionColumn::className(),
//                'buttons' => [
//                    'delete'=>function($url,$model){
//                        return false;
//
//                    },
//                    'view'=>function($url,$model){
//                        return false;
//                    },
//                    'update'=>function($url,$model){
//
//                        if ($model['type']=='quickForm') {
//                            $newUrl = Yii::$app->getUrlManager()->createUrl(['/admin/feedback/set-quality','id'=>$model['id']]);
//                        } else {
//                            if ($model['from_page']=='call') {
//                                $newUrl = Yii::$app->getUrlManager()->createUrl(['/admin/preorders/update-call','id'=>$model['id']]);
//                            } else {
//                                $newUrl = Yii::$app->getUrlManager()->createUrl(['/admin/preorders/set-quality','id'=>$model['id']]);
//                            }
//                        }
//
//                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $newUrl,
//                            ['title' => Yii::t('yii', 'изменить'), 'data-pjax' => '0','data-method'=>'post']);
//                    },
//
//                ]
//            ],
        ],
    ]);?>

</div>
