<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Applicants;

/**
 * ApplicantsSearch represents the model behind the search form about `app\models\Applicants`.
 */
class ApplicantsSearch extends Applicants
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lada_celphone', 'celphone', 'lada_phone', 'phone', 'birh_entity_id', 'civil_status_id', 'nationality_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'last_name', 'last_name2', 'CURP', 'gender', 'date', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Applicants::find();

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
            'lada_celphone' => $this->lada_celphone,
            'celphone' => $this->celphone,
            'lada_phone' => $this->lada_phone,
            'phone' => $this->phone,
            'birh_entity_id' => $this->birh_entity_id,
            'civil_status_id' => $this->civil_status_id,
            'nationality_id' => $this->nationality_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'last_name2', $this->last_name2])
            ->andFilterWhere(['like', 'CURP', $this->CURP])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
