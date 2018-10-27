<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "truck".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $load_capacity
 * @property string $description
 * @property string $dimensions
 */
class Truck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'truck';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['icon', 'description', 'dimensions'], 'string'],
            [['name', 'load_capacity'], 'string', 'max' => 255],
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
            'icon' => 'Icon',
            'load_capacity' => 'Load Capacity',
            'description' => 'Description',
            'dimensions' => 'Dimensions',
        ];
    }
}
