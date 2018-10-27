<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $distance_to_parent
 * @property string $on_main_road
 * @property string $parent_center_direction
 * @property string $bad_road
 * @property string $comment
 * @property string $code
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'distance_to_parent'], 'integer'],
            [['comment'], 'string'],
            [['name', 'on_main_road', 'parent_center_direction', 'bad_road', 'code'], 'string', 'max' => 255],
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
            'parent_id' => 'Parent ID',
            'distance_to_parent' => 'Distance To Parent',
            'on_main_road' => 'On Main Road',
            'parent_center_direction' => 'Parent Center Direction',
            'bad_road' => 'Bad Road',
            'comment' => 'Comment',
            'code' => 'Code',
        ];
    }
}
