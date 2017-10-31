<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки - статус';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <p>
        <?= Html::a('Звонок', ['/admin/preorders/create-call'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <?php $form = ActiveForm::begin([
            'id'=>'filterForm',
            'action' => ['/admin/preorders/lead-quality'],
            'method' => 'post',
        ]); $filterForm = new \app\models\FilterForm(); ?>

        <div class="col-sm-4  text-center">
            <?= $form->field($filterForm, 'manager')
                ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Manager::find()->orderBy('name')->all(), 'id','name'),[
                    'id'=>'filter-form-manager',
//                    'class'=>'selectpicker',
                    'value'=>isset($current['manager'])?$current['manager']:'',
                    'prompt'=>'Менеджер'
                ])
                ->label(false) ?>
        </div>
        <div class="col-sm-4  text-center">
            <?= $form->field($filterForm, 'status')
                ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\OrderStatus::find()->orderBy('name')->all(), 'id','name'),[
                    'id'=>'filter-form-status',
//                    'class'=>'selectpicker',
                    'value'=>isset($current['status'])?$current['status']:'',
                    'prompt'=>'Статус'
                ])
                ->label(false) ?>
        </div>
        <div class="col-sm-4 text-center">
            <?= Html::submitButton('<i class="glyphicon glyphicon-refresh" aria-hidden="true"></i>', ['class' => 'btn btn-default submit-btn ']) ?>
        </div>
        <?php ActiveForm::end(); ?>


    </div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute'=>'date',
                'value' => function($data)
                {
                    return \Yii::$app->formatter->asDatetime($data['date'], 'HH:mm dd/MM/yy');
                },
                'format'=> 'html',
            ],
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
//            'from_page',
            'name',
            'phone',
            'comment',
//            'manager',
            [
                'label' => 'Менеджер',
                'attribute'=>'manager',
                'value' => function($data)
                {
                    $theData = \app\models\Manager::find()->where(['id'=>$data['manager']])->one();
                    return $theData['name'];
                },
            ],
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

                        if ($model['type']=='quickForm') {
                            $newUrl = Yii::$app->getUrlManager()->createUrl(['/admin/feedback/set-quality','id'=>$model['id']]);
                        } else {
                            if ($model['from_page']=='call') {
                                $newUrl = Yii::$app->getUrlManager()->createUrl(['/admin/preorders/update-call','id'=>$model['id']]);
                            } else {
                                $newUrl = Yii::$app->getUrlManager()->createUrl(['/admin/preorders/set-quality','id'=>$model['id']]);
                            }
                        }

                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $newUrl,
                            ['title' => Yii::t('yii', 'изменить'), 'data-pjax' => '0','data-method'=>'post']);
                    },

                ]
            ],
        ],
    ]);?>



</div>
