<?php

namespace perevozki_furoi_ru\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/slick/slick.css',
        'libs/magnific/magnificpopup.min.css',
        'libs/font-awesome/css/font-awesome.min.css',
        'css/common/article.css',
        'css/perevozki_furoi.css',

    ];
    public $js = [
        'libs/slick/slick.min.js',
        'libs/magnific/magnificpopup.min.js',
        'js/common/article.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
