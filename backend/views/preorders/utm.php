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
