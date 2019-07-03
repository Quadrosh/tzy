<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
        <?php echo $form->field($commentModel, 'name', ['template' => '{input}{error}'])
            ->textInput([
                'placeholder' => Yii::t('yii2mod.comments', 'Name...'),
                'value'=>!Yii::$app->user->isGuest?Yii::$app->user->identity->username:null
            ]); ?>
    </div>
    <div class="col-sm-6 comment_email_wrapper">
        <?php
        if (!Yii::$app->user->isGuest) {
            echo Html::a(Yii::t('yii2mod.comments', '<i class="glyphicon glyphicon-floppy-remove"></i>'), '/comment/default/logout', ['class'=>'logout_btn']);

        }  ?>
        <?php echo $form->field($commentModel, 'email', ['template' => '{input}{error}'])
            ->textInput([
                'placeholder' => Yii::t('yii2mod.comments', 'email...'),
                'value'=>!Yii::$app->user->isGuest?Yii::$app->user->identity->email:null
            ]); ?>
    </div>


    <div class="col-sm-12">
<!--        --><?//= \himiklab\yii2\recaptcha\ReCaptcha3::widget([
//            'name' => 'reCaptcha',
////            'siteKey' => 'your siteKey', // unnecessary is reCaptcha component was set up
//            'action' => 'comment',
////            'widgetOptions' => ['class' => 'col-sm-offset-3'],
//        ]) ?>


        <?= \himiklab\yii2\recaptcha\ReCaptcha2::widget([
            'name' => 'reCaptcha',
            'jsCallback' => 'enableSubmitByRecaptcha',
        ]) ?>


    </div>

    <div class="col-sm-12">
        <?php echo $form->field($commentModel, 'content', ['template' => '{input}{error}'])->textarea(['placeholder' => Yii::t('yii2mod.comments', 'Add a comment...'), 'rows' => 4, 'data' => ['comment' => 'content']]); ?>
        <?php echo $form->field($commentModel, 'parentId', ['template' => '{input}'])->hiddenInput(['data' => ['comment' => 'parent-id']]); ?>
        <div class="comment-box-partial">
            <div class="button-container show">
                <?php echo Html::a(Yii::t('yii2mod.comments', 'Click here to cancel reply.'), '#', ['id' => 'cancel-reply', 'class' => 'pull-right', 'data' => ['action' => 'cancel-reply']]); ?>
                <?php echo Html::submitButton(Yii::t('yii2mod.comments', 'Comment'), [
                        'class' => 'btn btn-primary comment-submit',
                        'id' => 'submitBlockedByRecaptcha',
//                        'disabled' => true,
                ]); ?>
            </div>
        </div>

    </div>

    <?php $form->end(); ?>
    <div class="clearfix"></div>
</div>
