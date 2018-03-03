<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Filter form
 */
class FilterForm extends Model
{
    public $manager;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'manager',
                'status',
            ], 'string'],
        ];
    }




}
