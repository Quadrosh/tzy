<?php


namespace common\widgets;
use common\models\City;
use common\models\Menu;
use yii\base\Widget;
use yii\helpers\ArrayHelper;


class CityPriceCalcWidget extends Widget
{
    public $city;




    public function init()
    {
        parent::init();

    }
    public function run()
    {

        return $this->render('city-price-calc', [
            'city' => $this->city,
        ]);

    }


}