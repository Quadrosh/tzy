<?php

use yii\helpers\Html;

?>


<section class="as-illustration fw <?= $model->color_key ?> <?= $model->custom_class ?>">
    <div class="row">
        <div class="col-sm-12 illustration_fw">
            <div class="alignFullImg">
                <?php if ($model->section_image) {
                    echo Html::img('/img/'.$model->section_image,[
                        'class'=> $model->image_class,
                        'alt'=>$model->section_image_alt,
                        'title'=>$model->section_image_title?$model->section_image_title:null,
                    ]);
                } ?>
            </div>



        </div>
    </div>


</section>






