<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalizationsPlanned */

$this->title = 'Редактировать запланированную госпитализацию: ' . $model->patient->getShortName();
$this->params['breadcrumbs'][] = ['label' => 'Запланированные госпитализации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient->getShortName(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="hospitalizations-planned-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
