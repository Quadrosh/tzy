<?php

namespace common\modules\comments\models;

use common\models\FrontUser;
use common\models\Manager;
use paulzi\adjacencyList\AdjacencyListBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii2mod\behaviors\PurifyBehavior;
use yii2mod\comments\traits\ModuleTrait;
use yii2mod\moderation\enums\Status;
use yii2mod\moderation\ModerationBehavior;
use yii2mod\moderation\ModerationQuery;

/**
 * Class CommentModel
 *
 * @property int $id
 * @property string $entity
 * @property int $entityId
 * @property string $content
 * @property int $parentId
 * @property int $level
 * @property int $createdBy
 * @property int $updatedBy
 * @property string $relatedTo
 * @property string $url
 * @property int $status
 * @property int $createdAt
 * @property int $updatedAt
 * @property int $is_manager
 *
 * @method ActiveRecord makeRoot()
 * @method ActiveRecord appendTo($node)
 * @method ActiveQuery getDescendants()
 * @method ModerationBehavior markRejected()
 * @method AdjacencyListBehavior deleteWithChildren()
 */
class CommentModel extends ActiveRecord
{
    use ModuleTrait;

    const SCENARIO_MODERATION = 'moderation';

    /**
     * @var null|array|ActiveRecord[] comment children
     */
    protected $children;
    public $name;
    public $email;

