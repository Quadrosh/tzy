<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandingPage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Landing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-view">

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
            'name',
//            'hrurl:url',
//            Html::a($model['hrurl'], ['/t/'.$model['hrurl']]),
            [
                'attribute'=>'hrurl',
                'value'=> Html::a($model['hrurl'], ['/lp/'.$model['hrurl']]),
                'format'=> 'html',
            ],
            'seo_logo:ntext',
            'title',
            'description:ntext',
            'keywords:ntext',
            'view',
            'layout',
            'color',
        ],
    ]) ?>
<h2>Секции</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
<!--                <th>Page ID</th>-->
                <th>ID</th>
                <th>Order Num</th>
                <th>Section Type</th>
                <th>Head</th>
                <th>Lead</th>
                <th>Stylekey</th>

                <th class="action-column">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($sections as $section) : ?>
            <tr >
<!--                <td>--><?//= $section['page_id'] ?><!--</td>-->
                <td><?= $section['id'] ?></td>
                <td><?= $section['order_num'] ?></td>
                <td><?= $section['section_type'] ?></td>
                <td><?= $section['head'] ?></td>
                <td><?= $section['lead'] ?></td>
                <td><?= $section['stylekey'] ?></td>

                <td>
<!--                    <a href="/admin/landingsection/view?id=1" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>-->
                    <a href="/admin/landingsection/update?id=<?= $section['id'] ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
<!--                    <a href="/admin/landingsection/delete?id=1" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>-->
                </td>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>
    <?= Html::a('Создать секцию', ['/admin/landingsection/create', 'page_id' => $model->id], ['class' => 'btn btn-success']) ?>
</div>
