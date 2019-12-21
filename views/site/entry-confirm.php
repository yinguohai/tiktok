<?php

use yii\helpers\Html;

?>
<p> you have entered the following information: </p>
<ul>
    <li><label>Name:</label><?= Html::encode($model->name) ?></li>
    <li><label>email:</label><?= Html::encode($model->email) ?></li>
</ul>
