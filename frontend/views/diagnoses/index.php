<?php

use common\models\Diagnoses;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DiagnosesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diagnoses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diagnoses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Diagnoses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
