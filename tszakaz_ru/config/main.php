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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'tszakaz_ru\controllers',
    'language' => 'ru-RU',
    'defaultRoute' => 'site/index',
    'timeZone' => 'Europe/Moscow',
    'components' => [
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
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-tszakaz', 'httpOnly' => true],
        ],
//        'session' => [
//            // this is the name of the session cookie used for login
//            'name' => 'tszakaz.ru',
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
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

                $params['botAddress'] => '/chat/bot',
                'chat/post' => '/chat/post',
//                'perevozki-dlya-juridicheskih-lits.html' => '/article/page-jurlits',
                'news.html' => '/article/index',
                'baza-znaniy.html' => '/article/index',

                'sitemap.xml' => 'site/sitemap',


                't/<testpage:[0-9a-z\-\_]+>' => 'test/test',
                'dev/<testpage:[0-9a-z\-\_]+>' => 'test/dev',
                'lp/<landingpage:[0-9a-z\-\_]+>' => 'landing/page',

                'ts/<testpage:[0-9a-z\-\_]+>' => 'test/test',
                '<pagename:[0-9a-z\-\_]+>.html' => 'site/page',
                ['pattern'=>'<action>', 'route'=>'site/page'],
            ],

        ],
    ],
    'params' => $params,
];
