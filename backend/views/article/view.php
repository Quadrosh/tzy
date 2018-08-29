<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'list_name',
            'cat_ids:ntext',
            'hrurl:url',
            'title',
            'description:ntext',
            'keywords:ntext',
            'exerpt:ntext',
            'exerpt_big:ntext',
            'h1',
            'topimage',
            'topimage_alt',
            'background_image:ntext',
            'thumbnail_image:ntext',
            'call2action_description',
            'call2action_name',
            'call2action_link',
            'call2action_class',
            'call2action_comment',
            'imagelink',
            'imagelink_alt',
            'author',
            'status',
            'view',
            'layout',
            'created_at',
            'updated_at',
            'site',
        ],
    ]) ?>

</div>
