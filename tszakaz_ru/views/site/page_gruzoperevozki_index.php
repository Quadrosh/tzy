<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;

$feedbackForm = new \common\models\Feedback();
$preorderForm = new \common\models\Preorders();

$breadcrumbs = new \common\models\Breadcrumbs();
$this->params['breadcrumbs'] = $breadcrumbs->construct($page->cat_ids);


$pages = $category->children()->all();


?>
<?= Alert::widget() ?>
    <h1 class="text-center"><?= $page->pagehead ?></h1>

<div class="col-sm-offset-2 mt20">

<!--    <ul >-->
<!--        --><?php //foreach ($pages as $catPage) : ?>
<!--            <li>--><?//= Html::a($catPage->name,$catPage->url) ?><!--</li>-->
<!--        --><?php //endforeach; ?>
<!--    </ul>-->

    <?= common\widgets\MenuNestedSetsWidget::widget([
        'treeId'=>$category->tree,
        'formfactor'=>'categoryPage',
        'currentItem'=> $category->id,
        'tail'=> true,
    ]) ; ?>
</div>



