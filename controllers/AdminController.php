<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 05.08.2019
 * Time: 10:10
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\admin\UsersAction;
use app\controllers\actions\admin\ViewAction;
use app\models\Users;

class AdminController extends BaseController
{
    public function actions()
    {
        return ['view'=>['class'=>ViewAction::class],
                'users'=>['class'=>UsersAction::class, 'classEntity' => UsersAction::class]];
    }

}