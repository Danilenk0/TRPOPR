<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Buildingmaterial $model */

$this->title = 'Добавление стройматериала';
$this->params['breadcrumbs'][] = ['label' => 'Buildingmaterials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buildingmaterial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
