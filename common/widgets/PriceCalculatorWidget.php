<?php


namespace common\widgets;
use common\models\City;
use common\models\Menu;
use yii\base\Widget;
use yii\helpers\ArrayHelper;


class PriceCalculatorWidget extends Widget
{
    public $fromCityName;
    public $toCityName;
    public $onlyExisted;
    public $truckName;
    public $selectFromCityName;
    public $selectToCityName;



    public function init()
    {
        parent::init();

    }
    public function run()
    {




        return $this->render('price-calculator', [
            'toCityName' => $this->toCityName,
            'fromCityName' => $this->fromCityName,
            'onlyExisted' => $this->onlyExisted,
            'truckName' => $this->truckName,
            'selectFromCityName' => $this->selectFromCityName,
            'selectToCityName' => $this->selectToCityName,
        ]);

    }


}