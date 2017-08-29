<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preorders".
 *
 * @property int $id
 * @property string $dispatch
 * @property string $destination
 * @property string $cargo
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $weight
 * @property string $text
 * @property string $from_page
 * @property string $date
 * @property int $done
 */
class Preorders extends \yii\db\ActiveRecord
{
    public $emailForSend = 'quadrosh@gmail.com';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preorders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dispatch', 'destination', 'cargo', 'phone'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['done'], 'integer'],
            [['dispatch', 'destination', 'cargo', 'name', 'phone', 'email', 'weight', 'from_page'], 'string', 'max' => 255],
            ['cargo', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['weight', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['text', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['email', 'match', 'not'=>true, 'pattern' => '/(prodawez395@gmail.com)/i'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dispatch' => 'Откуда',
            'destination' => 'Куда',
            'cargo' => 'Груз',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'weight' => 'Вес',
            'text' => 'Комментарий',
            'from_page' => 'From Page',
            'date' => 'Дата',
            'done' => 'Done',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
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
        return Yii::$app->mailer->compose()
            ->setTo($this->emailForSend)
            ->setFrom('noreply@tszakaz.ru')
            ->setSubject($subject)
            ->setHtmlBody(
                "Данные запроса <br>".
                " <br/> Со страницы: ".$this->from_page .
                " <br/> Откуда: ".$this->dispatch .
                " <br/> Куда: ".$this->destination .
                " <br/> Телефон: ".$this->phone .
                " <br/> Email: ".$this->email .
                " <br/> Груз: ".$this->cargo .
                " <br/> Вес: ".$this->weight .
                " <br/> Комментарий: <br/> " .
                nl2br($this->text)
            )
            ->send();


    }
}
