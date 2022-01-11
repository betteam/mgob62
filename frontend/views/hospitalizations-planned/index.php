<?php

use common\models\HospitalizationsPlanned;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\HospitalizationsPlannedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запланированные госпитализации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalizations-planned-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'created_at:date',
//            'updated_at',
            'priority.name',
            'patient.shortname',
            'diagnosis.name',
            'planned_date:date',
            //'status_id',
            //'note:ntext',
            [
                'format' => 'raw',
                'value' => function (HospitalizationsPlanned $model) {

                }
            ],
            [
                'format' => 'raw',
                'value' => function (HospitalizationsPlanned $model) {
                    return Html::a('Госпитализировать', ['hospitalizations/create', 'planned_id' => $model->id], ['class' => 'btn btn-success btn-sm']);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, HospitalizationsPlanned $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
