<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ResearchTypes */

$this->title = 'Create Research Types';
$this->params['breadcrumbs'][] = ['label' => 'Research Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
