<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;
use yii2mod\moderation\enums\Status;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \yii2mod\comments\models\search\CommentSearch */
/* @var $commentModel \yii2mod\comments\models\CommentModel */
$dataProvider->pagination = ['pageSize' => 100];
$dataProvider->sort = ['defaultOrder'=> ['id' => SORT_DESC]];

$this->title = Yii::t('yii2mod.comments', 'Comments Management');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php Pjax::begin(['timeout' => 10000]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'max-width: 50px;'],
            ],
            [
                'attribute' => 'content',
                'contentOptions' => ['style' => 'max-width: 350px;'],
                'value' => function ($model) {
                    return StringHelper::truncate($model->content, 100);
                },
            ],
            [
                'attribute' => 'createdBy',
                'label'=>'Автор',
                'value' => function ($model) {
                    if($model->author){
                        return $model->getAuthorName();
                    }
                },
                'filter' => $commentModel::getAuthors(),
                'filterInputOptions' => ['prompt' => Yii::t('yii2mod.comments', 'Select Author'), 'class' => 'form-control'],
            ],
            [
                'attribute' => 'relatedTo',
                'label'=>'Статья',
                'value' => function ($model) {
                   $string = $model->relatedTo;

                    if (strpos($string,'Article')) {
                        $article = \common\models\Article::findOne(substr($string,22));
                        return $article->site .' '.$article->list_name;
                    }
                },
                'filter' => false,
            ],
            [
                'attribute' => 'relatedTo',
                'label'=>'объект',
            ],


            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Status::getLabel($model->status);
                },
                'filter' => Status::listData(),
                'filterInputOptions' => ['prompt' => Yii::t('yii2mod.comments', 'Select Status'), 'class' => 'form-control'],
            ],
            [
                'attribute' => 'createdAt',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->createdAt, 'dd/MM/yy HH:mm');
                },
                'filter' => false,
            ],
            [
                'header' => 'Actions',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $title = Yii::t('yii2mod.comments', 'View');
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'target' => '_blank',
                        ];
                        $icon = Html::tag('span', '', ['class' => 'glyphicon glyphicon-eye-open']);
                        $url = $model->getViewUrl();

                        if (!empty($url)) {
                            $base = \yii\helpers\Url::base(true);
                            $frontUrl =  str_ireplace('cp.','',$base) . $url;
                            return Html::a($icon, $frontUrl, $options);
                        }

                        return null;
                    },
                ],
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
