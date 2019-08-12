<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 12.08.2019
 * Time: 10:38
 */

namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;

class NotificationController extends Controller
{
    public $name;

    public function options($actionID)
    {
        print_r($actionID);

        return [
            'name'
        ];
    }

    public function actionTest(){

        echo 'this console controller'.PHP_EOL;
        echo $this->name.PHP_EOL;
    }

    public function actionSendToday(){

        $activities = \Yii::$app->activity->getActiveActivityTodayNotification();

        echo count($activities).PHP_EOL;

        $notification = \Yii::createObject(['class' => NotificationComponent::class, 'mailer' => \Yii::$app->mailer]);
        $notification->sendNotificationToActivity($activities);

    }
}