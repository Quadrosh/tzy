<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "front_user".
 *
 * @property integer $id
 * @property string $site
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property string $address
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class FrontUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const REMEMBER_USER_TIME = 3600*24*30*12;
    public $password;

    public $role;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'front_user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site', 'username', 'auth_key', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['site', 'username', 'password_hash', 'password_reset_token', 'email', 'phone', 'city', 'country'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['address'], 'string', 'max' => 1000],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
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
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'country' => 'Country',
            'address' => 'Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id,
            'status' => self::STATUS_ACTIVE
        ]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne([
            'auth_key' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByEmail($email){
        return self::findOne([
            'email'=>$email,
            'site'=>Yii::$app->params['site'],
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function create($email,$username){
        $user = new FrontUser();
        $user->username = $username;
        $user->email = $email;
        $user->site = Yii::$app->params['site'];
        $user->generateAuthKey();
        $user->save();
        return Yii::$app->user->login($user, self::REMEMBER_USER_TIME);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
