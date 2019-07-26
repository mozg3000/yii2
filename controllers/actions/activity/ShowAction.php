<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 25.07.2019
 * Time: 16:06
 */

namespace app\controllers\actions\activity;


use app\base\BaseAction;

class ShowAction extends BaseAction
{
    public $classEntity;

    public function run(){


        $activity = \Yii::$app->activity->getEntity();

        $activity->title = "Супер пупер дело";
        $activity->description = "Какая-то из активностей в этот день";
        $activity->startday = "12.12.2012";
        $activity->responsible = "You";
        $activity->deadline = "12.12.2012";
        $activity->useNotification = true;

        return $this->controller->render('view',['model'=>$activity]);
    }
}