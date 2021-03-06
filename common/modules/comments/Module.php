<?php

namespace common\modules\comments;

use Yii;

/**
 * Class Module
 *
 * @package yii2mod\comments
 */
class Module extends \yii\base\Module
{
    /**
     * @var string the class name of the [[identity]] object
     */
    public $userIdentityClass = 'common\models\FrontUser';

    /**
     * @var string the class name of the comment model object, by default its yii2mod\comments\models\CommentModel
     */
    public $commentModelClass = 'common\modules\comments\models\CommentModel';

    /**
     * @var string the namespace that controller classes are in
     */
    public $controllerNamespace = 'common\modules\comments\controllers';

    /**
     * @var bool when admin can edit comments on frontend
     */
    public $enableInlineEdit = false;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if (null === $this->userIdentityClass) {
            $this->userIdentityClass = Yii::$app->getUser()->identityClass;
        }
    }
}
