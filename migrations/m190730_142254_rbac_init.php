<?php

use yii\db\Migration;

/**
 * Class m190730_142254_rbac_init
 */
class m190730_142254_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authManadger = \Yii::$app->authManager;

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

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        \Yii::$app->rbac->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190730_142254_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
