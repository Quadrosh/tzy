<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Imagefiles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Imagefiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="imagefiles-view">

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
            ],
        ]) ?>
        <?= Html::img('/img/'. $model->name, ['class'=>'img']) ?>


    </div>
</div>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-6">

                <h4>Image Change</h4>
                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'action' => ['/admin/imagefiles/change'],
                    'options' => ['enctype' => 'multipart/form-data'],
                ]); ?>

                <?= $form->field($uploadmodel, 'imageFile')->fileInput()->label(false) ?>
                <?= $form->field($uploadmodel, 'toModelId')->hiddenInput(['value'=>$model->id])->label(false) ?>


                <?= Html::submitButton('Change', ['class' => 'btn btn-danger']) ?>
                <?php ActiveForm::end() ?>

            </div>
        </div>
    </div>
</section>

