<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "research".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $patient_id Пациент
 * @property int $research_type_id Тип исследования
 *
 * @property Patients $patient
 * @property ResearchTypes $researchType
 */
class Research extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'research';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'patient_id', 'research_type_id'], 'required'],
            [['created_at', 'updated_at', 'patient_id', 'research_type_id'], 'integer'],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patients::className(), 'targetAttribute' => ['patient_id' => 'id']],
            [['research_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResearchTypes::className(), 'targetAttribute' => ['research_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'patient_id' => 'Пациент',
            'research_type_id' => 'Тип исследования',
        ];
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
     * Gets query for [[ResearchType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResearchType()
    {
        return $this->hasOne(ResearchTypes::className(), ['id' => 'research_type_id']);
    }
}
