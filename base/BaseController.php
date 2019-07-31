<?php

namespace app\base;

use yii\web\Controller;
use yii\web\HttpException;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){

            throw new HttpException(401, 'You need to be auth');
        }

        return parent::beforeAction($action);
    }
}