<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "patients".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name Имя
 * @property string $surname Фамилия
 * @property string|null $patronymic Отчество
 * @property string|null $dob Дата рождения
 * @property string|null $tel Телефон
 *
 * @property Hospitalizations[] $hospitalizations
 * @property HospitalizationsPlanned[] $hospitalizationsPlanneds
 * @property Research[] $researches
 */
class Patients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patients';
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
            [['name', 'surname'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'dob', 'tel'], 'string', 'max' => 50],
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
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'dob' => 'Дата рождения',
            'tel' => 'Телефон',
            'shortname'=>'ФИО пациента'
        ];
    }

    /**
     * Gets query for [[Hospitalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizations()
    {
        return $this->hasMany(Hospitalizations::className(), ['patient_id' => 'id']);
    }

    /**
     * Gets query for [[HospitalizationsPlanneds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizationsPlanneds()
    {
        return $this->hasMany(HospitalizationsPlanned::className(), ['patient_id' => 'id']);
    }

    /**
     * Gets query for [[Researches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResearches()
    {
        return $this->hasMany(Research::className(), ['patient_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        $string = $this->surname . ' ' . mb_substr($this->name, 0, 1, 'UTF-8') . '. ';

        if ($this->patronymic) {
            $string .= mb_substr($this->patronymic, 0, 1, 'UTF-8') . '.';
        }

        return $string;
    }
}
