<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 24.07.2019
 * Time: 11:42
 */

namespace app\models\validations;

use yii\validators\Validator;

class TitleValidation extends Validator
{
    public $list;
    public function validateAttribute($model, $attribute)
    {
        if(in_array($model->$attribute,$this->list)){
            $model->addError($attribute,'Запрещенно название события');
        }
    }
}