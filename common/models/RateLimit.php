<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\filters\RateLimitInterface;
use yii\helpers\Url;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;




class RateLimit extends Model implements  RateLimitInterface {

    public $rateLimit = 80;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    public function getRateLimit($request, $action)
    {
        return [$this->rateLimit, 60]; //не более rateLimit запросов в течении 60 секунд
    }

    public function loadAllowance($request, $action)
    {
        $session = Yii::$app->session;
        return [$session['allowance'],  $session['allowance_updated_at']];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $session = Yii::$app->session;
        $session['allowance']=$allowance;
        $session['allowance_updated_at'] = $timestamp;

    }





}