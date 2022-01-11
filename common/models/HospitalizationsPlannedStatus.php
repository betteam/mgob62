<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospitalizations_planned_status".
 *
 * @property int $id
 * @property int $name
 *
 * @property HospitalizationsPlanned[] $hospitalizationsPlanneds
 */
class HospitalizationsPlannedStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospitalizations_planned_status';
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
     * Gets query for [[HospitalizationsPlanneds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizationsPlanneds()
    {
        return $this->hasMany(HospitalizationsPlanned::className(), ['status_id' => 'id']);
    }
}
