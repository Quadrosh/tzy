<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $city
 * @property string $from_page
 * @property string $phone
 * @property string $email
 * @property string $contacts
 * @property string $text
 * @property string $date
 * @property int $done
 *
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $emailForSend = 'quadrosh@gmail.com';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date',
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
            [['done','date'], 'integer'],
            [['text'], 'string'],
            [['quality'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 510],
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            ['utm_source', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_medium', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_campaign', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_term', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_content', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            [['user_id','name', 'city', 'from_page', 'phone', 'email', 'contacts'], 'string', 'max' => 255],
            [['name', 'phone'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Откуда',
            'city' => 'Куда',

            'utm_source' => 'UTM Source',
            'utm_medium' => 'UTM Medium',
            'utm_campaign' => 'UTM Campaign',
            'utm_term' => 'UTM Term',
            'utm_content' => 'UTM Content',

            'phone' => 'Телефон', // используется в верхней форме
            'email' => 'Email',

            'name' => 'Имя', // используется в верхней форме
            'contacts' => 'Вес',

            'text' => 'Комментарий',

            'from_page' => 'From Page',



            'date' => 'Дата',
            'done' => 'Done',
        ];
    }
    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($subject)
    {


        if ($GLOBALS['YII_APP_MODE']=='DEV') {
            $this->emailForSend = 'quadrosh@gmail.com';
        } elseif ($GLOBALS['YII_APP_MODE']=='PROD') {
            $this->emailForSend = 'transzakaz@gmail.com';
        }

        if ($subject == 'TSZAKAZ.RU: Запрос обратного звонка') {
            return Yii::$app->mailer->compose()
                ->setTo($this->emailForSend)
                ->setFrom('noreply@tszakaz.ru')
                ->setSubject($subject)
                ->setHtmlBody(
                    "Данные запроса <br>".
                    " <br/> Имя: ".$this->name .
                    " <br/> Телефон: ".$this->phone .
                    " <br/> Со страницы: ".$this->from_page
                )
                ->send();
        }
        if ($subject == 'TSZAKAZ.RU: Заявка на грузоперевозку') {
            return Yii::$app->mailer->compose()
                ->setTo($this->emailForSend)
                ->setFrom('noreply@tszakaz.ru')
                ->setSubject($subject)
                ->setHtmlBody(
                    "Данные запроса <br>".
                    " <br/> Со страницы: ".$this->from_page .
                    " <br/> Откуда: ".$this->user_id .
                    " <br/> Куда: ".$this->city .
                    " <br/> Телефон: ".$this->phone .
                    " <br/> Email: ".$this->email .
                    " <br/> Груз: ".$this->name .
                    " <br/> Вес: ".$this->contacts .
                    " <br/> Комментарий: <br/> " .
                    nl2br($this->text)
                )
                ->send();
        }

    }
}

