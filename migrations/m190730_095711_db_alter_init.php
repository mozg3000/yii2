<?php

use yii\db\Migration;

/**
 * Class m190730_095711_db_alter_init
 */
class m190730_095711_db_alter_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','user_id', $this->integer()->notNull());

        $this->addForeignKey('activityUserFK','activity', 'user_id',

            'users', 'id', 'CASCADE', 'CASCADE') ;

        $this->createIndex('emailUserInd','users', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','user_id');

        $this->dropForeignKey('activityUserFK', 'activity');

        $this->dropIndex('emailUserInd', 'users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190730_095711_db_alter_init cannot be reverted.\n";

        return false;
    }
    */
}
