<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 25.07.2019
 * Time: 16:06
 */

namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\Activity;
use yii\web\HttpException;

class ShowAction extends BaseAction
{
    public $classEntity;

    public function run($id){

        $model = Activity::find()->andWhere(['id'=>$id])->one();
        if(!$model){

            throw new HttpException(404, 'Activity not found');
        }
//        return var_dump(\Yii::$app->rbac->canChangeActivity($model));
        if(!\Yii::$app->rbac->canChangeActivity($model)){

            throw new HttpException(403, 'Not permit');
        }
//        $activity = \Yii::$app->activity->getEntity();
//
//        $activity->title = "Супер пупер дело";
//        $activity->description = "Какая-то из активностей в этот день";
//        $activity->startday = "12.12.2012";
//        $activity->responsible = "You";
//        $activity->deadline = "12.12.2012";
//        $activity->useNotification = true;
//return var_dump($model->useNotification);
        return $this->controller->render('view',['model'=>$model]);
    }
}