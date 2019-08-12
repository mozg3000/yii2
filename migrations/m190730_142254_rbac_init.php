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
        \Yii::$app->rbac->genRbac();
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
