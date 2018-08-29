<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_section".
 *
 * @property integer $id
 * @property integer $article_id
 * @property string $header
 * @property string $header_class
 * @property string $description
 * @property string $raw_text
 * @property string $section_image
 * @property string $section_image_alt
 * @property string $background_image
 * @property string $thumbnail_image
 * @property string $call2action_description
 * @property string $call2action_name
 * @property string $call2action_link
 * @property string $call2action_class
 * @property string $call2action_comment
 * @property string $view
 * @property string $color_key
 * @property string $structure
 * @property string $custom_class
 * @property integer $created_at
 * @property integer $updated_at
 */
class ArticleSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_section';
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
            [['article_id'], 'required'],
            [['article_id', 'created_at', 'updated_at'], 'integer'],
            [['description', 'raw_text', 'section_image', 'background_image', 'thumbnail_image'], 'string'],
            [['header', 'header_class', 'call2action_description'], 'string', 'max' => 510],
            [['section_image_alt', 'call2action_name', 'call2action_link', 'call2action_class', 'call2action_comment', 'view', 'color_key', 'structure', 'custom_class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'header' => 'Header',
            'header_class' => 'Header Class',
            'description' => 'Description',
            'raw_text' => 'Raw Text',
            'section_image' => 'Section Image',
            'section_image_alt' => 'Section Image Alt',
            'background_image' => 'Background Image',
            'thumbnail_image' => 'Thumbnail Image',
            'call2action_description' => 'Call2action Description',
            'call2action_name' => 'Call2action Name',
            'call2action_link' => 'Call2action Link',
            'call2action_class' => 'Call2action Class',
            'call2action_comment' => 'Call2action Comment',
            'view' => 'View',
            'color_key' => 'Color Key',
            'structure' => 'Structure',
            'custom_class' => 'Custom Class',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
