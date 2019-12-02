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
 * @property string $section_image_title
 * @property string $background_image
 * @property string $background_image_title
 * @property string $thumbnail_image
 * @property string $thumbnail_image_alt
 * @property string $thumbnail_image_title
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
 * @property integer $sort
 * @property integer $code_name
 * @property integer $description_class
 * @property integer $raw_text_class
 * @property integer $image_class
 * @property integer $conclusion
 * @property integer $conclusion_class
 */
class ArticleSection extends \yii\db\ActiveRecord
{
    const VIEW_OPTIONS = [
            '_as-head-descr-blocks-text' => 'head-descr-blocks-text',
            '_as-image_float_in_text' => 'image_float_in_text',
            '_as-image_icon_in_head' => 'image_icon_in_head',
            '_as-top_h1_bgr_image-fw' => 'top_h1_bgr_image-fw',
            '_as-top_h1_form-fw' => 'top_h1_form-fw',
            '_as-head-descr-blocks-text-fw' => 'head-descr-blocks-text-fw',
            '_as-image_float_in_text-fw' => 'image_float_in_text-fw',
            '_as-image_icon_in_head-fw' => 'image_icon_in_head-fw',
            '_as-illustration-fw' => 'illustration-fw',
            '_as-nogutters' => 'nogutters',
            '_as-h_2col-text--fix_image-fw' => 'h_2col-text--fix_image-fw',
        ];
    const HEADER_CLASS_OPTIONS = [
        'text-center' => 'text-center',
        'text-left' => 'text-left',
        'text-right' => 'text-right',
        'text_small' => 'text_small',
        'pl5' => 'pl5',
    ];
    const IMAGE_CLASS_OPTIONS = [
        'float-right w50perSm' => 'float-right w50perSm',
        'float-left w50perSm' => 'float-left w50perSm',
        'float-right w30perSm' => 'float-right w30perSm',
        'float-left w30perSm' => 'float-left w30perSm',
        'float-right w20perSm' => 'float-right w20perSm',
        'float-left w20perSm' => 'float-left w20perSm',
        'w50perSm' => 'w50perSm',
        'w50per' => 'w50per',
        'w30per' => 'w30per',
        'w20per' => 'w20per',
        'float-left w20per' => 'float-left w20per',
        'float-right w20per' => 'float-right w20per',
        'w100' => 'w100',
        'w80' => 'w80',
        'w50' => 'w50',
    ];

    const DEFAULT_VIEW = '_as-image_icon_in_head';
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
            [['article_id','sort'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description', 'raw_text', 'section_image', 'background_image', 'thumbnail_image', 'conclusion','section_image_title','background_image_title','thumbnail_image_title'], 'string'],
            [['header', 'header_class', 'call2action_description'], 'string', 'max' => 510],
            [['section_image_alt', 'call2action_name', 'call2action_link', 'call2action_class', 'call2action_comment', 'view', 'color_key', 'structure', 'custom_class', 'code_name','description_class', 'raw_text_class', 'image_class', 'conclusion_class','thumbnail_image_alt'], 'string', 'max' => 255],
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
            'sort' => 'Sort',

        ];
    }
    public function getArticle()
    {
        return $this->hasOne(Article::class,['id'=>'article_id']);
    }

    public function getBlocks()
    {
        return $this->hasMany(ArticleSectionBlock::class,['article_section_id'=>'id'])
            ->orderBy(['sort' => SORT_ASC]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                if (!$this->sort ) {
                    $article = Article::findOne($this->article_id);
                    if ($article->sections) {
                        $this->sort = count($article->sections)+1;
                    } else {
                        $this->sort = 1;
                    }
                }
                if (!$this->view) {
                    $this->view = static::DEFAULT_VIEW;
                }
            }

            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        if ($this->section_image) {
            $this->deleteImage('section_image');
        }
        if ($this->background_image) {
            $this->deleteImage('background_image');
        }
        if ($this->thumbnail_image) {
            $this->deleteImage('thumbnail_image');
        }
        if ($this->blocks){
            foreach ($this->blocks as $item) {
                $item->delete();
            }
        }
        return true;
    }
    public function deleteImage($propertyName)
    {
        $imageFile = Imagefiles::find()->where(['name'=>$this->$propertyName])->one();
        if ($imageFile) {
            $imageFile->deleteWithFile();
        }
        $this->$propertyName = null;
        $this->save();
    }

//    public static function moveElement(&$array, $a, $b) {
//        $out = array_splice($array, $a, 1);
//        array_splice($array, $b, 0, $out);
//        return $out;
//    }

    public static function moveUpBySort($id)
    {
        $model = static::findOne($id);

        $siblings = ArticleSection::find()->where([
            'article_id'=>$model->article_id
        ])->orderBy(['sort'=>SORT_ASC])->all();


        if (count($siblings)>1) {
            foreach ($siblings as $key => $child) {
                if ($child['id'] == $id && $key > 0) {
                    $item = $child;
                    $siblings[$key] = $siblings[$key-1];
                    $siblings[$key-1] = $item;
                }
            }
            foreach ($siblings as $key => $child) {
                $child->sort = $key+1;
                $child->save();
            }
        }
    }

    public static function moveDownBySort($id)
    {
        $model = static::findOne($id);

        $siblings = ArticleSection::find()->where([
            'article_id'=>$model->article_id
        ])->orderBy(['sort'=>SORT_ASC])->all();


        if (count($siblings)>1) {
            foreach ($siblings as $key => $child) {
                if ($child['id'] == $id && $key < count($siblings)-1) {
                    $item = $child;
                    $siblings[$key] = $siblings[$key+1];
                    $siblings[$key+1] = $item;
                }
            }
            foreach ($siblings as $key => $child) {
                $child->sort = $key+1;
                $child->save();
            }
        }
    }


//    public static function viewOptions()
//    {
//        return [
//            '_as-head-descr-blocks-text' => 'head-descr-blocks-text',
//            '_as-image_float_in_text' => 'image_float_in_text',
//            '_as-image_icon_in_head' => 'image_icon_in_head',
//            '_as-top_h1_bgr_image-fw' => 'top_h1_bgr_image-fw',
//            '_as-top_h1_form-fw' => 'top_h1_form-fw',
//            '_as-head-descr-blocks-text-fw' => 'head-descr-blocks-text-fw',
//            '_as-image_float_in_text-fw' => 'image_float_in_text-fw',
//            '_as-image_icon_in_head-fw' => 'image_icon_in_head-fw',
//            '_as-illustration-fw' => 'illustration-fw',
//        ];
//    }
}
