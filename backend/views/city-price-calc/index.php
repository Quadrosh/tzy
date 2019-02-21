<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\widgets\ActiveForm;

$importModel = new \common\models\ImportCsv();
/* @var $this yii\web\View */
/* @var $searchModel common\models\CityPriceCalcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'City Price Calcs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-price-calc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
         <div class="col-sm-4">
             <p>
                 <?= Html::a('Create City Price Calc', ['create'], ['class' => 'btn btn-success']) ?>
             </p>
        </div>
        <div class="col-sm-4">
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['/city-price-calc/import-csv'],
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <?= $form->field($importModel, 'file')
                ->fileInput(['style'=>'color:gainsboro;'])->label(false) ?>
            <?= Html::submitButton('import CSV', ['class' => 'btn btn-info btn-xs']) ?>
        </div>
        <div class="col-sm-4">

        </div>

        <?php ActiveForm::end() ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'city',
            'load_capacity',
            'description',
            'min_time',
             'price_city',
             'price_center',
             'price_hist_center',
             'price_outside',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
