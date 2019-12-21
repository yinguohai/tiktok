<?php
/**
 * Created by PhpStorm.
 * User: yinguohai
 * Date: 2019/12/5
 * Time: 12:45 AM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
<div class="form-groupd">
    <?= Html::submitButton('Submit',['class'=>'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>


