<?php

namespace common\models;

use backend\controllers\ImagefilesController;
use yii\base\Action;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use common\models\Imagefiles;

class UploadForm  extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $toModelId;
    public $toModelProperty;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, svg'],
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
                return false;
            }
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





}