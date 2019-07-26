<?php

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\activity\CreateAction;
use app\models\Activity;
use app\controllers\actions\activity\ShowAction;
use app\controllers\actions\activity\EditAction;

class ActivityController extends BaseController
{
    public function actions()
    {
        return ['create'=>['class'=>CreateAction::class,'classEntity'=>Activity::class],
            'show'=> ['class'=>ShowAction::class,'classEntity'=>Activity::class],
            'edit' => ['class'=>EditAction::class,'classEntity'=>Activity::class]];
    }
}