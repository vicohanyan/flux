<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!Yii::$app->user->isGuest):?>
    <p>
        <?= Html::a('Create Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif;?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Class',
                'value' => 'class.name',
            ],
            [
                'label' => 'First name',
                'value' => 'teacher.first_name',
            ],
            [
                'label' => 'Last Name',
                'value' => 'teacher.last_name',
            ],
            'start',
            'end',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'visible' => !Yii::$app->user->isGuest,
            ],
        ]
    ]); ?>


</div>
