<?php
namespace common\components;


use Yii;
use yii\base\Component;
use yii\base\Exception;
use yii\base\InvalidConfigException;

class Amo extends Component
{

    public function send($text)
    {

        $url='https://'.Yii::$app->params['amo']['subdomain']
            .'.amocrm.ru/api/v2/tasks?USER_LOGIN='.Yii::$app->params['amo']['login']
            .'&USER_HASH='.Yii::$app->params['amo']['hash'];

        $tasks=[];
        $tasks['add']=[
            [
                'complete_till_at'=>time() + 1*60*60,
                'task_type'=>1,
                'text'=>$text,
                'created_at'=> time(),
                'updated_at'=> time(),
                'responsible_user_id'=>Yii::$app->params['amo']['user1Id'],
                'created_by'=>Yii::$app->params['amo']['user1Id'],
            ],
        ];

        $curl=curl_init();

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); // return web page
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($tasks));
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl,CURLOPT_HEADER,false); // don't return headers
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl);
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);


        $code=(int)$code;
        $errors=array(
            301=>'Moved permanently',
            400=>'Bad request',
            401=>'Unauthorized',
            403=>'Forbidden',
            404=>'Not found',
            500=>'Internal server error',
            502=>'Bad gateway',
            503=>'Service unavailable'
        );
        try
        {
            #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
            if($code!=200 && $code!=204){
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
//                Yii::$app->session->setFlash('error', 'Во время отправки задачи произошла ошибка, попробуйте еще раз.');

            }

        }
        catch(Exception $E)
        {
            Yii::$app->session->setFlash('error', 'Во время отправки задачи произошла ошибка. Попробуйте еще раз или позвоните нам по телефону.'.PHP_EOL.
                'Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode() . json_encode(curl_error($curl)) );
//            die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
        }

        return $out;

    }

}