<?php

/* @var $this yii\web\View */

use app\models\Classes;
use app\models\Teachers;

/** @var $classess Classes */
/** @var $class Classes */
/** @var $teachers Teachers */
/** @var $teacher Teachers */
$this->title = 'Test Application';
?>
<div class="site-index">
<div class="container">
    <div class="row">
        <div class = "col-md-6">
            <h3>Class Roms</h3>
            <div>
            <?php foreach($classes AS $class): ?>
                <div><?=$class->name?></div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class = "col-md-6">
            <h3>Teachers</h3>
            <div>
                <?php foreach($teachers AS $teacher): ?>
                    <div><?=$teacher->first_name?> <?=$teacher->last_name?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

</div>
