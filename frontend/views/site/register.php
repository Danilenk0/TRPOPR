<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelForm, 'login') ?>

    <?= $form->field($modelForm, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>