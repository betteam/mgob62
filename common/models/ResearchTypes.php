<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "research_types".
 *
 * @property int $id
 * @property int $name
 *
 * @property Research[] $researches
 */
class ResearchTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'research_types';
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
     * Gets query for [[Researches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResearches()
    {
        return $this->hasMany(Research::className(), ['research_type_id' => 'id']);
    }
}
