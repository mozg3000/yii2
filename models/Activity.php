<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 21.07.2019
 * Time: 15:45
 */

namespace app\models;

use app\models\validations\TitleValidation;
use app\base\BaseModel;
use yii\base\Model;

class Activity extends ActivityBase
{
//    public $title;
//    public $description;
//    public $startday;
    public $responsible;
//    public $deadline;
    public $isIterated;
    public $iteratedType;
//    public $email;
    public $emailRepeat;
    public $image;
//    public $useNotification;
//    public $isBlocked;
    const REPEAT_TYPE=[
        0=>'Каждый день',
        1=>'Каждую неделю'
    ];
    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y', $this->deadline);
        if ($date) {
            $this->deadline = $date->format('Y-m-d');
        }
        $date = \DateTime::createFromFormat('d.m.Y', $this->startday);
        if ($date) {
            $this->startday = $date->format('Y-m-d');
        }
        return parent::beforeValidate();
    }
    public function rules()
    {
        return array_merge([
            [['title', 'email'], 'trim'],
            ['image','file','extensions' => ['jpg','png']],
            [['deadline','startday'], 'date', 'format' => 'php:Y-m-d'],
            [['responsible', 'deadline'], 'string'],
            [['isIterated', 'isBlocked', 'useNotification'], 'boolean'],
            [['email','emailRepeat'], 'email'],
            [['email','emailRepeat'], 'required', 'when' => function (Activity $model) {
                return $model->useNotification ? true : false;
            }],
            ['iteratedType','in','range' => array_keys(self::REPEAT_TYPE)],
            ['emailRepeat','compare','compareAttribute' => 'email'],
            ['deadline', 'default', 'value' => function($model){
                return $model->startday;
            }],
//            ['deadline', 'compare', 'compareValue' => 'startday', 'operator' => '>=', 'type' => 'date'],
//            ['deadline', 'compare', 'compareValue' => 'startday', 'operator' => '<=', 'type' => 'date']
        ],
            parent::rules());
    }
    public function titleValidate($attr){
        if($this->title=='admin'){
            $this->addError('title','Запрещенно название события');
        }
    }
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'startday' => 'Начало',
            'responsible' => 'Ответственный',
            'deadline' => 'Дедлайн',
            'email'=>'email',
            'emailRepeat'=>'email повторно',
            'isIterated' => 'Повторяется',
            'isBlocked' => 'Сделать единственным событием за день',
            'useNotification'=>'Напомнить по email'
        ];
    }
}