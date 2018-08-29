<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $list_name
 * @property string $cat_ids
 * @property string $hrurl
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $exerpt
 * @property string $exerpt_big
 * @property string $h1
 * @property string $topimage
 * @property string $topimage_alt
 * @property string $background_image
 * @property string $thumbnail_image
 * @property string $call2action_description
 * @property string $call2action_name
 * @property string $call2action_link
 * @property string $call2action_class
 * @property string $call2action_comment
 * @property string $imagelink
 * @property string $imagelink_alt
 * @property string $author
 * @property string $status
 * @property string $view
 * @property string $layout
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $site
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
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
            [['list_name'], 'required'],
            [['cat_ids', 'description', 'keywords', 'exerpt', 'exerpt_big', 'background_image', 'thumbnail_image'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['list_name', 'hrurl', 'title', 'h1', 'topimage', 'topimage_alt', 'call2action_name', 'call2action_link', 'call2action_class', 'call2action_comment', 'imagelink', 'imagelink_alt', 'author', 'status', 'view', 'layout', 'site'], 'string', 'max' => 255],
            [['call2action_description'], 'string', 'max' => 510],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site' => 'Site',
            'list_name' => 'List Name',
            'cat_ids' => 'Cat Ids',
            'hrurl' => 'Hrurl',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'exerpt' => 'Exerpt',
            'exerpt_big' => 'Exerpt Big',
            'h1' => 'H1',
            'topimage' => 'Topimage',
            'topimage_alt' => 'Topimage Alt',
            'background_image' => 'Background Image',
            'thumbnail_image' => 'Thumbnail Image',
            'call2action_description' => 'Call2action Description',
            'call2action_name' => 'Call2action Name',
            'call2action_link' => 'Call2action Link',
            'call2action_class' => 'Call2action Class',
            'call2action_comment' => 'Call2action Comment',
            'imagelink' => 'Imagelink',
            'imagelink_alt' => 'Imagelink Alt',
            'author' => 'Author',
            'status' => 'Status',
            'view' => 'View',
            'layout' => 'Layout',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

        ];
    }
}
