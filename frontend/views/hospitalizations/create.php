<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitalizations */

$this->title = 'Госпитализация: ' . $model->patient->getShortName();
$this->params['breadcrumbs'][] = ['label' => 'Госпитализации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalizations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
