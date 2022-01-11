<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalizationsPlanned */
/* @var $form yii\widgets\ActiveForm */

$priorities = ArrayHelper::map(\common\models\Priorities::find()->all(), 'id', 'name');
$diagnoses = ArrayHelper::map(\common\models\Diagnoses::find()->all(), 'id', 'name');
$statuses = ArrayHelper::map(\common\models\HospitalizationsPlannedStatus::find()->all(), 'id', 'name');
?>

<div class="hospitalizations-planned-form">

    <?php $form = ActiveForm::begin(
    ); ?>

    <fieldset class="form-group">
    <?= $form->field($model, 'priority_id')->radioList($priorities, [
        'item' => function ($index, $label, $name, $checked, $value) {
            return '<div class="form-check"> 
            <label class="form-check-label' . ($checked ? ' active' : '') . '">' .
                Html::radio($name, $checked, ['value' => $value, 'class' => 'form-check-input']) . $label . '</label>
            </div>';
        }
    ]) ?>
    </fieldset>

    <?= $form->field($model, 'diagnosis_id')->dropDownList($diagnoses, ['prompt' => '--- Выберите диагноз ---']) ?>

    <?= $form->field($model, 'planned_date')->widget(DatePicker::className(), ['dateFormat' => 'dd.MM.yyyy', 'options' => ['class'=>'form-control']]) ?>

    <?= $form->field($model, 'status_id')->radioList($statuses, [
        'item' => function ($index, $label, $name, $checked, $value) {
            return '<div class="form-check"> 
            <label class="form-check-label' . ($checked ? ' active' : '') . '">' .
                Html::radio($name, $checked, ['value' => $value, 'class' => 'form-check-input']) . $label . '</label>
            </div>';
        }
    ]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('Готово', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