    public $reCaptcha;



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        $rules =  [
            [['entity', 'entityId'], 'required'],
            ['content', 'required', 'message' => Yii::t('yii2mod.comments', 'Comment cannot be blank.')],
            [['content', 'entity', 'relatedTo', 'url'], 'string'],
            ['status', 'default', 'value' => Status::APPROVED],
            ['status', 'in', 'range' => Status::getConstantsByName()],
            ['level', 'default', 'value' => 1],
            ['parentId', 'validateParentID', 'except' => static::SCENARIO_MODERATION],
            [['entityId', 'parentId', 'status', 'level'], 'integer'],

            [['email'], 'email'],
            [['name'], 'string'],
            [['is_manager'], 'integer'],
            [['email','name'], 'required'],

//            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator3::className(),
////                'secret' => 'your secret key', // unnecessary if reСaptcha is already configured
//                'threshold' => 0.5,
//                'action' => 'comment',
//            ],


//            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
//                'uncheckedMessage' => 'Пожалуйста, подтвердите что Вы не бот'
//            ],

        ];
        if (!strpos(Url::base(true),'.local')) {
            $rules[] = [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'uncheckedMessage' => 'Пожалуйста, подтвердите что Вы не бот'
            ];
        }
        return $rules;
    }

    /**
     * @param $attribute
     */
    public function validateParentID($attribute)
    {
        if (null !== $this->{$attribute}) {
            $parentCommentExist = static::find()
                ->approved()
                ->andWhere([
                    'id' => $this->{$attribute},
                    'entity' => $this->entity,
                    'entityId' => $this->entityId,
                ])
                ->exists();

            if (!$parentCommentExist) {
                $this->addError('content', Yii::t('yii2mod.comments', 'Oops, something went wrong. Please try again later.'));
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'createdBy',
                'updatedByAttribute' => 'updatedBy',
            ],
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => 'updatedAt',
            ],
            'purify' => [
                'class' => PurifyBehavior::class,
                'attributes' => ['content'],
                'config' => [
                    'HTML.SafeIframe' => true,
                    'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                    'AutoFormat.Linkify' => true,
                    'HTML.TargetBlank' => true,
                    'HTML.Allowed' => 'a[href], iframe[src|width|height|frameborder], img[src]',
                ],
            ],
            'adjacencyList' => [
                'class' => AdjacencyListBehavior::class,
                'parentAttribute' => 'parentId',
                'sortable' => false,
            ],
            'moderation' => [
                'class' => ModerationBehavior::class,
                'moderatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii2mod.comments', 'ID'),
            'content' => Yii::t('yii2mod.comments', 'Content'),
            'entity' => Yii::t('yii2mod.comments', 'Entity'),
            'entityId' => Yii::t('yii2mod.comments', 'Entity ID'),
            'parentId' => Yii::t('yii2mod.comments', 'Parent ID'),
            'status' => Yii::t('yii2mod.comments', 'Status'),
            'level' => Yii::t('yii2mod.comments', 'Level'),
            'createdBy' => Yii::t('yii2mod.comments', 'Created by'),
            'updatedBy' => Yii::t('yii2mod.comments', 'Updated by'),
            'relatedTo' => Yii::t('yii2mod.comments', 'Related to'),
            'url' => Yii::t('yii2mod.comments', 'Url'),
            'createdAt' => Yii::t('yii2mod.comments', 'Created date'),
            'updatedAt' => Yii::t('yii2mod.comments', 'Updated date'),

            'email' => 'email',
            'name' => 'name',
        ];
    }

    /**
     * @return ModerationQuery
     */
    public static function find()
    {
        return new ModerationQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {


            if ($this->author && $this->author->email && Manager::findOne(['email'=>$this->author->email]) ) {
                $this->is_manager = true ;
            }

            return true;
        } else {
            return false;
        }



    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) { // isNewRecord
            if ($this->parentId > 0) {
                $parentNodeLevel = static::find()->select('level')->where(['id' => $this->parentId])->scalar();
                $this->level += $parentNodeLevel;
                static::sendNotificationAboutNewChild($this->parentId);
            }
        }

        parent::afterSave($insert, $changedAttributes);

        if (!$insert) {
            if (array_key_exists('status', $changedAttributes)) {
                $this->beforeModeration();
            }
        }
    }

    /**
     * @return bool
     */
    public function saveComment()
    {
        if ($this->validate()) {
            if (empty($this->parentId)) {
                return $this->makeRoot()->save();
            } else {
                $parentComment = static::findOne(['id' => $this->parentId]);

                return $this->appendTo($parentComment)->save();
            }
        }

        return false;
    }

    /**
     * Author relation
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne($this->getModule()->userIdentityClass, ['id' => 'createdBy']);
    }

    /**
     * Get comments tree.
     *
     * @param string $entity
     * @param string $entityId
     * @param null $maxLevel
     *
     * @return array|ActiveRecord[]
     */
    public static function getTree($entity, $entityId, $maxLevel = null)
    {
        $query = static::find()
            ->alias('c')
            ->approved()
            ->andWhere([
                'c.entityId' => $entityId,
                'c.entity' => $entity,
            ])
            ->orderBy(['c.parentId' => SORT_ASC, 'c.createdAt' => SORT_ASC])
            ->with(['author']);

        if ($maxLevel > 0) {
            $query->andWhere(['<=', 'c.level', $maxLevel]);
        }

        $models = $query->all();

        if (!empty($models)) {
            $models = static::buildTree($models);
        }

        return $models;
    }

    /**
     * Build comments tree.
     *
     * @param array $data comments list
     * @param int $rootID
     *
     * @return array|ActiveRecord[]
     */
    protected static function buildTree(&$data, $rootID = 0)
    {
        $tree = [];

        foreach ($data as $id => $node) {
            if ($node->parentId == $rootID) {
                unset($data[$id]);
                $node->children = self::buildTree($data, $node->id);
                $tree[] = $node;
            }
        }

        return $tree;
    }

    /**
     * @return array|null|ActiveRecord[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param $value
     */
    public function setChildren($value)
    {
        $this->children = $value;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        return !empty($this->children);
    }

    /**
     * @return string
     */
    public function getPostedDate()
    {
        return Yii::$app->formatter->asRelativeTime($this->createdAt);
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        if ($this->author) {
            if ($this->author->hasMethod('getUsername')) {
                return $this->author->getUsername();
            } else {
                if ($this->is_manager) {
                    return $this->author->username . ' <sup>Трансзаказ</sup>' ;
                } else {
                    return $this->author->username;
                }
            }
        } else {
            return null;
        }

    }

    /**
     * @return string
     */
    public function getContent()
    {
        return nl2br($this->content);
    }

    /**
     * Get avatar of the user
     *
     * @return string
     */
    public function getAvatar()
    {
        if ($this->author && $this->author->hasMethod('getAvatar')) {
            return $this->author->getAvatar();
        }


        if (!$this->is_manager) {
            return '<svg version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	viewBox="0 0 50 50"
	style="enable-background:new 0 0 50 50;" xml:space="preserve">
<style type="text/css">
	.comments_icon_user_st0{fill:#1A8ECD;}
</style>
<path class="comments_icon_user_st0" d="M2.1,26.3c0-0.9,0-1.8,0-2.7c0-0.1,0.1-0.3,0.1-0.4c0.2-2.8,0.9-5.5,2.1-8
	C7.7,8.3,13.3,4,21,2.5c0.9-0.2,1.8-0.2,2.6-0.4c0.9,0,1.8,0,2.7,0c0.3,0,0.6,0.1,1,0.1c4.5,0.5,8.5,2.1,12,4.9
	c5.3,4.3,8.2,10,8.5,16.8c0.2,4.5-0.8,8.8-3.2,12.7c-3.6,5.9-8.9,9.6-15.7,10.8c-0.9,0.2-1.7,0.2-2.6,0.4c-0.9,0-1.8,0-2.7,0
	c-0.3,0-0.6-0.1-1-0.1c-3.8-0.4-7.2-1.6-10.4-3.7C7,40.4,3.6,35.4,2.5,29C2.3,28.1,2.2,27.2,2.1,26.3z M39.4,39.7
	c5.1-4.7,8-13.1,5.1-21.5C41.6,9.9,33.5,4,24,4.4C15.3,4.8,7.5,10.8,5.1,19.6c-2.2,8,0.9,15.8,5.5,20.1c0.2-0.2,0.3-0.3,0.5-0.5
	c1.6-1.4,3.5-2.2,5.4-3c0.9-0.4,1.9-0.8,2.8-1.3c1.6-0.9,2.2-3.4,1.3-5c-0.1-0.1-0.1-0.2-0.2-0.3c-0.9-0.9-1.4-1.9-1.9-3
	c-0.1-0.3-0.4-0.6-0.7-0.9c-0.3-0.3-0.6-0.6-0.8-1c-0.7-1.2-0.4-2.4,0.7-3.2c0.3-0.2,0.4-0.4,0.4-0.8c-0.2-1-0.3-2.1-0.5-3.1
	c-0.4-1.8,0.2-3.3,1.6-4.5c0.2-0.2,0.5-0.4,0.7-0.5c1.9-1.1,3.9-1.5,6.1-1.2c1.8,0.2,3.3,1,4.4,2.5c0.1,0.1,0.3,0.1,0.5,0.2
	c0.8,0,1.4,0.4,1.5,1.2c0.1,0.8,0,1.5,0,2.3c-0.1,1-0.3,1.9-0.5,2.9c-0.1,0.6,0.1,1,0.6,1.3c0.4,0.3,0.7,0.7,0.8,1.2
	c0.1,1.1-0.2,2-1,2.7c-0.3,0.3-0.7,0.8-0.9,1.2c-0.4,0.9-0.8,1.8-1.6,2.5c-0.5,0.5-0.7,1.1-0.7,1.9c0,0.4,0,0.8,0,1.2
	c0,1.1,0.5,1.9,1.4,2.4c0.6,0.4,1.3,0.7,1.9,1C34.8,36.8,37.4,37.8,39.4,39.7z"/>
</svg>';
        } else {
            return '<svg version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	viewBox="0 0 50 50"
	style="enable-background:new 0 0 50 50;" xml:space="preserve">
<style type="text/css">
	.comments_icon_manager_st0{fill:#1A8ECD;}
</style>
<g >
	<path class="comments_icon_manager_st0" d="M25.7,8.6c0.3,0,0.7,0.1,1,0.1c1.4,0.2,2.8,0.6,4,1.5c1.5,1.1,2.4,2.6,2.8,4.4c0.3,1.1,0.3,2.2,0.3,3.3
		c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.3,0.3,0.3,0.5c0.2,0.6,0.2,1.2,0.1,1.8c-0.1,0.7-0.2,1.5-0.6,2.1c-0.2,0.4-0.4,0.7-0.8,0.9
		c-0.1,0-0.1,0.1-0.1,0.2c-0.6,1.4-1.3,2.8-2.2,4c-0.8,1-1.8,1.9-2.9,2.6c-1.9,1.1-3.8,1-5.7-0.1c-1.2-0.7-2.2-1.6-3-2.7
		c-0.9-1.1-1.5-2.4-2.1-3.7c0-0.1-0.1-0.2-0.2-0.2c-0.3-0.1-0.4-0.3-0.6-0.5c-0.4-0.6-0.6-1.2-0.7-1.8c-0.1-0.7-0.2-1.5,0-2.2
		c0-0.1,0.1-0.3,0.1-0.4c0.1-0.2,0.2-0.4,0.5-0.5c0-0.4,0.1-0.9,0.1-1.3c0.2-1,0.3-1.9,0.5-2.9c0.6-2.1,2-3.6,4-4.5
		c1.1-0.5,2.2-0.8,3.4-0.8c0.1,0,0.2,0,0.3,0C24.8,8.6,25.3,8.6,25.7,8.6z M30.5,17C30.4,17,30.4,17,30.5,17
		c-0.2-0.1-0.4-0.2-0.6-0.3c-0.4-0.2-0.8-0.4-1.3-0.5c-0.5-0.2-1.1-0.2-1.6-0.1c-1.4,0.4-2.8,0.4-4.3,0.1c-0.4-0.1-0.8-0.2-1.2-0.3
		c-0.9-0.1-1.7,0.1-2.4,0.7c-0.5,0.5-0.9,1-1.1,1.7c-0.1,0.4-0.2,0.7-0.3,1.1c-0.4-0.2-0.7,0-0.7,0.4c0,0,0,0,0,0.1
		c0,0.4-0.1,0.8,0,1.2c0,0.6,0.2,1.2,0.6,1.7c0.1,0.1,0.2,0.2,0.3,0.2c0.1,0,0.2,0,0.4,0c0,0,0,0,0,0.1c0.4,1,0.8,2,1.4,3
		c0.8,1.1,1.7,2.1,2.9,2.8c1,0.6,2,0.8,3.2,0.6c0.8-0.2,1.6-0.5,2.2-1c1.3-1,2.3-2.4,3-3.9c0.2-0.5,0.4-1,0.6-1.5
		c0.3,0.1,0.4,0.1,0.6-0.2c0.3-0.3,0.4-0.7,0.5-1c0.2-0.6,0.3-1.3,0.1-1.9c0-0.2-0.2-0.3-0.3-0.4c-0.1-0.1-0.3,0-0.5,0
		c-0.1-0.3-0.2-0.6-0.3-0.9c-0.3-0.8-0.6-1.5-1.1-2.1c-0.1-0.1-0.3-0.2-0.4-0.3c0,0,0,0-0.1,0.1C30.2,16.4,30.4,16.7,30.5,17z"/>
	<path class="comments_icon_manager_st0" d="M9,42.7c0.2,0.1,0.3,0.2,0.5,0.3c1.1,0.6,2.3,1,3.5,1.3c2.5,0.6,5,0.9,7.5,1h9c0.1,0,0.1,0,0.2,0
		c2.7-0.2,5.3-0.5,7.9-1.2c1.1-0.3,2.2-0.7,3.2-1.3c0.6-0.4,1.2-0.9,1.5-1.6c0.1-0.3,0.2-0.6,0.3-1c0-0.1,0-0.1,0-0.2
		c0-0.2,0-0.5,0-0.7c0-0.2-0.1-0.3-0.1-0.5c-0.4-1.4-0.9-2.8-1.7-4c-0.5-0.8-1.2-1.6-2-2.2c-1-0.8-2.3-1.2-3.5-1.3
		c-1.2-0.2-2.5-0.2-3.8-0.3c-0.2,0.5-0.5,1-0.8,1.5c-1,1.3-2.1,2.6-3.1,3.8c-0.3,0.3-0.6,0.6-0.9,0.9c0,0,0-0.1,0-0.1
		c-0.3-1-0.5-1.9-0.8-2.9c0-0.1,0-0.1,0.1-0.2c0.5-0.3,0.7-1.3,0.6-1.7c-1,0-2,0-3,0c0,0.1,0,0.1,0,0.2c0,0.6,0.1,1.1,0.7,1.5
		c0,0,0,0.1,0,0.2c-0.2,0.9-0.4,1.7-0.7,2.6c0,0.1-0.1,0.2-0.1,0.4c-0.1-0.1-0.1-0.1-0.1-0.2c-0.5-0.6-1-1.1-1.5-1.7
		c-1.2-1.4-2.4-2.7-3.2-4.4c-0.3,0-0.7,0.1-1,0.1c-0.9,0.1-1.8,0.1-2.7,0.2c-0.9,0.1-1.7,0.3-2.5,0.7c-1.1,0.6-2,1.4-2.7,2.4
		c-0.9,1.4-1.6,2.9-2,4.4C7.3,40.1,7.6,41.7,9,42.7z"/>
</g>
</svg>';
        }


    }

    /**
     * Get list of all authors
     *
     * @return array
     */
    public static function getAuthors()
    {
        $query = static::find()
            ->alias('c')
            ->select(['c.createdBy', 'a.username'])
            ->joinWith('author a')
            ->groupBy(['c.createdBy', 'a.username'])
            ->orderBy('a.username')
            ->asArray()
            ->all();

        return ArrayHelper::map($query, 'createdBy', 'author.username');
    }

    /**
     * @return int
     */
    public function getCommentsCount()
    {
        return (int) static::find()
            ->approved()
            ->andWhere(['entity' => $this->entity, 'entityId' => $this->entityId])
            ->count();
    }

    /**
     * @return string
     */
    public function getAnchorUrl()
    {
        return "#comment-{$this->id}";
    }

    /**
     * @return null|string
     */
    public function getViewUrl()
    {
        if (!empty($this->url)) {
            return $this->url . $this->getAnchorUrl();
        }

        return null;
    }

    /**
     * Before moderation event
     *
     * @return bool
     */
    public function beforeModeration()
    {
        $descendantIds = ArrayHelper::getColumn($this->getDescendants()->asArray()->all(), 'id');

        if (!empty($descendantIds)) {
            static::updateAll(['status' => $this->status], ['id' => $descendantIds]);
        }

        return true;
    }

    public static function sendNotificationAboutNewChild($commentId)
    {
        $comment = static::findOne($commentId);
        $user = $comment->getAuthor()->one();

        if ($user->subscribe_for_answers){
            $text = 'Вы получили ответ на Ваш комментарий "'.$comment->content.'".';

            $url = $comment->getViewUrl();
            $base = \yii\helpers\Url::base(true);
            $link = $base . $url;
            $unsubscribeLink = $base.'/comments-unsubscribe/'.$user->auth_key;

            Yii::$app->mailer->htmlLayout = "layouts/montserrat";
            $mail =  Yii::$app->mailer
                ->compose(
                    ['html' => 'goToLink-html', 'text' => 'goToLink-text'],
                    [
                        'link' => $link,
                        'header'=> 'Ответ на комментарий',
                        'name' => $user->username,
                        'text' => $text,
                        'call2action' => 'Перейти к ответу можно по ссылке',
                        'button' => 'Перейти',
                        'comment' => 'Вы получили это письмо, поскольку подписаны на оповещения об ответах на Ваши комментарии.<br> Отписаться от подписки можно перейдя по ссылке <a class="link" target="_blank" style="color:#1d4788;" href="'.$unsubscribeLink.'">отключить оповещения</a>',
                    ]
                )
                ->setFrom(Yii::$app->params['noreplyEmail'])
                ->setTo($user->email)
                ->setSubject('tszakaz.ru - ответ на Ваш комментарий')
                ->send();
        }

    }
}
