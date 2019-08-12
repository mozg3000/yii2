<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 05.08.2019
 * Time: 10:53
 */

namespace app\controllers\actions\admin;


use app\base\BaseAction;
use app\models\Users;
use yii\web\HttpException;

class UsersAction extends BaseAction
{

    public $classEntity;

    public function run(){

        if(!\Yii::$app->rbac->canAdmin()){

            throw  new HttpException(403, 'Not Permitted');
        }
        $model = Users::find()->all();

        return $this->controller->render('users', ['model' => $model]);
    }
}