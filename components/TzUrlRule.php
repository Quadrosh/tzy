<?php


namespace app\components;

use app\models\Pages;
use yii\web\UrlRuleInterface;
use yii\base\Object;

class TzUrlRule extends Object implements UrlRuleInterface
{
    /*
    https://github.com/yiisoft/yii2/blob/master/docs/guide/runtime-routing.md#creating-rule-classes-
    */
    public function createUrl($manager, $route, $params)
    {
        if ($route === 'site/page') {
            if (isset($params['pagename'])) {
                return $params['pagename'];
            } else {
                return $params['pagename'] = 'about';
            }
        }
        return false; // this rule does not apply
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        $matches = Pages::find()->all();
//        if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches)) {
//        if (preg_match('%^[0-9a-z\-\_]+>.html$%', $pathInfo, $matches)) {
        if (preg_match('%^[0-9a-z\-\_]+>.html$%', $pathInfo, $matches)) {
            // check $matches[1] and $matches[3] to see
            // if they match a manufacturer and a model in the database.
            // If so, set $params['manufacturer'] and/or $params['model']
            // and return ['car/index', $params]
        }
        return false; // this rule does not apply
    }
}