<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property int $id
 * @property string $name
 * @property string $hrurl
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manager';
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
