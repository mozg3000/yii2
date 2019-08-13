<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 12.08.2019
 * Time: 13:45
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\users\CabinetAction;
use app\models\User;
use app\models\Users;

class UserController extends BaseController
{
    public function actions()
    {
        return ['cabinet' => ['class' => CabinetAction::class]];
    }
}