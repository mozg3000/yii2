<?php

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\activity\CreateAction;
use app\controllers\actions\activity\ShowAllAction;
use app\models\Activity;
use app\controllers\actions\activity\ShowAction;
use app\controllers\actions\activity\EditAction;
use app\models\Users;

class ActivityController extends BaseController
{
    public function actions()
    {
        return ['create'=>['class'=>CreateAction::class,'classEntity'=>Activity::class],
            'show'=> ['class'=>ShowAction::class,'classEntity'=>Activity::class],
            'edit' => ['class'=>EditAction::class,'classEntity'=>Activity::class],
            'showall' => ['class' => ShowAllAction::class, 'classEntity' => Users::class]];
    }

//    public function actionCreate(){
//
//        return "OK";
//    }
}