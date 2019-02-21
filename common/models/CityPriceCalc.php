<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_price_calc".
 *
 * @property integer $id
 * @property string $city
 * @property string $load_capacity
 * @property string $description
 * @property string $min_time
 * @property string $price_city
 * @property string $price_center
 * @property string $price_hist_center
 * @property string $price_outside
 * @property integer $created_at
 * @property integer $updated_at
 */
class CityPriceCalc extends \yii\db\ActiveRecord
{

    public $to_center;
    public $to_hist_center;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_price_calc';
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['city', 'load_capacity', 'description', 'min_time', 'price_city', 'price_center', 'price_hist_center', 'price_outside'], 'string', 'max' => 255],
            [['to_center', 'to_hist_center'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'load_capacity' => 'Load Capacity',
            'description' => 'Description',
            'min_time' => 'Min Time',
            'price_city' => 'Price City',
            'price_center' => 'Price Center',
            'price_hist_center' => 'Price Hist Center',
            'price_outside' => 'Price Outside',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public static function Calculate($attr)
    {
        if ($attr['id']==0) {
            return 'Для расчета выберите грузоподемность.';
        }
        $price = CityPriceCalc::findOne($attr['id']);

        eval( '$min_time = (' . $price->min_time. ');' );

        $startText =
            'Автомобиль: '.$price->description .', <br>'.
//            'Грузоподъемность: '.$price->load_capacity .', <br>'.
            'Минимальное время заказа часов (+ подача): '.$price->min_time .', <br>';

        $priceText = 'Цена 1 часа по Москве: '.$price->price_city .'р, <br>'.
            'Стоимость мин. заказа: '.$min_time * $price->price_city .'р, <br>';


        if ($attr['to_center']) {
            $priceText = 'Цена 1 часа с заездом в пределы ТТК: '.$price->price_center .'р, <br>'.
                'Стоимость мин. заказа: '.$min_time * $price->price_center .'р, <br>';
            if (trim($price->price_center) == '+1 ч.') {
                $priceText = 'Цена 1 часа: '.$price->price_city .'р, <br>'.
                    'Цена заезда в пределы ТТК: '.$price->price_center .', <br>'.
                    'Стоимость мин. заказа: '.($min_time+1) * $price->price_city .'р, <br>';
            }

        }
        if ($attr['to_hist_center']) {
            $priceText = 'Цена 1 часа с заездом в пределы Бульварного кольца: '.$price->price_hist_center .'р, <br>'.
                'Стоимость мин. заказа: '.$min_time * $price->price_hist_center .'р, <br>';
            if (trim($price->price_hist_center) == '+1 ч.') {
                $priceText = 'Цена 1 часа: '.$price->price_city .'р, <br>'.
                    'Цена заезда в пределы Бульварного кольца: '.$price->price_hist_center .', <br>'.
                    'Стоимость мин. заказа: '.($min_time+1) * $price->price_city .'р, <br>';
            }
        }

         $outside = 'Цена 1 км выезда за пределы МКАД: '.$price->price_outside .'р, <br>';



        return $startText.$priceText.$outside;

//        var_dump($price->toArray()); die;
//        var_dump($attr); die;
    }
}
