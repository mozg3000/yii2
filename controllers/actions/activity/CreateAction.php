<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 21.07.2019
 * Time: 15:00
 */

namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\components\ActivityComponent;
use app\models\Activity;
//use yii\bootstrap\ActiveForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

class CreateAction extends BaseAction
{
    public $classEntity;

    public function run(){

//        $activityComponent = Yii::createObject(['class' => ActivityComponent::class,
//            'classEntity' => Activity::class]);

        $activity = \Yii::$app->activity->getEntity();

        if(\Yii::$app->request->isPost){
            $activity->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($activity);
            }

            if(\Yii::$app->activity->createActivity($activity)){

            }
        }

        return $this->controller->render('create',['model'=>$activity]);
    }
}