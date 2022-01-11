<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chambers".
 *
 * @property int $id
 * @property int $capacity Вместимость, чел.
 *
 * @property Hospitalizations[] $hospitalizations
 */
class Chambers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chambers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'capacity'], 'required'],
            [['id', 'capacity'], 'integer'],
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
            'capacity' => 'Вместимость, чел.',
        ];
    }

    /**
     * Gets query for [[Hospitalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalizations()
    {
        return $this->hasMany(Hospitalizations::className(), ['chamber_id' => 'id']);
    }

    /**
     * Количество свободных коек
     * @return int
     */
    public function getNumberFreePlaces( ){
        $hospitalizations = $this->hospitalizations;

        return $this->capacity - count($hospitalizations);
    }
}
