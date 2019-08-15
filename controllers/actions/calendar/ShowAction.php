<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 24.07.2019
 * Time: 12:23
 */

namespace app\controllers\actions\calendar;


use app\base\BaseAction;
use app\models\Activity;
use DateTimeImmutable;

class ShowAction extends BaseAction
{
    public $classEntity;

    public function run($year = null, $month = null){

        //$show = new $this->classEntity();
        $user_id = \Yii::$app->user->getId();

//        echo is_null($month); exit;

        if(is_null($year)){

            $year = date("Y", time());
        }
        if(is_null($month)){

            $month = date("m", time());
        }else{
//            if($month<0){
//                $month = "12";
//            }
//            if($month<10){
//                $month = "0" . $month;
//            }
        }
//        echo  $month; exit;
        $date = new dateTimeImmutable($year . $month . '01');
//print_r($date->format('Y-m-d'));exit;

        $model = Activity::find()
                                ->select(['id','startday', 'title'])

                                ->andWhere('user_id=:user_id', [':user_id' => $user_id])
                                ->distinct()
//                                ->groupBy(['startday'])
                                ->andWhere('month(startday)>=:month',[':month' => $date->format('m')])
                                ->andWhere('month(startday)<=:month',[':month' => $date->format('m')])
                                ->all();
//print_r($model);exit();
//        $model = $model?
        return $this->controller->render('show',['model'=>$model, 'date' => $date]);
    }
}