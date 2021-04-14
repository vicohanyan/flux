<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $teacher_id
 * @property string|null $start
 * @property string|null $end
 * @property Classes $class
 * @property Teachers $class0
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_id', 'teacher_id'], 'default', 'value' => null],
            [['class_id', 'teacher_id'], 'integer'],
            [['class_id', 'teacher_id'], 'required'],
            [['start', 'end'], 'safe'],
            [['start', 'end'], 'required'],
            ['start',
                function ($attribute) {
                    if (!$this->checkFreeTimeStart($attribute)) {
                        $this->addError($attribute,  'This time is not free');
                    }
                }
            ],
            ['end',
                function ($attribute) {
                    if (!$this->checkFreeTimeEnd($attribute)) {
                        $this->addError($attribute,  'This time is not free');
                    }
                }
            ],
            ['end',
                function ($attribute) {
                    if (!$this->endDateValidate()) {
                        $this->addError($attribute,  'end cannot be smaller than start');
                    }
                }
            ],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['class_id' => 'id']],
        ];
    }

    public function endDateValidate(){
        if( strtotime($this->end) - strtotime($this->start) < 0){
            return false;
        }
        return true;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => 'Class ID',
            'teacher_id' => 'Teacher ID',
            'start' => 'Start',
            'end' => 'End',
        ];
    }

    /**
     * Gets query for [[Class]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['id' => 'class_id']);
    }

    /**
     * Gets query for [[Class0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teacher_id']);
    }

    /**
     * @param $attribute
     * @return bool
     * @throws \yii\db\Exception
     */
    public function checkFreeTimeStart($attribute)
    {
        $sql = "
           SELECT COUNT(*) AS count FROM schedule
            WHERE ('{$this->attributes['start']}'::timestamp >= start AND '{$this->attributes['start']}'::timestamp <= \"end\") AND class_id = {$this->attributes['class_id']}
        ";
        $data = Yii::$app->db->createCommand($sql)->queryAll() ;
        if(empty($data[0]['count'])){
            return true;
        }
        return false;
    }


    /**
     * @param $attribute
     * @return bool
     * @throws \yii\db\Exception
     */
    public function checkFreeTimeEnd($attribute)
    {
        $sql = "
           SELECT COUNT(*) AS count FROM schedule
            WHERE ('{$this->attributes['end']}'::timestamp >= start AND '{$this->attributes['end']}'::timestamp <= \"end\")  AND class_id = {$this->attributes['class_id']}
        ";
        $data = Yii::$app->db->createCommand($sql)->queryAll() ;
        if(empty($data[0]['count'])){
            return true;
        }
        return false;
    }


}
