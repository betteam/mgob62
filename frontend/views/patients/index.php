<?php

use common\models\Patients;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PatientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пациенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить пациента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'created_at',
//            'updated_at',
            'name',
            'surname',
            //'patronymic',
            //'dob',
            'tel',

            [
                'format' => 'raw',
                'value' => function (Patients $model) {
                    $plan = $model->getHospitalizationsPlanneds()->one();

                    if ($plan) {
                        return Html::a($plan->status->name, ['hospitalizations-planned/view', 'id' => $plan->id]);
                    }
                    return Html::a('Запланировать', ['hospitalizations-planned/create', 'patient_id' => $model->id], ['class' => 'btn btn-success btn-sm']);
                }
            ],

            [
                'format' => 'raw',
                'value' => function (Patients $model) {
//                    $hospitalized = $model->getHospitalizations()->

                    return Html::a('Госпитализировать', ['hospitalizations/create', 'patient_id' => $model->id], ['class' => 'btn btn-info btn-sm']);
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Patients $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
