<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $teachers app\models\Teachers */
/* @var $classes app\models\Classes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class_id')->dropDownList($classes); ?>

    <?= $form->field($model, 'teacher_id')->dropDownList($teachers); ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
