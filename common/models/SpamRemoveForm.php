<?php

namespace common\models;

use backend\controllers\ImagefilesController;
use yii\base\Action;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use common\models\Imagefiles;

class SpamRemoveForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $modelName;
    public $value;
    public $property;

    public function rules()
    {
        return [
            [['modelName','value','property', ], 'string'],
        ];
    }

    public function remove()
    {
        if ($this->modelName == 'preorder') {
            $spamItems = Preorders::find()->where([$this->property => $this->value])->all();
        }
        elseif ($this->modelName == 'feedback') {
            $spamItems = Feedback::find()->where([$this->property => $this->value])->all();
        }
        else {
            Yii::$app->session->setFlash('error', 'непонятно что делать, $this->modelName = '.$this->modelName);
            return false;
        }
            $iter = 0;
            foreach ($spamItems as $item) {
                $item->delete();
                $iter++;
            }
            if ($iter > 0) {
                Yii::$app->session->setFlash('success', 'Удалено '. $iter. ' объектов.');
                return true;
            } else {
                Yii::$app->session->setFlash('error', 'Не нашлось что удалять');
                return false;
            }


    }







}