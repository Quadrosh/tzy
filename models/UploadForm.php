<?php

namespace app\models;

use app\modules\admin\controllers\ImagefilesController;
use yii\base\Action;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use app\models\Imagefiles;

class UploadForm extends Model
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

    public function upload()
    {
        \Tinify\setKey("jTlTDnTRucf5k1bK87U_VVEUTTDtTnxe");
        $imageListItem = new Imagefiles();
//        $imagefile->addNew($this->imageFile->baseName .'.' . $this->imageFile->extension);
        $fileName = $this->imageFile->baseName .'.' . $this->imageFile->extension;

        if ($this->validate() && $imageListItem->addNew($fileName)) {
            if ($this->imageFile->saveAs('img/tmp-' . $fileName)) {
                $tinify = \Tinify\fromFile(Yii::getAlias('@webroot/img/tmp-'.$fileName));
                $tinify->toFile(Yii::getAlias('@webroot/img/' . $fileName));
                unlink(Yii::getAlias('@webroot/img/tmp-'.$fileName));
                return true;
            } else {
                return false;
            }
        }
    }

    public function change($filename)
    {
        \Tinify\setKey("jTlTDnTRucf5k1bK87U_VVEUTTDtTnxe");
        if ($this->validate()) {
            if ($this->imageFile->saveAs(Yii::$app->basePath . '/web/img/tmp-' . $filename)) {
                $tinify = \Tinify\fromFile(Yii::getAlias('@webroot/img/tmp-'. $filename));
                $tinify->toFile(Yii::getAlias('@webroot/img/' . $filename));
                unlink(Yii::getAlias('@webroot/img/tmp-'. $filename));
                return true;
            } else {
                return false;
            }
        }
    }





}