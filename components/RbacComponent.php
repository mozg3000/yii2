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
    public function canAdmin(){

        foreach (\Yii::$app->authManager->getAssignments(\Yii::$app->user->getIdentity()->id) as $index => $assignment) {

            if ($assignment->roleName === 'admin') {

                return true;
            }
        }
        return false;
    }
    public function removeAll(){

        $authManager = $this->getAuthManager();
        $authManager->removeAll();
    }
}