<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Shopper $model */

$this->title = 'Добавить покупателя';
$this->params['breadcrumbs'][] = ['label' => 'Shoppers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
