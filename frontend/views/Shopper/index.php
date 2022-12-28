<?php

use common\models\Shopper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var common\models\ShopperSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Покупатели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopper-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить покупателя', ['create'], ['class' => 'btn btn-success']) ?>
        <?
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'passport',
            'address',
            'phone',
            ['class' => 'yii\grid\ActionColumn'],
        ];
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'clearBuffers' => true, //optional
        ]);
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'passport',
            'address',
            'phone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Shopper $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
