<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $commentModel \yii2mod\comments\models\CommentModel */
/* @var $maxLevel null|integer comments max level */
/* @var $encryptedEntity string */
/* @var $pjaxContainerId string */
/* @var $formId string comment form id */
/* @var $commentDataProvider \yii\data\ArrayDataProvider */
/* @var $listViewConfig array */
/* @var $commentWrapperId string */
?>
<div class="comment-wrapper mt100" id="<?php echo $commentWrapperId; ?>">

    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 20000, 'id' => $pjaxContainerId]); ?>
    <div class="comments row">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <!--            --><?//= common\widgets\Alert::widget() ?>
            <div class="title-block clearfix">
                <h3 class="h3-body-title">
                    <?= Html::a(Yii::t('yii2mod.comments', 'Comments ({0})', $commentModel->getCommentsCount()), '#commentsList',[ 'class'=>'text-grey','data-toggle'=>'collapse']) ?>
                </h3>
                <div class="title-separator"></div>
            </div>
            <div class="panel-collapse collapse" id="commentsList">
                <?php echo ListView::widget(ArrayHelper::merge(
                    [
                        'dataProvider' => $commentDataProvider,
                        'layout' => "{items}\n{pager}",
                        'itemView' => '_list',
                        'viewParams' => [
                            'maxLevel' => $maxLevel,
                        ],
                        'options' => [
                            'tag' => 'ol',
                            'class' => 'comments-list',
                        ],
                        'itemOptions' => [
                            'tag' => false,
                        ],
                    ],
                    $listViewConfig
                )); ?>
                <?php echo $this->render('_form', [
                    'commentModel' => $commentModel,
                    'formId' => $formId,
                    'encryptedEntity' => $encryptedEntity,
                ]); ?>
            </div>

        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
