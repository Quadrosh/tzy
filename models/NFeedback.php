<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "n_feedback".
 *
 * @property int $id
 * @property string $user_id
 * @property string $name
 * @property string $city
 * @property string $from_page
 * @property string $phone
 * @property string $email
 * @property string $contacts
 * @property string $text
 * @property string $date
 * @property int $done
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $utm_term
 * @property string $utm_content
 */
class NFeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'n_feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['date'], 'safe'],
            [['done'], 'integer'],
            [['user_id', 'name', 'city', 'from_page', 'phone', 'email', 'contacts'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'name' => 'Name',
            'city' => 'City',
            'from_page' => 'From Page',
            'phone' => 'Phone',
            'email' => 'Email',
            'contacts' => 'Contacts',
            'text' => 'Text',
            'date' => 'Date',
            'done' => 'Done',
            'utm_source' => 'Utm Source',
            'utm_medium' => 'Utm Medium',
            'utm_campaign' => 'Utm Campaign',
            'utm_term' => 'Utm Term',
            'utm_content' => 'Utm Content',
        ];
    }
}
