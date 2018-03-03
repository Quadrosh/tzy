<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "chat_message".
 *
 * @property int $id
 * @property string $chat_id
 * @property string $author
 * @property string $manager_id
 * @property string $text
 * @property int $created_at
 */
class ChatMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat_message';
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
            [['chat_id', 'created_at'], 'integer'],
            [['author', 'manager_id'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 2048],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chat_id' => 'Chat ID',
            'author' => 'Author',
            'manager_id' => 'Manager ID',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }
}
