<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "chat_item".
 *
 * @property int $id
 * @property string $user_id
 * @property string $user_name
 * @property string $from_page
 * @property string $user_ip
 * @property string $email
 * @property string $contacts
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $utm_term
 * @property string $utm_content
 * @property string $manager_id
 * @property string $quality
 * @property string $comment
 * @property int $created_at
 */
class ChatItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat_item';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['user_id', 'user_name', 'from_page', 'user_ip', 'email', 'contacts', 'manager_id', 'quality'], 'string', 'max' => 255],
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'comment'], 'string', 'max' => 510],
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
            'user_name' => 'User Name',
            'from_page' => 'From Page',
            'user_ip' => 'User Ip',
            'email' => 'Email',
            'contacts' => 'Contacts',
            'utm_source' => 'Utm Source',
            'utm_medium' => 'Utm Medium',
            'utm_campaign' => 'Utm Campaign',
            'utm_term' => 'Utm Term',
            'utm_content' => 'Utm Content',
            'manager_id' => 'Manager ID',
            'quality' => 'Quality',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }
}
