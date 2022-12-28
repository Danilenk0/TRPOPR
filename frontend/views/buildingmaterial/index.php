<?php

use common\models\Buildingmaterial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var common\models\BuildingmaterialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Стройматериалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buildingmaterial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить стройматериал', ['create'], ['class' => 'btn btn-success']) ?>
         
        
    </p>
    
    <?
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
        'amount',
        'idwarehouse',
        'typematerial',
        'cost',
        ['class' => 'yii\grid\ActionColumn'],
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'clearBuffers' => true, //optional
    ]);
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
     

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'amount',
            'idwarehouse',
            'typematerial',
            'cost',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Buildingmaterial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
