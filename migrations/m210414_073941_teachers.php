<?php

use yii\db\Migration;

/**
 * Class m210414_073941_teachers
 */
class m210414_073941_teachers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('teachers', [
            'id'         => $this->primaryKey(),
            'first_name' => $this->string(100),
            'last_name'  => $this->string(100),
        ]);
        $this->batchInsert("teachers",
            [
                'first_name','last_name'
            ],
            [
                ["Martin",'Scorsese'],
                ["Quentin",'Tarantino'],
                ["Stan",'Lee'],
            ]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('teachers');
    }


}
