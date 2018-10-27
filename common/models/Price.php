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
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
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
            [['from_city_id', 'to_city_id', 'truck_id', 'shipment_type', 'price'], 'required'],
            [['from_city_id', 'to_city_id', 'truck_id', 'distance', 'price', 'created_at', 'updated_at'], 'integer'],
            [['shipment_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_city_id' => 'Откуда',
            'to_city_id' => 'Куда',
            'truck_id' => 'Тип машины',
            'shipment_type' => 'Загрузка',
            'distance' => 'Расстояние',
            'price' => 'Цена',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getFromCity()
    {
        return $this->hasOne(City::class,['id'=>'from_city_id']);
    }

    public function getToCity()
    {
        return $this->hasOne(City::class,['id'=>'to_city_id']);
    }

    public function getTruck()
    {
        return $this->hasOne(Truck::class,['id'=>'truck_id']);
    }
}
