<?php

$GLOBALS['YII_APP_MODE']='PROD'; // PROD <-> DEV
// Режим DEV только для разработки на локальной машине и отладки!!!
// В режиме DEV заявки отправляютя на тестовый email, указанный напрямую в моделях Feedback и Preorders


if ($GLOBALS['YII_APP_MODE']=='DEV') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}



define('YII_ENABLE_ERROR_HANDLER', true);
define('YII_ENABLE_EXCEPTION_HANDLER', true);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require_once __DIR__ . '/../functions.php' ;

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();

