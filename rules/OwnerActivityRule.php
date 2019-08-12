<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 30.07.2019
 * Time: 19:07
 */

namespace app\rules;


use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\rbac\Item;
use yii\rbac\Rule;

class OwnerActivityRule extends Rule
{
    public $name = 'ownerActivityRuler';
    /**
     * Executes the rule.
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @return bool a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params)
    {
        $activity = ArrayHelper::getValue($params, 'activity');
        if(!$activity){

            throw new \Exception('need activity param in rule');
        }
        return $user === $activity->user_id;
    }
}