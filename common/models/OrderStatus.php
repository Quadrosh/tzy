<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_status".
 *
 * @property int $id
 * @property string $name
 * @property string $hrurl
 */
class OrderStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'hrurl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'hrurl' => 'Hrurl',
        ];
    }
}
