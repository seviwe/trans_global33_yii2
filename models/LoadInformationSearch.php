<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LoadInformation;

/**
 * LoadInformationSearch represents the model behind the search form of `app\models\LoadInformation`.
 */
class LoadInformationSearch extends LoadInformation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_route'], 'integer'],
            [['weight_from', 'weight_to', 'volume_from', 'volume_to'], 'number'],
            [['transport', 'load_info', 'rate', 'date_create', 'date_departure', 'date_arrival'], 'safe'],
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
        $query = LoadInformation::find();

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
            'id_route' => $this->id_route,
            'weight_from' => $this->weight_from,
            'weight_to' => $this->weight_to,
            'volume_from' => $this->volume_from,
            'volume_to' => $this->volume_to,
        ]);

        $query->andFilterWhere(['like', 'transport', $this->transport])
            ->andFilterWhere(['like', 'load_info', $this->load_info])
            ->andFilterWhere(['like', 'rate', $this->rate])
            ->andFilterWhere(['like', 'date_create', $this->date_create])
            ->andFilterWhere(['like', 'date_departure', $this->date_departure])
            ->andFilterWhere(['like', 'date_arrival', $this->date_arrival]);

        return $dataProvider;
    }
}
