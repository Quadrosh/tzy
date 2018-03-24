<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preorders';
$this->params['breadcrumbs'][] = $this->title;
$spamRemoveForm = new \common\models\SpamRemoveForm();
?>
<div class="preorders-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php if (Yii::$app->user->can('creatorPermission', [])) : ?>
    <div class="col-sm-12">
        <h4> Удаление спама </h4>
        <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['/preorders/remove-spam'],
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>
        <div class="col-xs-6 col-sm-4">
            <?= $form->field($spamRemoveForm, 'property')->dropDownList([
                'ip'=>'ip',
                'email'=>'email',
                'dispatch' => 'Откуда',
                'destination' => 'Куда',
                'cargo' => 'Груз',
                'name' => 'Имя',
                'phone' => 'Телефон',
                'weight' => 'Вес',
                'text' => 'Комментарий',
                'from_page' => 'From Page',
                'utm_source' => 'UTM Source',
                'utm_medium' => 'UTM Medium',
                'utm_campaign' => 'UTM Campaign',
                'utm_term' => 'UTM Term',
                'utm_content' => 'UTM Content',
            ])->label(false) ?>
            <?= $form->field($spamRemoveForm, 'modelName')->hiddenInput(['value'=>'preorder'])->label(false) ?>
        </div>
        <div class="col-xs-6 col-sm-4">
            <?= $form->field($spamRemoveForm, 'value')->textInput()->label(false) ?>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?= Html::submitButton('Remove', [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Уверен?',
                ],
            ]) ?>
        </div>
        <?php ActiveForm::end() ?>
    </div>

    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip',
            'site',
            'dispatch',
            'destination',
            'cargo',
            'name',
             'phone',
             'email:email',
             'weight',
             'text:ntext',
             'from_page',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
//             'date',
            [
                'attribute'=>'date',
                'value' => function($data)
                {
                    return \Yii::$app->formatter->asDatetime($data['date'], 'dd/MM/yy HH:mm');
                },
                'format'=> 'html',
            ],
            // 'done',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
