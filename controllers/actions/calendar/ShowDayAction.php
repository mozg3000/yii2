<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 25.07.2019
 * Time: 13:39
 */

namespace app\controllers\actions\calendar;


use app\base\BaseAction;
use app\models\Activity;

class ShowDayAction extends BaseAction
{
    public $classEntity;

    public function run(){

        $activities = [];
        for ($i=0; $i<10;$i++){
            $a = new Activity();
            $a->title = 'Какое то очень умное дело' . " $i";
            array_push($activities,$a);
        }
        $show = new $this->classEntity( "12.12.2012", $activities);

//        $show->date = "12.12.2012";

        return $this->controller->render('showDay',['model'=>$show]);
    }
}