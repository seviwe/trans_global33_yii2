<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "load_information".
 *
 * @property int $id
 * @property int $id_route
 * @property string $weight_from
 * @property string $weight_to
 * @property string $volume_from
 * @property string $volume_to
 * @property string $transport
 * @property string $load_info
 * @property string $rate
 * @property string $date_create
 * @property string $date_departure
 * @property string $date_arrival
 */
class LoadInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'load_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_route', 'weight_from', 'weight_to', 'volume_from', 'volume_to', 'transport', 'load_info', 'rate', 'date_create', 'date_departure', 'date_arrival'], 'required'],
            [['id_route'], 'integer'],
            [['weight_from', 'weight_to', 'volume_from', 'volume_to'], 'number'],
            [['transport', 'load_info', 'rate', 'date_create', 'date_departure', 'date_arrival'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_route' => 'Маршрут',
            'weight_from' => 'Вес, от',
            'weight_to' => 'Вес, до',
            'volume_from' => 'Объем, от',
            'volume_to' => 'Объем, до',
            'transport' => 'Транспорт',
            'load_info' => 'Инф. о грузе',
            'rate' => 'Ставка',
            'date_create' => 'Дата создания',
            'date_departure' => 'Дата отбытия',
            'date_arrival' => 'Дата прибытия',
        ];
    }
}
