<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Checkmaterial $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Checkmaterials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkmaterial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
