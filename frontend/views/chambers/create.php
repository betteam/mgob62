<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Chambers */

$this->title = 'Create Chambers';
$this->params['breadcrumbs'][] = ['label' => 'Chambers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chambers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
