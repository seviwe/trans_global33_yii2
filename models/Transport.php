<?php

namespace app\models;

use Yii;
use app\models\Users;

/**
 * This is the model class for table "transport".
 *
 * @property int $id
 * @property int $id_user
 * @property int $volume объем
 * @property string $body_dimensions внутр габариты кузова
 * @property double $capacity грузоподъемность
 * @property string $id_city_departure
 * @property string $name_city_departure
 * @property string $id_city_arrival
 * @property string $name_city_arrival
 * @property string $date_departure
 * @property string $date_arrival
 * @property string $rate
 * @property string $info
 */
class Transport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'volume', 'body_dimensions', 'capacity', 'id_city_departure', 'name_city_departure', 'id_city_arrival', 'name_city_arrival', 'date_departure', 'date_arrival', 'rate', 'info'], 'required'],
            [['id_user', 'volume'], 'integer'],
            [['capacity'], 'number'],
            [['body_dimensions', 'id_city_departure', 'name_city_departure', 'id_city_arrival', 'name_city_arrival', 'date_departure', 'date_arrival', 'rate'], 'string', 'max' => 255],
            [['info'], 'string', 'max' => 1023],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'volume' => 'Объем, м3',
            'body_dimensions' => 'Внутренние габариты кузова (Д/Ш/В), м',
            'capacity' => 'Грузо- подъемность, т',
            'id_city_departure' => 'Id City Departure',
            'name_city_departure' => 'Н/п отбытия',
            'id_city_arrival' => 'Id City Arrival',
            'name_city_arrival' => 'Н/п прибытия',
            'date_departure' => 'Дата отбытия',
            'date_arrival' => 'Дата прибытия',
            'rate' => 'Мин. ставка, руб.',
            'info' => 'Доп. коммент.',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }

    public function getFullName()
    {
        return $this->name;
    }
}
