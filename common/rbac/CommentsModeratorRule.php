<?php
namespace common\rbac;

use yii\rbac\Rule;

class CommentsModeratorRule extends Rule
{
    public $name = 'CommentsModerator';

    public function execute($user, $item, $params)
    {
        return true;
    }
}