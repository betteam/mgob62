<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Diagnoses */

$this->title = 'Create Diagnoses';
$this->params['breadcrumbs'][] = ['label' => 'Diagnoses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
