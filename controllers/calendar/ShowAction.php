<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 24.07.2019
 * Time: 12:23
 */

namespace app\controllers\calendar;


use app\base\BaseAction;

class ShowAction extends BaseAction
{
    public $classEntity;

    public function run(){

        $activity = new $this->classEntity();

        return $this->controller->render('show',['model'=>$activity]);
    }
}