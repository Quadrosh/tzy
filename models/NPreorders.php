<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "n_preorders".
 *
 * @property int $id
 * @property string $dispatch
 * @property string $destination
 * @property string $cargo
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $weight
 * @property string $text
 * @property string $from_page
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $utm_term
 * @property string $utm_content
 * @property string $date
 * @property int $done
 */
class NPreorders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'n_preorders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dispatch', 'destination', 'cargo', 'phone'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['done'], 'integer'],
            [['dispatch', 'destination', 'cargo', 'name', 'phone', 'email', 'weight', 'from_page'], 'string', 'max' => 255],
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string', 'max' => 510],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dispatch' => 'Dispatch',
            'destination' => 'Destination',
            'cargo' => 'Cargo',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'weight' => 'Weight',
            'text' => 'Text',
            'from_page' => 'From Page',
            'utm_source' => 'Utm Source',
            'utm_medium' => 'Utm Medium',
            'utm_campaign' => 'Utm Campaign',
            'utm_term' => 'Utm Term',
            'utm_content' => 'Utm Content',
            'date' => 'Date',
            'done' => 'Done',
        ];
    }
}
