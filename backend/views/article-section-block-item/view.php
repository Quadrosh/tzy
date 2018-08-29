<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleSectionBlockItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Article Section Block Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-section-block-item-view">

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
            'article_section_block_id',
            'order_num',
            'header',
            'header_class',
            'description:ntext',
            'text:ntext',
            'comment:ntext',
            'image:ntext',
            'image_alt',
            'link_description',
            'link_name',
            'link_url:url',
            'link_class',
            'link_comment',
            'view',
            'color_key',
            'structure',
            'accent',
            'custom_class',
            'type',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
