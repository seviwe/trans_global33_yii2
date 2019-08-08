<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transport;

/**
 * TransportSearch represents the model behind the search form of `app\models\Transport`.
 */
class TransportSearch extends Transport
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'volume'], 'integer'],
            [['body_dimensions', 'id_city_departure', 'name_city_departure', 'id_city_arrival', 'name_city_arrival', 'date_departure', 'date_arrival', 'rate', 'info'], 'safe'],
            [['capacity'], 'number'],
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
        $query = Transport::find();

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
            'id_user' => $this->id_user,
            'volume' => $this->volume,
            'capacity' => $this->capacity,
        ]);

        $query->andFilterWhere(['like', 'body_dimensions', $this->body_dimensions])
            ->andFilterWhere(['like', 'id_city_departure', $this->id_city_departure])
            ->andFilterWhere(['like', 'name_city_departure', $this->name_city_departure])
            ->andFilterWhere(['like', 'id_city_arrival', $this->id_city_arrival])
            ->andFilterWhere(['like', 'name_city_arrival', $this->name_city_arrival])
            ->andFilterWhere(['like', 'date_departure', $this->date_departure])
            ->andFilterWhere(['like', 'date_arrival', $this->date_arrival])
            ->andFilterWhere(['like', 'rate', $this->rate])
            ->andFilterWhere(['like', 'info', $this->info]);

        return $dataProvider;
    }
}
