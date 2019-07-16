<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace console\controllers;

use common\models\RolesAssignment;

use common\models\User;
use common\rbac\AdminRule;
use common\rbac\CommentsModeratorRule;
use common\rbac\CreatorRule;

use common\rbac\StatRule;
use yii\console\Controller;
use yii\console\ExitCode;

class RbacController extends Controller
{

    private $creatorRoleName = 'Creator';
    private $adminRoleName = 'Admin';
    private $statRoleName = 'Stat';
    private $commentsRoleName = 'CommentsModerator';



    public function actionIndex()
        // php yii rbac
    {


    }


    public function actionSet()
        // php yii rbac/set
    {
        $oldAssigns = RolesAssignment::find()->all();

        $auth = \Yii::$app->authManager;
        $auth->removeAll();
        $creator = $this->addRoleAndPermission(
            $this->creatorRoleName,
            'creatorPermission',
            'all',
            CreatorRule::class);
        $admin = $this->addRoleAndPermission(
            $this->adminRoleName,'adminPermission',
            'администрирование',
            AdminRule::class);
        $stat = $this->addRoleAndPermission(
            $this->statRoleName,'statPermission',
            'права на просмотр статистики',
            StatRule::class);
        $commentModer = $this->addRoleAndPermission($this->commentsRoleName,
            'commentsModerPermission',
            'права редактирования комментариев',
            CommentsModeratorRule::class);


        $auth->addChild( $creator, $admin );
        $auth->addChild( $admin, $stat );
        $auth->addChild( $admin, $commentModer );



        if (is_array($oldAssigns) ) {
            foreach ($oldAssigns as $oldAssign) {
                $auth->assign($auth->createRole($oldAssign['item_name']),$oldAssign['user_id']);
            }
        } else {
            $auth->assign($admin,1);
        }
    }




    private function addRoleAndPermission($roleName, $permissionName,$permissionDescription, $ruleClass)
    {
        $rule = new $ruleClass;
        $auth = \Yii::$app->authManager;
        $role = $auth->createRole ( $roleName );
        $auth->add( $role );
        $auth->add( $rule );
        $permission = $auth->createPermission($permissionName);
        $permission->description = $permissionDescription;
        $permission->ruleName = $rule->name;
        $auth->add( $permission );
        $auth->addChild( $role, $permission );
        return $role;
    }

//    public function actionAddUser($first_name, $last_name, $email, $password,$role=null)
//        //  php yii rbac/add-user John Doe q@g.com john
//    {
//        $user = new User();
//
//        $user->scenario = 'create';
//        $user->first_name = $first_name;
//        $user->last_name = $last_name;
//        $user->email = $email;
//        $user->setPassword($password);
//        $user->generateAuthKey();
//        $user->setAccessToken();
//        if ($user->save()) {
//            if ($role) {
//                $this->actionAssignRole($role,$user->id);
//            } else {
//                $this->actionAssignRole($this->userRoleName,$user->id);
//            }
//
//            return ExitCode::OK;
//        } else {
//            echo "Houston, we have a problem!\n";
//            return ExitCode::UNSPECIFIED_ERROR;
//        }
//    }

//    public function actionAssignRole ($roleName, $userId)
//        // php yii rbac/assign-role admin/user/shop id
//    {
//
//        $user = User::find()->where(['id'=>$userId])->one();
//        if (!$user) {
//            echo "Нет такого пользователя!\n";
//            return ExitCode::UNSPECIFIED_ERROR;
//        }
////        $assign = new RolesAssignment();
//        if (
//            $roleName != $this->adminRoleName and
//            $roleName != $this->creatorRoleName and
//            $roleName != $this->userRoleName and
//            $roleName != $this->shopRoleName
//        ) {
//            echo "not valid role!\n";
//            return ExitCode::UNSPECIFIED_ERROR;
//        }
//        $role = \Yii::$app->authManager->getRole($roleName);
//        if (!$role) {
//            echo "can't get role!\n";
//            return ExitCode::UNSPECIFIED_ERROR;
//        }
//
//        if (\Yii::$app->authManager->assign($role,$userId)) {
//            return ExitCode::OK;
//        } else {
//            echo "Houston, we have a problem!\n";
//            return ExitCode::UNSPECIFIED_ERROR;
//        }
//    }




}
