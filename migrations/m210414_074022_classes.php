<?php

use yii\db\Migration;

/**
 * Class m210414_074022_classes
 */
class m210414_074022_classes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('classes', [
            'id'       => $this->primaryKey(),
            'name'     => $this->string(100),
        ]);
        $this->batchInsert("classes",
            [
                "name"
            ],
            [
                ["class 1"],
                ["class 2"],
                ["class 3"],
                ["class 4"],
            ]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('classes');
    }

}
