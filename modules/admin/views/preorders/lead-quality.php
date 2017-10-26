<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки - качество';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-striped table-bordered" >

        <thead>
            <tr>
                <th>ID</th>
                <th>Тип</th>
                <th>Имя/Груз</th>
                <th>Телефон</th>
                <th>From Page</th>
                <th>Дата</th>
                <th>Качество</th>
                <th>коментарий</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($leads as $lead ) : ?>
            <tr >
                <td><?= $lead['id'] ?></td>
                <td><?= $lead['type'] ?></td>
                <td><?= $lead['name'] ?></td>
                <td><?= $lead['phone'] ?></td>
                <td><?= $lead['from_page'] ?></td>
                <td><?=
                    \Yii::$app->formatter->asDatetime($lead['date'], 'HH:mm dd/MM/yy');
                    ?></td>
                <td><?= $lead['quality'] ?></td>
                <td><?= $lead['comment'] ?></td>
                <td><?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', $lead['type']=='quickForm'?'/admin/feedback/set-quality?id='.$lead['id']:'/admin/preorders/set-quality?id='.$lead['id']) ?></td>

            </tr>
        <?php endforeach; ?>


        </tbody></table>


</div>
