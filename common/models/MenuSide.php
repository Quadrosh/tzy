<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu_side".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $link
 * @property int $num_order
 */
class MenuSide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_side';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'num_order'], 'integer'],
            [['name'], 'required'],
            [['name', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'link' => 'Link',
            'num_order' => 'Num Order',
        ];
    }
}
