<?php

namespace common\models;

use backend\controllers\ImagefilesController;
use yii\base\Action;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use common\models\Imagefiles;

class InviteForm  extends Model
{

    public $email;
    public $role;


    public function rules()
    {
        return [
            [['email'], 'email'],
            [['email'], 'required'],
            [['role'], 'string'],
        ];
    }

    public function send($email)
    {
        if ($this->validate()) {

        }
    }





}