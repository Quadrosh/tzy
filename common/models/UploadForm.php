<?php

namespace common\models;

use backend\controllers\ImagefilesController;
use yii\base\Action;
use yii\base\Model;
use yii\helpers\Json;
use yii\web\UploadedFile;
use Yii;
use common\models\Imagefiles;

class UploadForm  extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $jsonFile;
    public $toModelId;
    public $toModelProperty;

    public function rules()
    {
        return [
            [['imageFile'],
                'file',
                'skipOnEmpty' => true,
                'extensions' => 'svg,png,jpg',
                'checkExtensionByMimeType' => false
            ],
            [['jsonFile'],
                'file',
                'skipOnEmpty' => true,
                'extensions' => 'json'
            ],
        ];
    }

    public function upload($fileName=null, $replace=null)
    {
        $imageListItem = new Imagefiles();
        if ($fileName) {
            $fileName = $fileName .'.' . $this->imageFile->extension;
        } else {
            $fileName = $this->imageFile->baseName .'.' . $this->imageFile->extension;
        }

        if ($this->validate() && $imageListItem->addNew($fileName,$replace)) {
            if ($this->imageFile->saveAs('img/' . $fileName)) {
                return true;
            } else {
                Yii::$app->session->addFlash('error', Json::encode($this->errors));
                Yii::error([
                    'action'=> 'uploadForm  $this->imageFile->saveAs',
                    '$this->errors'=>$this->errors,
                ]);
                return false;
            }
        } else {
            Yii::$app->session->addFlash('error', Json::encode($this->errors));
            Yii::error([
                'action'=> 'uploadForm  $this->validate() && $imageListItem->addNew',
                '$this->errors'=>$this->errors,
            ]);
            return false;
        }
    }

    public function change($filename)
    {
        if ($this->validate()) {
            if ($this->imageFile->saveAs(Yii::$app->basePath . '/web/img/' . $filename)) {
                return true;
            } else {
                return false;
            }
        }
    }

//    public function tempJsonFileUpload($fileName=null)
//    {
//
//        if ($this->validate()) {
//            if ($fileName) {
//                $res = $this->jsonFile->saveAs('@webroot/' . $fileName);
//            } else {
//                $res = $this->jsonFile->saveAs('@webroot/temp.json' );
//            }
//
//            if ($res) {
//                return true;
//            } else {
//                return false;
//            }
//
//        }
//    }





}