<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupAdminForm extends Model
//class SignupAdminForm extends \yii\db\ActiveRecord
{
    public $username;
    public $password;

    private $_user = false;


    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'unique','message'=>'Имя занято, попробуйте другое.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',

        ];
    }



    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function signupAdmin($userId)
    {
        if ($this->validate()) {
            $user = User::findOne($userId);
            $user->setPassword($this->password);
            $user->removePasswordResetToken();
            $user->username = $this->username;
            $user->status = User::STATUS_ACTIVE;
            if ($user->save()) {
                return true;
            } else {
//                var_dump($user->errors);die;
                return false;
            }
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public static function find()
    {
        return Yii::createObject(ActiveQuery::className(), ['common\models\User']);
    }
}
