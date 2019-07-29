<?php

namespace app\models;

use Yii;
use app\models\City;

/**
 * This is the model class for table "route".
 *
 * @property int $id
 * @property string $name название маршрута
 * @property int $id_city_departure
 * @property int $id_city_arrival
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_city_departure', 'id_city_arrival'], 'required'],
            [['name', 'id_city_departure', 'id_city_arrival'], 'trim'],
            [['id_city_departure', 'id_city_arrival'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название маршрута',
            'id_city_departure' => 'Н/п отбытия',
            'id_city_arrival' => 'Н/п прибытия',
        ];
    }

    public function getCityDeparture()
    {
        return $this->hasOne(City::className(), ['id' => 'id_city_departure']);
    }

    public function getCityArrival()
    {
        return $this->hasOne(City::className(), ['id' => 'id_city_arrival']);
    }
}
