<?php

use yii\db\Migration;

/**
 * Class m190730_095957_db_data_init
 */
class m190730_095957_db_data_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[

            'id' => 1,

            'email' => 'test@email.dom',

            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),

        ]);

        $this->insert('users',[

            'id' => 2,

            'email' => 'test02@email.dom',

            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),

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
        echo "m190730_095957_db_data_init cannot be reverted.\n";

        return false;
    }
    */
}
