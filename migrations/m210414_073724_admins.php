<?php

use yii\db\Migration;

/**
 * Class m210414_073724_admins
 */
class m210414_073724_admins extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admins', [
            'id'           => $this->primaryKey(),
            'username'     => $this->string(64)->unique(),
            'password'     => $this->string(64),
            'auth_key'     => $this->string(32),
            'access_token' => $this->string(32),
        ]);
        $this->batchInsert("admins",
            [
                'username','password','auth_key','access_token'
            ],
            [
                ["admin1",'$2a$13$hUjtMwR9BNTyjGXw7vOByeoC2d1dnuuAwfu4QP5lckP55KMACXtru','test100key','100-token'],
                ["admin2",'$2a$13$hUjtMwR9BNTyjGXw7vOByeoC2d1dnuuAwfu4QP5lckP55KMACXtru','test101key','101-token'],
            ]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admins');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
    }
    public function down()
    {
        echo "m210327_094326_students cannot be reverted.\n";
        return false;
    }
    */
}
