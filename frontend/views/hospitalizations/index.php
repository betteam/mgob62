<?php

use common\models\Hospitalizations;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\HospitalizationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Госпитализации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalizations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'created_at',
//            'updated_at',
            'date_hospitalization:date',
            'patient.shortname',
            'diagnosis.name',
            'chamber_id',
            'doctor.name',
            'status.name',
            'planned_discharge_date:date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Hospitalizations $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
