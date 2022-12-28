<?php

use common\models\Checkmaterial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CheckmaterialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'чеки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkmaterial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание чека', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?php $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'idbuilding',
                'value' => function ($model) {
                    return $model->idbuilding0->name;
                }
            ],
            [
                'attribute' => 'totalcost',
                'value' => function ($model) {
                    return $model->amount * $model->idbuilding0->cost;
                }
            ],
            [
                'attribute' => 'idcustomer',
                'value' => function ($model) {
                    return $model->idcustomer0->name;
                }
            ],
            'amount',
            'created_at:datetime',
            [
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a('ПЕЧАТЬ', ['/site/print', 'checkId' => $model->id]);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Checkmaterial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            
        ],
        
    ]); ?>


</div>
