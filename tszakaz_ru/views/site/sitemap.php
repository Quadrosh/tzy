<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$feedbackForm = new \common\models\Feedback();
$preorderForm = new \common\models\Preorders();

//$this->title = 'Карта сайта';
//$this->params['breadcrumbs'][] = $this->title;
$breadcrumbs = new \common\models\Breadcrumbs();
$this->params['breadcrumbs'] = $breadcrumbs->construct($page->cat_ids);
$category = \common\models\Menu::find()->where(['id'=>json_decode($page->cat_ids)])->one();

//var_dump($category); die;
$sitemap = new \common\models\Sitemap();

?>

    <h1 class="text-center"><?= $page->pagehead ?></h1>

<div class="sitemap col-sm-offset-3 col-sm-9">




    <?= common\widgets\MenuNestedSetsWidget::widget([
        'treeId'=>$category->tree,
        'formfactor'=>'categoryPage',
        'currentItem'=> $category->id,
        'rootName'=> Yii::$app->params['site'],

    ]) ; ?>



<!--    --><?//= common\widgets\MenuWidget::widget([
//        'site'=>Yii::$app->params['site'],
//        'formfactor'=>'ul',
//        'currentItem'=> Yii::$app->view->params['currentItem']
//    ]); ?>


</div>


