<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'name'=>'ТрансЗаказ',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'tszakaz_ru\controllers',
    'language' => 'ru-RU',
    'defaultRoute' => 'site/index',
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => $params['reCaptchaTszakazSiteV2'],
            'secretV2' => $params['reCaptchaTszakazClientV2'],
            'siteKeyV3' => $params['reCaptchaTszakazSite'],
            'secretV3' => $params['reCaptchaTszakazClient'],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.css' : 		'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-tszakaz',
            'cookieValidationKey' => $params['cookieValidationKey'],
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => 'common\models\FrontUser',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'identityCookie' => ['name' => '_identity-tszakaz', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login
            'name' => 'cookie_tszakaz',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['tzy'],
                    'logFile' => '@runtime/logs/tzy.log',
                    'logVars' => [],   // $_GET, $_POST, $_FILES, $_COOKIE, $_SESSION, $_SERVER
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 20,
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'confirm-email/<token:[0-9a-zA-Z\-\_]+>' => 'site/confirm-email',
                'comments-unsubscribe/<token:[0-9a-zA-Z\-\_]+>' => 'site/comments-unsubscribe',

                $params['botAddress'] => '/chat/bot',
                'chat/post' => '/chat/post',
                'news.html' => '/article/index',
                'baza-znaniy.html' => '/article/index',

                'sitemap.xml' => 'site/sitemap',
                't/<testpage:[0-9a-z\-\_]+>' => 'test/test',
                'dev/<testpage:[0-9a-z\-\_]+>' => 'test/dev',
                'lp/<landingpage:[0-9a-z\-\_]+>' => 'landing/page',

                'ts/<testpage:[0-9a-z\-\_]+>' => 'test/test',
                '<pagename:[0-9a-z\-\_]+>.html' => 'site/page',
                '<pagename:[0-9a-z\-\_]+/[0-9a-z\-\_]+>.html' => 'site/page',
                '<pagename:[0-9a-z\-\_]+/[0-9a-z\-\_]+/[0-9a-z\-\_]+>.html' => 'site/page',
                ['pattern'=>'<action>', 'route'=>'site/page'],
            ],

        ],
    ],
    'params' => $params,
];
