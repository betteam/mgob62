<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Research */

$this->title = 'Update Research: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Researches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="research-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
