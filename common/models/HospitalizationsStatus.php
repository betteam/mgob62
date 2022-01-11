<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospitalizations_status".
 *
 * @property int $id
 * @property int $name
 *
 * @property Hospitalizations[] $hospitalizations
 */
class HospitalizationsStatus extends \yii\db\ActiveRecord
{
    const HOSPITALIZED = 1;
    const DISCHARGED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospitalizations_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Hospitalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizations()
    {
        return $this->hasMany(Hospitalizations::className(), ['status_id' => 'id']);
    }
}
