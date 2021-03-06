<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'amo' => [
            'class' => 'common\components\Amo',
        ],
        'helpers' => [
            'class' => 'common\components\Helpers',
        ],
        'i18n' => [
            'translations' => [
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/modules/comments/messages',
//                    'basePath' => '@yii2mod/comments/messages',
                ],
            ],
        ],
    ],
    'modules' => [
        'comment' => [
            'class' => 'common\modules\comments\Module',
//            'class' => 'yii2mod\comments\Module',
        ],
    ]

];
