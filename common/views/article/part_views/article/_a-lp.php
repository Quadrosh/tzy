<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use \yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;

$preorderForm = new \common\models\Preorders();

?>
    <div class="a-page_preorder_form">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2">
                <?= Alert::widget() ?>
                <?php if ($article->h1) : ?>
                    <h1 class="text-center"><?= Html::encode($article->h1) ?></h1>
                <?php endif; ?>

                <?php if ($article->exerpt) : ?>
                    <p><?= $article->exerpt ?></p>
                <?php endif; ?>
                <?php if ($article->exerpt_big) : ?>
                    <p><?= $article->exerpt_big ?></p>
                <?php endif; ?>

                <?php if ($article->raw_text) : ?>
                    <p><?= nl2br($article->raw_text)  ?></p>
                <?php endif; ?>
            </div>
        </div>


        <?php if ($article->sections) : ?>
            <?php foreach ($article->sections as $section) : ?>
                <?php if ($section->view) : ?>
                    <?= $this->render('/article/part_views/section/'.$section->view, [
                        'model' => $section,
                        'article' => $article,
                    ]) ?>
                <?php endif; ?>
                <?php if (!$section->view) : ?>
                    <?= $this->render('/article/part_views/section/_as-default', [
                        'model' => $section,
                        'article' => $article,
                    ]) ?>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php endif; ?>


        <div class="text-center mb20 mt100">
            <?= Html::a('Оформить заявку', '#orderForm',['class' => 'btn btn-primary order-btn mt10 mb20', 'data-toggle'=>'collapse']) ?>
        </div>

        <div class="feedback-form panel-collapse collapse col-md-10 col-md-offset-1  col-lg-8 col-lg-offset-2 " id="orderForm">
            <?php $form = ActiveForm::begin([
                'action' =>['site/order'],
                'id' => 'order-form',
                'method' => 'post',]); ?>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($preorderForm, 'dispatch')
                        ->textInput(['required' => true,'id' => 'preorder_form-dispatch'])->label('Откуда') ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($preorderForm, 'destination')
                        ->textInput(['required' => true,'id' => 'preorder_form-destination'])->label('Куда') ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($preorderForm, 'phone')
                        ->textInput(['required' => true,'id' => 'preorder_form-phone']) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($preorderForm, 'email')
                        ->textInput(['maxlength' => true,'id' => 'preorder_form-email']) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($preorderForm, 'cargo')
                        ->textInput(['required' => true,'id' => 'preorder_form-cargo'])->label('Характер груза')  ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($preorderForm, 'weight')
                        ->textInput(['maxlength' => true,'id' => 'preorder_form-weight'])->label('Вес')  ?>
                </div>
                <div class="col-sm-12">
                    <?= $form->field($preorderForm, 'text')
                        ->textarea(['rows' => 1,'id' => 'preorder_form-text'])->label('Комментарий') ?>
                </div>


                <?= $form->field($preorderForm, 'from_page')
                    ->hiddenInput(['value'=>$article->hrurl ,'id' => 'preorder_form-from_page'])->label(false) ?>

                <?= $form->field($preorderForm, 'utm_source')
                    ->hiddenInput([ 'id' => 'preorder_form-utm_source'])->label(false) ?>
                <?= $form->field($preorderForm, 'utm_medium')
                    ->hiddenInput([ 'id' => 'preorder_form-utm_medium'])->label(false) ?>
                <?= $form->field($preorderForm, 'utm_campaign')
                    ->hiddenInput([ 'id' => 'preorder_form-utm_campaign'])->label(false) ?>
                <?= $form->field($preorderForm, 'utm_term')
                    ->hiddenInput([ 'id' => 'preorder_form-utm_term'])->label(false) ?>
                <?= $form->field($preorderForm, 'utm_content')
                    ->hiddenInput([ 'id' => 'preorder_form-utm_content'])->label(false) ?>

                <div class="col-sm-6 col-sm-offset-3 text-center mt50 mb100">
                    <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-primary sendorder-btn mt10']) ?>
                </div>
            </div>
            <?php $form = ActiveForm::end(); ?>
        </div>
    </div>


<?php
if (substr( \yii\helpers\Url::base(''),0,5)!='//cp.') {
    echo \common\modules\comments\widgets\Comment::widget([
        'model' => $article,
    ]);
}
?>