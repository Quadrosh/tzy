<?php

namespace common\modules\comments\traits;

use Yii;
use common\modules\comments\Module;

/**
 * Class ModuleTrait
 *
 * @package yii2mod\comments\traits
 */
trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return Yii::$app->getModule('comment');
    }
}
