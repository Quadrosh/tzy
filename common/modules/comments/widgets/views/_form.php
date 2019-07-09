<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

// Register BS3 tooltip/popover via JS
$js = <<<SCRIPT
$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});
$(function () { 
    $("[data-toggle='popover']").popover(); 
});
SCRIPT;
$this->registerJs($js);


/* @var $this \yii\web\View */
/* @var $commentModel \yii2mod\comments\models\CommentModel */
/* @var $encryptedEntity string */
/* @var $formId string comment form id */
?>
<div class="comment-form-container">


    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => $formId,
            'class' => 'comment-box',
        ],
        'action' => Url::to(['/comment/default/create', 'entity' => $encryptedEntity]),
        'validateOnChange' => false,
        'validateOnBlur' => false,
    ]); ?>

    <div class="col-sm-6">
        <?php echo $form->field($commentModel, 'name', ['template' => '{label}{input}{error}'])
            ->textInput([
                'placeholder' => Yii::t('yii2mod.comments', 'Name...'),
                'value'=>!Yii::$app->user->isGuest?Yii::$app->user->identity->username:null
            ])->label('Имя'); ?>
    </div>
    <div class="col-sm-6 comment_email_wrapper">


        <?php
        if (!Yii::$app->user->isGuest) {
            echo Html::a(Yii::t('yii2mod.comments', '<i class="glyphicon glyphicon-floppy-remove"></i>'), '/comment/default/logout', [
                    'class'=>'logout_btn',
                'title'=>'Удалить сохраненный e-mail',
                'data-toggle'=>'tooltip',
            ]);

        }  ?>
        <?php echo $form->field($commentModel, 'email', ['template' => '{label}{input}{error}'])
            ->textInput([
                'placeholder' => Yii::t('yii2mod.comments', 'email...'),
                'value'=>!Yii::$app->user->isGuest?Yii::$app->user->identity->email:null
            ])->label('e-mail <span class="noBold">(не будет опубликован)<span>'); ?>
    </div>


    <div class="col-sm-12">






    </div>

    <div class="col-sm-12">
        <?php echo $form->field($commentModel, 'content', ['template' => '{input}{error}'])->textarea(['placeholder' => Yii::t('yii2mod.comments', 'Add a comment...'), 'rows' => 4, 'data' => ['comment' => 'content']]); ?>
        <?php echo $form->field($commentModel, 'parentId', ['template' => '{input}'])->hiddenInput(['data' => ['comment' => 'parent-id']]); ?>
        <div class="comment-box-partial">
            <div class="button-container show">
                <?php echo Html::a(Yii::t('yii2mod.comments', 'Click here to cancel reply.'), '#', ['id' => 'cancel-reply', 'class' => 'pull-right', 'data' => ['action' => 'cancel-reply']]); ?>

<!--                        --><?//= \himiklab\yii2\recaptcha\ReCaptcha3::widget([
//                            'name' => 'reCaptcha',
//                //            'siteKey' => 'your siteKey', // unnecessary is reCaptcha component was set up
//                            'action' => 'comment',
//                //            'widgetOptions' => ['class' => 'col-sm-offset-3'],
//                        ]) ?>


<!--                --><?//= \himiklab\yii2\recaptcha\ReCaptcha2::widget([
//                    'name' => 'reCaptcha',
//                    'jsCallback' => 'enableSubmitByRecaptcha',
//                ]) ?>

                <?php echo Html::submitButton(Yii::t('yii2mod.comments', 'Comment'), [
                        'class' => 'btn btn-primary comment-submit',
//                        'id' => 'submitBlockedByRecaptcha',
//                        'disabled' => true,
                ]); ?>
            </div>
        </div>

    </div>

    <?php $form->end(); ?>
    <div class="clearfix"></div>
</div>
