<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "diagnoses".
 *
 * @property int $id
 * @property string|null $code Код
 * @property string $name Название
 *
 * @property Hospitalizations[] $hospitalizations
 * @property HospitalizationsPlanned[] $hospitalizationsPlanneds
 */
class Diagnoses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnoses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['code'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код диагноза',
            'name' => 'Название диагноза',
        ];
    }

    /**
     * Gets query for [[Hospitalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizations()
    {
        return $this->hasMany(Hospitalizations::className(), ['diagnosis_id' => 'id']);
    }

    /**
     * Gets query for [[HospitalizationsPlanneds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizationsPlanneds()
    {
        return $this->hasMany(HospitalizationsPlanned::className(), ['diagnosis_id' => 'id']);
    }
}
