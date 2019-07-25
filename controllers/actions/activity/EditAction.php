<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 25.07.2019
 * Time: 17:18
 */

namespace app\controllers\actions\activity;


use app\base\BaseAction;
use yii\widgets\ActiveForm;

class EditAction extends BaseAction
{
    public $classEntity;

    public function run(){

//        $activityComponent = Yii::createObject(['class' => ActivityComponent::class,
//            'classEntity' => Activity::class]);

        $activity = \Yii::$app->activity->getEntity();


        return $this->controller->render('edit',['model'=>$activity]);
    }
}