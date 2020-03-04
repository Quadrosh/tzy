<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
    public $emailForSend;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preorders';
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
            [['dispatch', 'destination', 'cargo', 'phone'], 'required'],
            [['text'], 'string'],
            [['done','date'], 'integer'],
            [['quality','site','manager','ip'], 'string', 'max' => 255],
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
            [['dispatch', 'destination', 'cargo', 'name', 'phone', 'email', 'weight', 'from_page'], 'string', 'max' => 255],
            // спам фильтры
            ['cargo', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['weight', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['text', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['email', 'match', 'not'=>true, 'pattern' => '/(prodawez395@gmail.com)/i'],

            ['text', 'match', 'not'=>true, 'pattern' => '/(sexy)/i'],
            ['cargo', 'match', 'not'=>true, 'pattern' => '/(file_links)/i'],
            ['weight', 'match', 'not'=>true, 'pattern' => '/(file_links)/i'],
            ['text', 'match', 'not'=>true, 'pattern' => '/(file_links)/i'],
            ['email', 'match', 'not'=>true, 'pattern' => '/(file_links)/i'],
            ['dispatch', 'match', 'not'=>true, 'pattern' => '/(file_links)/i'],
            ['destination', 'match', 'not'=>true, 'pattern' => '/(file_links)/i'],

            ['text', 'match', 'not'=>true, 'pattern' => '/(http)/i'],
            ['cargo', 'match', 'not'=>true, 'pattern' => '/(http)/i'],
            ['weight', 'match', 'not'=>true, 'pattern' => '/(http)/i'],
            ['text', 'match', 'not'=>true, 'pattern' => '/(http)/i'],
            ['dispatch', 'match', 'not'=>true, 'pattern' => '/(http)/i'],
            ['destination', 'match', 'not'=>true, 'pattern' => '/(http)/i'],

            ['text', 'match', 'not'=>true, 'pattern' => '/(www)/i'],
            ['cargo', 'match', 'not'=>true, 'pattern' => '/(www)/i'],
            ['weight', 'match', 'not'=>true, 'pattern' => '/(www)/i'],
            ['text', 'match', 'not'=>true, 'pattern' => '/(www)/i'],
            ['dispatch', 'match', 'not'=>true, 'pattern' => '/(www)/i'],
            ['destination', 'match', 'not'=>true, 'pattern' => '/(www)/i'],
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
            'utm_source' => 'UTM Source',
            'utm_medium' => 'UTM Medium',
            'utm_campaign' => 'UTM Campaign',
            'utm_term' => 'UTM Term',
            'utm_content' => 'UTM Content',
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


        if (mb_strtolower(YII_ENV)=='dev') {
            $this->emailForSend =  Yii::$app->params['devOrderEmail'];
        } elseif (mb_strtolower(YII_ENV)=='prod') {
            $this->emailForSend =  Yii::$app->params['prodOrderEmail'];
        }
        return Yii::$app->mailer->compose()
            ->setTo($this->emailForSend)
            ->setFrom('sender@'.Yii::$app->params['site'])
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (mb_strtolower(YII_ENV)!='dev') {
            Yii::$app->amo->send(
                Yii::$app->params['site'].': предзаказ'.PHP_EOL.
                " Откуда: ".$this->dispatch .PHP_EOL.
                " Куда: ".$this->destination .PHP_EOL.
                " Тел.: ".$this->phone .PHP_EOL.
                " Email: ".$this->email .PHP_EOL.
                " Груз: ".$this->cargo .PHP_EOL.
                " Вес: ".$this->weight .PHP_EOL.
                " Комментарий:" .PHP_EOL.
                nl2br($this->text).PHP_EOL.
                " Со страницы: ".$this->from_page .PHP_EOL

            );
        }
    }
}
