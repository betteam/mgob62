<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitalizations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Госпитализации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hospitalizations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            'date_hospitalization:date',
            'patient.shortname',
            'diagnosis.name',
            'chamber_id',
            'doctor.name',
            'status.name',
            'planned_discharge_date:date',
        ],
    ]) ?>

</div>
