<?php

use yii\db\Migration;

/**
 * Class m210414_074048_schedule
 */
class m210414_074048_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('schedule', [
            'id'         => $this->primaryKey(),
            'class_id'   => $this->integer(),
            'teacher_id' => $this->integer(),
            'start'      => $this->timestamp(),
            'end'        => $this->timestamp(),
        ]);
        $this->addForeignKey("class_id_FK","schedule","class_id","classes","id","cascade","cascade");
        $this->addForeignKey("teacher_id_FK","schedule","class_id","teachers","id","cascade","cascade");
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('schedule');
    }

}
