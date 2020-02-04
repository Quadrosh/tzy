<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/slick/slick.css',
        'libs/magnific/magnificpopup.min.css',
        'css/backend.css',
        'css/common/article.css',
    ];
    public $js = [
        'libs/slick/slick.min.js',
        'libs/magnific/magnificpopup.min.js',
        'js/common/article.js',
        'js/backend.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
