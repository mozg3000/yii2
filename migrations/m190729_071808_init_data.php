<?php

use yii\db\Migration;

/**
 * Class m190729_071808_init_data
 */
class m190729_071808_init_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id' => 1,
            'email' => 'test@email.dom',
            'password_hash' => 'dghdsfth'
        ]);
        $this->insert('users',[
            'id' => 2,
            'email' => 'test02@email.dom',
            'password_hash' => 'dghdsfth'
        ]);

        $this->batchInsert('activity', ['title', 'user_id', 'startday', 'useNotification', 'email'],
            [
                ['activity 1', 1, date('Y-m-d'), 0, null],
                ['activity 1', 1, date('Y-m-d'), 0, null],
                ['activity 1', 1, date('Y-m-d'), 1, 'test@email.dom'],
                ['activity 1', 1, date('Y-m-d'), 1, 'test@email.dom'],
                ['activity 1', 1, date('Y-m-d'), 1, 'test@email.dom']
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
        $this->delete('activity');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190729_071808_init_data cannot be reverted.\n";

        return false;
    }
    */
}
