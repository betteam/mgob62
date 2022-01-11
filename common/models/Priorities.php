<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "priorities".
 *
 * @property int $id
 * @property string $name
 *
 * @property HospitalizationsPlanned[] $hospitalizationsPlanneds
 */
class Priorities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'priorities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Приоритет',
        ];
    }

    /**
     * Gets query for [[HospitalizationsPlanneds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizationsPlanneds()
    {
        return $this->hasMany(HospitalizationsPlanned::className(), ['priority_id' => 'id']);
    }
}
