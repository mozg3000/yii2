<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 25.07.2019
 * Time: 17:18
 */

namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\Activity;
use yii\widgets\ActiveForm;

class EditAction extends BaseAction
{
    public $classEntity;

    public function run($id){

//        $activityComponent = Yii::createObject(['class' => ActivityComponent::class,
//            'classEntity' => Activity::class]);

//        $activity = \Yii::$app->activity->getEntity();
//
//        if(\Yii::$app->request->isGet){
//
//            $activity = new Activity();
//            $activity->title = \Yii::$app->request->get('title');
//            $activity->startday = \Yii::$app->request->get('startday');
//            $activity->deadline = \Yii::$app->request->get('deadline');
//            $activity->responsible = \Yii::$app->request->get('responsible');
//            $activity->description = \Yii::$app->request->get('description');
//        }
        $activity = Activity::find()->andWhere('id=:id',[':id'=>$id])
                                    ->one();

        if(\Yii::$app->request->isPost){
            $activity->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($activity);
            }
            $response = $activity->save();
//            return var_dump($response);
            if($response){

                return $this->controller->redirect("/single/day?startday=$activity->startday");
            }

        }
        return $this->controller->render('edit',['model'=>$activity]);
    }
}