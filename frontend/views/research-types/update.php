<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ResearchTypes */

$this->title = 'Update Research Types: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Research Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="research-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
