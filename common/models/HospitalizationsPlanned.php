<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "hospitalizations_planned".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $priority_id Приоритет
 * @property int $patient_id Пациент
 * @property int|null $diagnosis_id Диагноз
 * @property int|null $planned_date Планируемая дата госпитализации
 * @property int|null $status_id
 * @property string|null $note Примечание
 *
 * @property Diagnoses $diagnosis
 * @property Patients $patient
 * @property Priorities $priority
 * @property HospitalizationsPlannedStatus $status
 */
class HospitalizationsPlanned extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospitalizations_planned';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority_id', 'patient_id'], 'required'],
            [['created_at', 'updated_at', 'priority_id', 'patient_id', 'diagnosis_id', 'status_id'], 'integer'],
            [['planned_date'], 'datetime', 'format' => 'php:d.m.Y', 'timestampAttribute' => 'planned_date'],
            [['note'], 'string'],
            [['diagnosis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnoses::className(), 'targetAttribute' => ['diagnosis_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => HospitalizationsPlannedStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patients::className(), 'targetAttribute' => ['patient_id' => 'id']],
            [['priority_id'], 'exist', 'skipOnError' => true, 'targetClass' => Priorities::className(), 'targetAttribute' => ['priority_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Дата создания',
            'updated_at' => 'Updated At',
            'priority_id' => 'Приоритет',
            'patient_id' => 'Пациент',
            'diagnosis_id' => 'Диагноз',
            'planned_date' => 'Планируемая дата госпитализации',
            'status_id' => 'Статус',
            'note' => 'Примечание',
        ];
    }

    /**
     * Gets query for [[Diagnosis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosis()
    {
        return $this->hasOne(Diagnoses::className(), ['id' => 'diagnosis_id']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patients::className(), ['id' => 'patient_id']);
    }

    /**
     * Gets query for [[Priority]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriority()
    {
        return $this->hasOne(Priorities::className(), ['id' => 'priority_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(HospitalizationsPlannedStatus::className(), ['id' => 'status_id']);
    }

}
