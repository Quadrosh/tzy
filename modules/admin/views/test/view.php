<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-view">

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
            'description:ntext',
            'publish',
            'start_date',
            'end_date',
        ],
    ]) ?>
<h2>Варианты</h2>
    <table class="table  table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Test ID</th>
            <th>Title</th>
            <th>Description</th>
            <th class="action-column">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($testPages as $testPage) : ?>
        <tr data-key="1">
            <td><?= $testPage['id'] ?></td>
            <td><?= $testPage['test_id'] ?></td>
            <td><?= $testPage['title'] ?></td>
            <td><?= $testPage['description'] ?></td>
            <td>
                <a href="/admin/testpage/view?id=<?= $testPage['id'] ?>">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="/admin/testpage/update?id=<?= $testPage['id'] ?>">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?= Html::a('Create Test Page', ['/admin/testpage/create', 'test_id'=>$model->id], ['class' => 'btn btn-success']) ?>

</div>
