<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 30.07.2019
 * Time: 17:14
 */

namespace app\components;


use app\models\Activity;
use app\rules\OwnerActivityRule;
use yii\base\Component;

class RbacComponent extends Component
{

    public function getAuthManager(){

        return \Yii::$app->authManager;
    }
    public function genRbac(){

        $authManadger = $this->getAuthManager();
//        $authManadger->removeAll();

        $admin = $authManadger->createRole('admin');
        $admin->description = 'Роль админа';
        $authManadger->add($admin);

        $user = $authManadger->createRole('user');
        $user->description = 'Роль пользователя';
        $authManadger->add($user);
        $createActivity = $authManadger->createPermission('createActivity');
        $createActivity->description = 'Создание активностей';
        $authManadger->add($createActivity);

        $viewOwnerActivity = $authManadger->createPermission('viewOwnerActivity');
        $viewOwnerActivity->description = 'Просмотр и редактирование своих активностей';

        $rule = new OwnerActivityRule();
        $viewOwnerActivity->ruleName = $rule->name;

        $authManadger->add($rule);
        $authManadger->add($viewOwnerActivity);

        $viewAllActivities = $authManadger->createPermission('viewAllActivities');
        $viewAllActivities->description = 'Просмотр и редактирование любых активностей';
        $authManadger->add($viewAllActivities);

        $authManadger->addChild($user, $createActivity);
        $authManadger->addChild($user, $viewOwnerActivity);
        $authManadger->addChild($admin,$user);
        $authManadger->addChild($admin, $viewAllActivities);

        $authManadger->assign($admin, 1);
        $authManadger->assign($user, 2);

    }
    public function canCreateActivity():bool{

        return \Yii::$app->user->can('createActivity');
    }
    public function canChangeActivity(Activity $activity){

        if(\Yii::$app->user->can('viewAllActivities')){

            return true;
        }
//        return var_dump(\Yii::$app->user->can('viewOwnerActivity', ['activity' => $activity]));
        if(\Yii::$app->user->can('viewOwnerActivity', ['activity' => $activity])){

            return true;
        }
        return false;
    }
    public function removeAll(){

        $authManager = $this->getAuthManager();
        $authManager->removeAll();
    }
}