<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 12.08.2019
 * Time: 11:26
 */

namespace app\components;


use yii\base\Component;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /**
     * @var MailerInterface
     */
    public $mailer;

    public function sendNotificationToActivity(array $activities){

        foreach ($activities as $activity){

            $ok = $this->mailer->compose('notification', ['model' => $activity])
                        -> setSubject('Событие стартует сегодня')
                        -> setFrom('geekbrains@onedeveloper.ru')
                        -> setTo($activity->email)
                        ->send();

            if ($ok){

                echo 'Письмо отправлено' . $activity->email.PHP_EOL;
            }else{

                echo 'Ошибка отправки письма ' . $activity->email.PHP_EOL;
            }
        }
    }
    public function sendNotificationToUser($activities){

//print_r($activities);exit();

        if($activities){

            $ok = $this->mailer->compose('user_notification', ['model' => $activities])
                -> setSubject('События запланированные на 
                сегодня')
                -> setFrom('geekbrains@onedeveloper.ru')
                -> setTo($activities[0]->email)
                ->send();

            if ($ok){

                echo 'Письмо отправлено' . $activities[0]->email.PHP_EOL;
            }else{

                echo 'Ошибка отправки письма ' . $activities[0]->email.PHP_EOL;
            }
        }

    }
}