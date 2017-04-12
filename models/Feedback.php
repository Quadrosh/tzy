<?php

namespace app\models;

use Yii;

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
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'done'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['user_id','name', 'city', 'from_page', 'phone', 'email', 'contacts'], 'string', 'max' => 255],
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
        if ($subject == 'TSZAKAZ.RU: Запрос обратного звонка') {
            return Yii::$app->mailer->compose()
//                ->setTo('quadrosh@gmail.com')
                ->setTo('transzakaz@gmail.com')
                ->setFrom('noreply@tszakaz.ru')
                ->setSubject($subject)
//            ->setTextBody(" Имя: ".$this->name ." Со страницы: ".$this->from_page ." Город: ".$this->city ." Телефон: ".$this->phone ." Email: ".$this->email ." Контакты: ".$this->contacts ." Текст: ".$this->text)
                ->setHtmlBody(
                    "Данные запроса <br>".
                    " <br/> Имя: ".$this->name .
                    " <br/> Телефон: ".$this->phone .
                    " <br/> Со страницы: ".$this->from_page
//                " <br/> Город: ".$this->city .
//                " <br/> Email: ".$this->email .
//                " <br/> доп. инфо: " . $this->contacts .
//                " <br/> Комментарий: <br/> " .
//                nl2br($this->text)
                )
                ->send();
        }
        if ($subject == 'TSZAKAZ.RU: Заявка на грузоперевозку') {
            return Yii::$app->mailer->compose()
//                ->setTo('quadrosh@gmail.com')
                ->setTo('transzakaz@gmail.com')
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

