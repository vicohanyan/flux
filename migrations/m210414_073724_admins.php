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
            'type'         => $this->string(32),
        ]);
        $this->batchInsert("admins",
            [
                'username','password','auth_key','access_token','type'
            ],
            [
                ["admin1",'$2a$13$hUjtMwR9BNTyjGXw7vOByeoC2d1dnuuAwfu4QP5lckP55KMACXtru','test100key','100-token','admin'],
                ["admin2",'$2a$13$hUjtMwR9BNTyjGXw7vOByeoC2d1dnuuAwfu4QP5lckP55KMACXtru','test101key','101-token','admin'],
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

}
