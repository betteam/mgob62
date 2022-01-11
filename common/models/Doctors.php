<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property string $name
 *
 * @property Hospitalizations[] $hospitalizations
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'ФИО врача',
        ];
    }

    /**
     * Gets query for [[Hospitalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizations()
    {
        return $this->hasMany(Hospitalizations::className(), ['doctor_id' => 'id']);
    }
}
