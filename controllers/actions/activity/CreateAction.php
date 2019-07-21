<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 21.07.2019
 * Time: 15:00
 */

namespace app\controllers\actions\activity;


use app\base\BaseAction;

class CreateAction extends BaseAction
{
    public $classEntity;

    public function run(){

        $activity = new $this->classEntity();

        return $this->controller->render('create',['model'=>$activity]);
    }
}