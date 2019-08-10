<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;
use app\models\LoadInformation;
use app\models\Transport;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{

    public $loadName;
    public $transportName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_load', 'id_transport'], 'integer'],
            [['comment', 'loadName', 'transportName'], 'safe'],
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
        $query = Order::find();
        $query->joinWith(['load']);
        $query->joinWith(['transport']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['loadName'] = [
            'asc' => [LoadInformation::tableName().'.name' => SORT_ASC],
            'desc' => [LoadInformation::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['transportName'] = [
            'asc' => [Transport::tableName().'.name' => SORT_ASC],
            'desc' => [Transport::tableName().'.name' => SORT_DESC],
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
            //'id_load' => $this->id_load,
            //'id_transport' => $this->id_transport,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
        ->andFilterWhere(['like', LoadInformation::tableName().'.name', $this->loadName])
        //->andFilterWhere(['=', 'status', $this->loadName])
        ->andFilterWhere(['like', Transport::tableName().'.name', $this->transportName]);

        return $dataProvider;
    }
}
