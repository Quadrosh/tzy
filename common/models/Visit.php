<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property string $ip
 * @property string $city
 * @property string $url
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $utm_term
 * @property string $utm_content
 * @property string $comment
 * @property int $created_at
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit';
    }

    public function behaviors()
    {
        return [
            'timestamp'  => [
                'class' => TimestampBehavior::className(),
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
            [['created_at','qnt'], 'integer'],
            [['ip'], 'string', 'max' => 100],
            [['city', 'url', 'comment', 'lp_hrurl', 'site'], 'string', 'max' => 255],
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string', 'max' => 510],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'site' => 'Site',
            'city' => 'City',
            'url' => 'Url',
            'qnt' => 'Qnt',
            'utm_source' => 'Utm Source',
            'utm_medium' => 'Utm Medium',
            'utm_campaign' => 'Utm Campaign',
            'utm_term' => 'Utm Term',
            'utm_content' => 'Utm Content',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }


    public static function getUtm($key)
    {
        if (Yii::$app->request->get($key)) {
            return Yii::$app->request->get($key);
        } else {
            if (isset(Yii::$app->session[$key])) {
                return Yii::$app->session[$key];
            } else {
                return null;
            }
        }
    }

    public static function setUtmVisit()
    {
        $keys = ['utm_source','utm_medium','utm_campaign','utm_term','utm_content'];
        $visit = new self;
        foreach ($keys as $key) {
            if ( Yii::$app->request->get($key)) {
                $value = Yii::$app->request->get($key);
                Yii::$app->session[$key] = $value;
                $visit[$key]=$value;
            }
        }

        if (!isset(Yii::$app->session['visited'])) {
            $visit['ip'] = Yii::$app->request->userIP;
            $visit['site'] = Yii::$app->params['site'];
            $visit['lp_hrurl'] = '';
            $visit['url'] = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            $visit['qnt']=1;
            $visit->save();
            Yii::$app->session['visited'] = true;
        }

    }


    public static function setVisitAndGetUtm()
    {
        $utm = [];
        $session = Yii::$app->session;

        if (Yii::$app->request->get('utm_source')) {
            // UTM из GET
            $utm['source'] = Yii::$app->request->get('utm_source');
            $utm['medium'] = Yii::$app->request->get('utm_medium');
            $utm['campaign'] = Yii::$app->request->get('utm_campaign');
            $utm['term'] = Yii::$app->request->get('utm_term');
            $utm['content'] = Yii::$app->request->get('utm_content');

            // сохранение в сессию
            if (Yii::$app->request->get('utm_source')!= null) {
                $session['utm_source'] = $utm['source'];
                $session['utm_medium'] = $utm['medium'];
                $session['utm_campaign'] = $utm['campaign'];
                $session['utm_term'] = $utm['term'];
                $session['utm_content'] = $utm['content'];
            }
        } else {
            if ($session['utm_source']) {
                $utm['source'] = $session['utm_source'];
                $utm['medium'] = $session['utm_medium'];
                $utm['campaign'] = $session['utm_campaign'];
                $utm['term'] = $session['utm_term'];
                $utm['content'] = $session['utm_content'];
            } else { // если там что то есть
                $utm['source'] = Yii::$app->request->get('utm_source');
                $utm['medium'] = Yii::$app->request->get('utm_medium');
                $utm['campaign'] = Yii::$app->request->get('utm_campaign');
                $utm['term'] = Yii::$app->request->get('utm_term');
                $utm['content'] = Yii::$app->request->get('utm_content');
            }
        }

        //сохр визита в статистику
        $visit = new Visit();
        $visit['ip'] = Yii::$app->request->userIP;
        $visit['site'] = Yii::$app->params['site'];
        $visit['lp_hrurl'] = '';
        $visit['url'] = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $visit['utm_source']=$utm['source'];
        $visit['utm_medium']=$utm['medium'];
        $visit['utm_campaign']=$utm['campaign'];
        $visit['utm_term']=$utm['term'];
        $visit['utm_content']=$utm['content'];
        $visit['qnt']=1;
        $visit->save();

        return $utm;

    }
}
