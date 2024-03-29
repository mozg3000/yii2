<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 24.07.2019
 * Time: 12:20
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\calendar\ShowAction;
use app\models\Activity;
use app\models\calendar\Show;


class CalendarController extends BaseController
{
    public function actions()
    {
        return ['show'=>['class'=>ShowAction::class]];
    }
}