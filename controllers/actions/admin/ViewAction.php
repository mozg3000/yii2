<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 05.08.2019
 * Time: 10:12
 */

namespace app\controllers\actions\admin;


use app\base\BaseAction;
use yii\web\HttpException;

class ViewAction extends BaseAction
{

    public function run(){


//        print_r(\Yii::$app->user->getIdentity()->id);exit;

        if (\Yii::$app->rbac->canAdmin()) {

            return $this->controller->render('view');
        }
        throw new HttpException(403, 'Not Permitted');
    }
}