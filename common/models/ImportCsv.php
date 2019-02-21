<?php

namespace common\models;

use yii\base\Action;
use yii\base\Model;
use yii\web\HttpException;
use yii\web\UploadedFile;
use Yii;

class ImportCsv  extends Model
{
    const TYPE_CITY_PRICE_CALC = 'cityPriceCalc';
    const TYPE_PRICE = 'price';

    /**
     * @var $file UploadedFile
     */
    public $file;


    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'csv,CSV'],
        ];
    }

    public function import($type)
    {
        if ($type == self::TYPE_PRICE) {
            $res = [];
            $fileName = $this->file->baseName .'.' . $this->file->extension;
            $tempPath = "img/{$fileName}";
            if ($this->file->saveAs($tempPath)) {
                $names=[];
                $strArr = array_map('str_getcsv', file($tempPath));
                unlink($tempPath);
                $i=0;
                foreach ($strArr as $line) {
                    $i++;
                    if ($line[0]=='from'||$line[0]=='Откуда') {
                        foreach ($line as $col) {
                            $names[]=$col;
                        }

                    } else {
                        $price = new Price();
                        $price->from_city_id = $this->getObjectId(City::class,$line[array_search('from', $names)],$i);
                        if (!$price->from_city_id) return false;
                        $price->to_city_id = $this->getObjectId(City::class,$line[array_search('to', $names)],$i);
                        if (!$price->to_city_id) return false;
                        $price->truck_id = $this->getObjectId(Truck::class,$line[array_search('truck', $names)],$i);
                        if (!$price->truck_id) return false;
                        $price->distance = $this->getNumberValue($line[array_search('distance', $names)],$i);
                        if (!$price->distance) return false;
                        $price->price = $this->getNumberValue($line[array_search('price', $names)],$i);
                        if (!$price->price) return false;
                        $price->shipment_type = 'full';
                        $oldPrice = Price::find()->where([
                            'from_city_id'=>$price->from_city_id,
                            'to_city_id'=>$price->to_city_id,
                            'truck_id'=>$price->truck_id,
                            'shipment_type'=>$price->shipment_type,
                        ])->one();
                        if ($oldPrice) {
                            Yii::$app->session->setFlash('error', 'Запись с данными "'.
                                'Из '.$line[array_search('from', $names)].
                                ' в '.$line[array_search('to', $names)].
                                ', машина '.$line[array_search('truck', $names)].
                                ', цена '.$line[array_search('price', $names)].
                            '" - уже существует, доступна загрузка только новых данных.'
                            );
                            return false;
                        }

                        $res[] = $price;
                    }
                }
                foreach ($res as $price) {
                    $price->save();
                }
                return true;
            } else {
                throw new HttpException('Ошибка загрузки файла');
            }

        }

        // CITY PRICE CALC
        if ($type == self::TYPE_CITY_PRICE_CALC) {
            $res = [];
            $fileName = $this->file->baseName .'.' . $this->file->extension;
            $tempPath = "img/{$fileName}";
            if ($this->file->saveAs($tempPath)) {
                $names=[];
                $strArr = array_map('str_getcsv', file($tempPath));
                unlink($tempPath);
                $i=0;
                foreach ($strArr as $line) {
                    $i++;
                    if ($line[0]=='city') { // заголовки
                        foreach ($line as $col) {
                            $names[]=$col;
                        }
                    } else {
                        $price = new CityPriceCalc();
                        foreach ($line as $key => $col) {
                            $colname = $names[$key];
                            $price->$colname = $col;
                        }

                        $res[] = $price;
                    }
                }
                foreach ($res as $price) {
                    $price->save();
                }
                return true;
            } else {
                throw new HttpException('Ошибка загрузки файла');
            }

        }

    }

    private function getObjectId($type,$sting,$i){

        $object = $type::find()->where(['name'=>trim($sting)])->one();
        if (!$object) {
            Yii::$app->session->setFlash('error', 'В строке "'.$i.'" не распознан объект"'.$sting.'". Все объекты (города и кузовы) должны уже быть в базе до импорта файла');
            return false;
        } else {
            return $object->id;
        }
    }

    private function getNumberValue($value,$i){

        $number = intval($value);
        if (!$number) {
            Yii::$app->session->setFlash('error', 'В строке "'.$i.'" не распознано число"'.$value.'". Расстояние и цены должны быть числовыми значениями');
            return false;
        } else {
            return $number;
        }
    }


}