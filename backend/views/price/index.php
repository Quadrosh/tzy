<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\widgets\ActiveForm;

$importModel = new \common\models\ImportCsv();

/* @var $this yii\web\View */
/* @var $searchModel common\models\PriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-sm-4">
            <p>
                <?= Html::a('Create Price', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => ['/price/import-csv'],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>


        </div>
        <div class="col-sm-4">
            <?= $form->field($importModel, 'file')
                ->fileInput(['style'=>'color:gainsboro;'])->label(false) ?>
            <?= Html::submitButton('import CSV', ['class' => 'btn btn-info btn-xs']) ?>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
    <?php ActiveForm::end() ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
//            'from_city_id',
            [
                'attribute'=>'from_city_id',
                'value'=> function($data)
                {
                    return $data->fromCity->name;
                },
                'format'=> 'html',
            ],
//            'to_city_id',
            [
                'attribute'=>'to_city_id',
                'value'=> function($data)
                {
                    return $data->toCity->name;
                },
                'format'=> 'html',
            ],
//            'truck_id',
            [
                'attribute'=>'truck_id',
                'value'=> function($data)
                {
                    return $data->truck->name;
                },
                'format'=> 'html',
            ],
            'shipment_type',
             'distance',
             'price',
//             'created_at',
            [
                'attribute'=>'created_at',
                'value' => function($data)
                {
                    return \Yii::$app->formatter->asDatetime($data['created_at'], 'dd/MM/yy HH:mm');
                },
                'format'=> 'html',
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
