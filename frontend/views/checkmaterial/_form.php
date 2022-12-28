<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Checkmaterial $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="checkmaterial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idbuilding')->textInput() ?>

    <?= $form->field($model, 'idcustomer')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group ">
        <br>
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
