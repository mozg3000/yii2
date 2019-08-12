<?php

use yii\db\Migration;

/**
 * Class m190729_070633_init_alter
 */
class m190729_070633_init_alter extends Migration
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
        echo "m190729_070633_init_alter cannot be reverted.\n";

        return false;
    }
    */
}
