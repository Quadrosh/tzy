<?php

/* @var $this yii\web\View */
/* @var $sections  \common\models\LandingSection */
/* @var $page  \common\models\LandingPage */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use \yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;


//$this->title = 'Page View';
//$this->params['breadcrumbs'][] = $this->title;

//$feedback = new common\models\Feedback();
$feedback = new \perevertish\models\Pereorder();

//$preorder = new common\models\Preorders();
?>

<?php

NavBar::begin([
    'brandLabel' => Html::img('/img/pere_logo3.png',['alt'=>'Радоуправляемая машинка перевертыш','class'=>'logo']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => ' navbar-static-top ',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => [

        [
            'label' => 'Технические характеристики',
            'url' => '#tech_section',
        ],
        [
            'label' => 'Видео',
            'url' =>  '#video_section',
        ],

        [
            'label' => 'Контакты',
            'url' => '#contacts_section',
        ],
        [
            'label' => '<span class="phone"> <span class="block">'.
                Yii::$app->params['mainPhone']. '</span><span class="block button btn btn-xs btn-link"> Заказать звонок</span>'. '</span>',
            'url' => '#',
            'options' => ['data-toggle' => 'modal', 'data-target' => '#callMeModal'],
        ],


    ],
]);
NavBar::end();

?>









<!-- modal -->
<div class="b-feedback modal fade" id="orderModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal"><span aria-hidden="true" class="b-icon b-icon__close glyphicon glyphicon-remove"></span><span class="sr-only"></span></button>
                <p class="modal-title">Оформить заказ</p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'fast_order_form',
                'method' => 'post',
                'action' => ['/site/feedback'],

            ]); ?>
            <div class="modal-body">


                <div class="form-group clearfix">

                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>

                    <div class="col-xs-12">
                        <?= $form->field($feedback, 'name')
                            ->textInput(['maxlength' => true, 'id' => 'fast_order_form-name']) ?>
                    </div>
                    <div class="col-xs-12 ">
                        <?= $form->field($feedback, 'phone')
                            ->textInput(['maxlength' => true, 'id' => 'fast_order_form-phone']) ?>
                    </div>
                    <div class="col-xs-12 ">
                        <?= $form->field($feedback, 'text')
                            ->textarea(['maxlength' => true, 'id' => 'fast_order_form-phone'])
                            ->label('Адрес доставки') ?>
                    </div>
                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>'perevertish.ru','id'=>'fast_order_form-from_page'])
                        ->label(false) ?>

                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput([ 'id' => 'fast_order_form-utm_source'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput([ 'id' => 'fast_order_form-utm_medium'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput([ 'id' => 'fast_order_form-utm_campaign'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput([ 'id' => 'fast_order_form-utm_term'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput([ 'id' => 'fast_order_form-utm_content'])->label(false) ?>
                </div>


            </div>
            <div class="modal-footer">

                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-sm']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<div class="b-feedback modal fade" id="callMeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal"><span aria-hidden="true" class="b-icon b-icon__close glyphicon glyphicon-remove"></span><span class="sr-only"></span></button>
                <p class="modal-title">Оформить заказ</p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'call_form',
                'method' => 'post',
                'action' => ['/site/feedback'],

            ]); ?>
            <div class="modal-body">
                                <p>Оставьте ваши контактные данные,<br/>
                                    и наш специалист свяжется с Вами в течение 30 минут.</p>



                <div class="form-group row clearfix">

                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>

                    <div class="col-xs-6">
                        <?= $form->field($feedback, 'name')
                            ->textInput(['maxlength' => true, 'id' => 'call_form-name']) ?>
                    </div>
                    <div class="col-xs-6 ">
                        <?= $form->field($feedback, 'phone')
                            ->textInput(['maxlength' => true, 'id' => 'call_form-phone']) ?>
                    </div>

                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>'perevertish.ru', 'id' => 'call_form-from_page'])
                        ->label(false) ?>

                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput([ 'id' => 'call_form-utm_source'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput([ 'id' => 'call_form-utm_medium'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput([ 'id' => 'call_form-utm_campaign'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput([ 'id' => 'call_form-utm_term'])->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput([ 'id' => 'call_form-utm_content'])->label(false) ?>
                </div>


            </div>
            <div class="modal-footer">

                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-sm']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!-- /.modal -->



<!-- content bellow navbar -->
<div >

    <!--   dark top-->
    <section class="<?= $sections['top']['stylekey'] ?> <?= $sections['top']['section_type'] ?> text-center" style=" background-image: url(/img/background4.jpg)">

        <div class="container">
            <div class="row">
                <h1 ><?= nl2br($sections['top']['head']) ?></h1>
                <p class="lead "><?= $sections['top']['lead'] ?></p>

                <div class="col-sm-6 col-sm-offset-3 ">
                    <?= common\widgets\Alert::widget() ?>
                </div>




                <div class="col-xs-12">
                    <p class="text"><?= nl2br($sections['top']['extra'])  ?></p>

                    <a href="#"
                       data-toggle="modal"
                       data-target="#orderModal"
                       class="btn btn-danger">Купить</a>

                    <p class="text"><?= nl2br($sections['top']['text']) ?></p>
                </div>

                <div class="text-center">
<!--                    --><?//= Html::img('/img/_match_top.png',['class'=>'center_image']) ?>
                    <?= Html::img('/img/'. $sections['top']['image'] ,[
                        'class'=>'center_image',
                        'alt'=>$sections['top']['image_alt']]) ?>
                </div>


            </div>
        </div>


    </section>

    <section class="<?= $sections['services']['stylekey'] ?> services text-center" >
        <div class="container">
            <div class="row">
                <h2 ><?= nl2br($sections['services']['head']) ?></h2>
                <p class="lead ">  <?= nl2br($sections['services']['lead'])  ?></p>
                <p class="text"><?= nl2br($sections['services']['text']) ?></p>
            </div>
        </div>
    </section>




    <section id="tech_section" class="<?= $sections['what_we_do']['stylekey'] ?> tech text-left" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pt20 pb70">
<?php $model = $sections['what_we_do']; ?>

                    <div class="carouselWrapper slickMulti"
                         data-id="<?= $model->id ?>" data-showItems="1">


                        <?php if ($model->listItems) : ?>
                            <div
                                class="asb-slick_1_item slick_multi_<?= $model->id ?>  text-center">
                                <?php foreach ($model->listItems as $item) : ?>
                                    <div class="carousel_item">

                                        <?php if ($item->image) : ?>
                                            <?= Html::img('/img/'.$item->image,[
                                                'class'=>'max-w100per','alt'=>$item->image_alt])  ?>
                                        <?php endif; ?>
                                        <?php if ($item->head) : ?>
                                            <p class="text-center"><?= $item->head ?></p>
                                        <?php endif; ?>
                                            <?php if ($item->discr) : ?>
                                                <p class="text-center"><?= $item->discr ?></p>
                                            <?php endif; ?>


                                            <?php if ($item->text) : ?>
                                                <p ><?= nl2br($item->text) ?></p>
                                            <?php endif; ?>
                                            <?php if ($item->extra) : ?>
                                                <p ><?= nl2br($item->extra) ?></p>
                                            <?php endif; ?>


                                    </div>
                                <?php endforeach; ?>
                            </div>


                        <?php endif; ?>
                    </div>



                </div>
                <div class="col-sm-6 ">
                    <p class="text "><?= nl2br($model['head']) ?></p>
                    <p class="text ">  <?= nl2br($model['lead'])  ?></p>
                    <p class="text"><?= $model['text'] ?></p>
                    <p  class="price"><?= nl2br($model['extra']) ?></p>
                    <p><span><a href="#"
                                data-toggle="modal"
                                data-target="#callMeModal"
                                class="btn btn-bordered"
                            >Получить консультацию</a></span><span class="ml20"><a href="#"
                                  data-toggle="modal"
                                  data-target="#orderModal"
                                  class="btn btn-danger"
                            >Купить</a></span></p>
                </div>

            </div>
        </div>
    </section>

<!--    секция после характеристик -->
    <section class="<?= $sections['call2action2']['stylekey'] ?> call2action2  text-center" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pt20">

 <?php $model = $sections['call2action2']; ?>

                </div>
                <div class="col-sm-12 ">
                    <h3 class="lead" ><?= nl2br($model['head']) ?></h3>
                    <p class="text mt50">  <?= nl2br($model['lead'])  ?></p>

                </div>

            </div>
        </div>
    </section>

    <section id="video_section" class="<?= $sections['reviews']['stylekey'] ?> reviews text-center" >
        <div class="container">
            <div class="row">
                <h2 ><?= nl2br($sections['reviews']['head']) ?></h2>
                <div class="col-sm-12">
<!--          embed video           -->
                    <?= $sections['reviews']['text'] ?>
                </div>
            </div>
        </div>
    </section>

    <section class="<?= $sections['why_we']['stylekey'] ?> why_we text-center" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pt20">
<?php $model = $sections['why_we']; ?>

                </div>
                <div class="col-sm-12 ">
                    <h3 class="lead" ><?= nl2br($model['head']) ?></h3>
                    <p class="text mt50">  <?= nl2br($model['lead'])  ?></p>
                    <!--                    <p class="text">--><?//= nl2br($sections['call2action2']['text']) ?><!--</p>-->
                    <!--                    <p  class="price">--><?//= nl2br($sections['call2action2']['extra']) ?><!--</p>-->


                    <div class="row">
                        <div class="col-sm-4 mt100">
                            <div class="item  text-center">
                                <?php $item = $model->listItems[1]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>
                            <div class="item text-center">
                                <?php $item = $model->listItems[2]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>
                            <div class="item text-center">
                                <?php $item = $model->listItems[3]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="item text-center">
                                <?php $item = $model->listItems[0]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>

                            <?= Html::img('/img/_match_bottom.png',[
                                'class'=>'icon max-w100per','alt'=>'изображение машинки - перевертыша на радиоуправлении'])  ?>

                        </div>
                        <div class="col-sm-4 mt100">
                            <div class="item text-center">
                                <?php $item = $model->listItems[4]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>
                            <div class="item text-center">
                                <?php $item = $model->listItems[5]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>
                            <div class="item text-center">
                                <?php $item = $model->listItems[6]?>
                                <?= Html::img('/img/'.$item->image,[
                                    'class'=>'icon max-w100per','alt'=>$item->image_alt])  ?>
                                <h4 >  <?= nl2br($item['head'])  ?></h4>
                                <p>  <?= nl2br($item['text'])  ?> </p>
                            </div>
                        </div>
                    </div>





                </div>

            </div>
        </div>
    </section>

    <section class="<?= $sections['call2action3']['stylekey'] ?> call2action3  text-center" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 pt20">

                    <?php $model = $sections['call2action3']; ?>

                </div>
                <div class="col-sm-12 ">
                    <h3 class="lead" ><?= nl2br($model['head']) ?></h3>
                    <p class="text mt50">  <?= nl2br($model['text'])  ?></p>
                </div>

            </div>
        </div>
    </section>

    <section id="contacts_section" class="<?= $sections['map']['stylekey'] ?> map  text-center" >
        <?php $model = $sections['map']; ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4 ">

                    <div class="contactBlock dark ">
                        <h2><?= nl2br($model['head'])  ?></h2>
                        <p><?= nl2br($model['text'])  ?></p>
                        <div class="col-xs-12 text-center">
                            <a href="#"
                               data-toggle="modal"
                               data-target="#orderModal"
                               class="btn btn-bordered">Оформить заказ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $model['extra']  ?>
    </section>

    <section class="bottomOrderForm dark" >
        <div class="container">
            <div class="row ">

                <div class="text-center">
                    <h3 class="modal-title">Форма оформления заказа</h3>
                </div>

                    <?php $form = ActiveForm::begin([
                        'id' => 'order_form',
                        'method' => 'post',
                        'action' => ['/site/feedback'],

                    ]); ?>

                        <!--                <p>Оставьте ваши контактные данные,<br/>-->
                        <!--                    и наш специалист свяжется с Вами в течение 30 минут.</p>-->

                        <!--                <div id="feedbackLoading">-->
                        <!--                    <span class="b-icon b-icon__loading"></span>-->
                        <!--                </div>-->
                        <!--                <div id="feedbackNote"></div>-->

                        <div class="form-group clearfix">

                            <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>


                            <div class="col-sm-6">
                                <?= $form->field($feedback, 'name')
                                    ->textInput(['maxlength' => true, 'id' => 'order_form-name']) ?>
                            </div>
                            <div class="col-sm-6 ">
                                <?= $form->field($feedback, 'phone')
                                    ->textInput(['maxlength' => true, 'id' => 'order_form-phone']) ?>
                            </div>
                            <div class="col-xs-12 ">
                                <?= $form->field($feedback, 'text')
                                    ->textarea([ 'id' => 'order_form-text'])
                                    ->label('Адрес доставки') ?>
                            </div>
                            <?= $form->field($feedback, 'from_page')
                                ->hiddenInput(['value'=>'perevertish.ru','id'=>'order_form-from_page'])
                                ->label(false) ?>

                            <?= $form->field($feedback, 'utm_source')
                                ->hiddenInput([ 'id' => 'order_form-utm_source'])->label(false) ?>
                            <?= $form->field($feedback, 'utm_medium')
                                ->hiddenInput([ 'id' => 'order_form-utm_medium'])->label(false) ?>
                            <?= $form->field($feedback, 'utm_campaign')
                                ->hiddenInput([ 'id' => 'order_form-utm_campaign'])->label(false) ?>
                            <?= $form->field($feedback, 'utm_term')
                                ->hiddenInput([ 'id' => 'order_form-utm_term'])->label(false) ?>
                            <?= $form->field($feedback, 'utm_content')
                                ->hiddenInput([ 'id' => 'order_form-utm_content'])->label(false) ?>
                        </div>



                    <div class="col-xs-12 text-center">

                        <?= Html::submitButton('Заказать', ['class' => 'btn btn-danger ']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>


            </div>
        </div>
    </section>

</div>


