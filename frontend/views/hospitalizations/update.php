<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitalizations */

$this->title = 'Редактировать госпитализацию: ' . $model->patient->getShortName();
$this->params['breadcrumbs'][] = ['label' => 'Госпитализации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient->getShortName(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="hospitalizations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
