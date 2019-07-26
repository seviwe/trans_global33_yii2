<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Route;
use app\models\City;

/**
 * RouteSearch represents the model behind the search form of `app\models\Route`.
 */
class RouteSearch extends Route
{

    public $cityDepartureName;
    public $cityArrivalName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_city_departure', 'id_city_arrival'], 'integer'],
            [['name', 'cityDepartureName', 'cityArrivalName'], 'safe'],
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
        $query = Route::find();

        $query->joinWith(['cityDeparture']);
        //$query->joinWith(['cityArrival']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['cityDepartureName'] = [
            'asc' => [City::tableName().'.name' => SORT_ASC],
            'desc' => [City::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['cityArrivalName'] = [
            'asc' => [City::tableName().'.name' => SORT_ASC],
            'desc' => [City::tableName().'.name' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_city_departure' => $this->id_city_departure,
            //'id_city_arrival' => $this->id_city_arrival,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', City::tableName().'.name', $this->cityDepartureName]);
        $query->andFilterWhere(['like', City::tableName().'.name', $this->cityArrivalName]);

        return $dataProvider;
    }
}
