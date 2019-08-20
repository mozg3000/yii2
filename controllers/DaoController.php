<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 29.07.2019
 * Time: 10:48
 */

namespace app\controllers;


use app\base\BaseController;
use yii\filters\PageCache;

class DaoController extends BaseController
{

    public function behaviors()
    {
        return [
            [
                'class' => PageCache::class,
                 'duration' => 10,
                 'only' => ['index']
            ]
        ];
    }


    public function actionIndex(){

        $dao = \Yii::$app->dao;

        $users = $dao->getUsers();
        $activities = $dao->getUserActivities(1);
        $firstActivity = $dao->getFirstActivity();
        $count = $dao->getActivityCount();
        $auth = $dao->validatePassword('test@email.dom','dghdsfth');
        $email = $dao->findUser(1);
        $userActivities = $dao->findUserActivities(1);

        return $this->render('index', [
            'users' => $users,
            'activities' => $activities,
            'firstActivity' => $firstActivity,
            'count' => $count,
            'auth' => $auth,
            'email' => $email,
            'userActivities' => $userActivities
        ]);
    }
    public function actionCache(){

        \Yii::$app->cache->set('tst', 'value');

        $val = \Yii::$app->cache->get('tst');

        echo $val;
    }

}