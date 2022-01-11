<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitalizations */
/* @var $form yii\widgets\ActiveForm */

$diagnosis = ArrayHelper::map(\common\models\Diagnoses::find()->all(), 'id', 'name');
$chambers = ArrayHelper::map(\common\models\Chambers::find()->all(), 'id', 'id');
$doctors = ArrayHelper::map(\common\models\Doctors::find()->all(), 'id', 'name');
?>

<div class="hospitalizations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_hospitalization')->widget(\yii\jui\DatePicker::className(), [
        'dateFormat' => 'dd.MM.yyyy'
    ]) ?>

    <?= $form->field($model, 'diagnosis_id')->dropDownList($diagnosis, ['prompt' => '--- Выберите диагноз ---']) ?>

    <?= $form->field($model, 'chamber_id')->dropDownList($chambers, ['prompt' => '--- Выберите палату ---']) ?>

    <?= $form->field($model, 'doctor_id')->dropDownList($doctors, ['promp'=>'--- Выберите врача ---']) ?>

    <?= $form->field($model, 'planned_discharge_date')->widget(\yii\jui\DatePicker::className(), [
            'dateFormat' => 'dd.MM.yyyy',
    ]) ?>

    <?=$form->errorSummary($model)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
