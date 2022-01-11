<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalizationsPlanned */

$this->title = 'Запланировать госпитализацию: '.$model->patient->getShortName();
$this->params['breadcrumbs'][] = ['label' => 'Запланированные госпитализации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalizations-planned-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
