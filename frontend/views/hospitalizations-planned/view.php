<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalizationsPlanned */

$this->title = 'Запланированная госпитализация: '.$model->patient->getShortName();
$this->params['breadcrumbs'][] = ['label' => 'Запланированные госпитализации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hospitalizations-planned-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Госпитализировать', ['hospitalizations/create', 'planned_id' => $model->id], ['class' => 'btn btn btn-info']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'created_at',
//            'updated_at',
            'priority.name',
            'patient.shortname',
            'diagnosis.name',
            'planned_date:date',
            'status.name',
            'note:ntext',
        ],
    ]) ?>

</div>
