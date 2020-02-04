<?php
use yii\helpers\Html;
?>
<footer >
    <div class="container footer">
        <div class="row">
            <div class="col-xs-4">
                <p>
                    <?= Html::a('Вакансии', '/contacts') ?> <span style="display: inline-block;padding-bottom: .65em;vertical-align: middle;">⁎</span>
                    <?= Html::a('Контакты', '/contacts') ?>
                </p>
            </div>
            <div class="col-xs-4 text-center">
                <p>
                    &copy;Перевозки Фурой, <?= date('Y') ?>
                </p>
            </div>



        </div>

    </div><!-- /.footer -->
</footer>
