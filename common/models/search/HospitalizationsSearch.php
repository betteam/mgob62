<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hospitalizations;

/**
 * HospitalizationsSearch represents the model behind the search form of `common\models\Hospitalizations`.
 */
class HospitalizationsSearch extends Hospitalizations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'date_hospitalization', 'patient_id', 'diagnosis_id', 'chamber_id', 'doctor_id', 'status_id', 'planned_discharge_date'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Hospitalizations::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'date_hospitalization' => $this->date_hospitalization,
            'patient_id' => $this->patient_id,
            'diagnosis_id' => $this->diagnosis_id,
            'chamber_id' => $this->chamber_id,
            'doctor_id' => $this->doctor_id,
            'status_id' => $this->status_id,
            'planned_discharge_date' => $this->planned_discharge_date,
        ]);

        return $dataProvider;
    }
}
