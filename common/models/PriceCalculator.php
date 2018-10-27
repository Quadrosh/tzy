<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property integer $from_city_id
 * @property integer $to_city_id
 * @property integer $truck_id
 * @property string $shipment_type
 * @property integer $distance
 * @property integer $price
 * @property integer $created_at
 * @property integer $updated_at
 */
class PriceCalculator extends \yii\base\Model
{

    public $from_city_id;
    public $to_city_id;
    public $truck_id;
    public $shipment_type;
    const NOT_FOUND_MESSAGE = 'Позвоните нам и мы быстро рассчитаем цену';
    const FOUND_MESSAGE = 'Стоимость доставки составит: ';
    const INFO_MESSAGE = 'Приведенные цены являются приблизительными, для точного расчета оформите заявку.';
    const DISTANCE_MESSAGE = 'Расстояние: ';
    const TRUCK_MESSAGE = 'Автомобиль: ';
    const LOAD_MESSAGE = 'Грузоподъемность: ';
    const HALF_LOAD = 0.7;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_city_id', 'to_city_id', 'truck_id', 'distance', 'price', 'created_at', 'updated_at'], 'integer'],
            [['shipment_type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'from_city_id' => 'Откуда',
            'to_city_id' => 'Куда',
            'truck_id' => 'Тип машины',
            'shipment_type' => 'Загрузка',
            'distance' => 'Расстояние',
            'price' => 'Цена',

        ];
    }

    public static function calculate($from_city_id,$to_city_id,$truck_id,$shipment_type)
    {

        $price = Price::find()->where([
            'from_city_id' => $from_city_id,
            'to_city_id'=>$to_city_id,
            'truck_id'=>$truck_id,
        ])->one();

        if ($price) {
            if ($shipment_type=='half') {
                $finalPrice = $price['price'] * PriceCalculator::HALF_LOAD;
            } else {
                $finalPrice = $price['price'];
            }
            return nl2br( PriceCalculator::TRUCK_MESSAGE . $price->truck->name.'. '.
            PriceCalculator::LOAD_MESSAGE . $price->truck->load_capacity.'. '.
            PriceCalculator::DISTANCE_MESSAGE . $price['distance'].' км.'.PHP_EOL.PHP_EOL.
            PriceCalculator::FOUND_MESSAGE . $finalPrice .' руб.');
        } else {
            return PriceCalculator::NOT_FOUND_MESSAGE;
        }
    }
}
