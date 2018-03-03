<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace tszakaz_ru\assets;

use yii\web\AssetBundle;


class LpMosChatAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/slick/slick.css',
        'libs/magnific/magnificpopup.css',
        'libs/font-awesome/css/font-awesome.min.css',

        'css/lp_mos_chat.css',
    ];
    public $js = [
        'libs/slick/slick.min.js',
//        'libs/gsap/jquery.gsap.min.js',
        'libs/gsap/TweenMax.min.js',
//        'libs/gsap/TweenLite.min.js',
        'libs/magnific/magnificpopup.min.js',
        'js/lp_mos_chat.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
