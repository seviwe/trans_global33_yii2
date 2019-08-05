<?php

namespace app\models;

use Yii;
use app\models\Route;
use app\models\Users;

/**
 * This is the model class for table "load_information".
 *
 * @property int $id
 * @property int $id_route
 * @property int $id_user
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
            [['id_route', 'weight_from', 'volume_from', 'transport', 'load_info', 'rate', 'date_departure', 'date_arrival'], 'required'],
            [['id_route', 'weight_from', 'volume_from', 'transport', 'load_info', 'rate', 'date_departure', 'date_arrival'], 'trim'],
            [['id_route'], 'integer'],
            [['weight_from', 'volume_from'], 'number'],
            [['transport', 'load_info', 'rate', 'date_create', 'date_departure', 'date_arrival'], 'string', 'max' => 255],
            ['date_departure', 'compare', 'compareValue' => date('d.m.Y H:i'), 'operator' => '>', 'message' => 'Дата отбытия должна быть больше, чем текущая дата'],
            ['date_arrival', 'compare', 'compareValue' => date('d.m.Y H:i'), 'operator' => '>', 'message' => 'Дата прибытия должна быть больше, чем текущая дата'],
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
            'id_route' => 'Маршрут',
            'weight_from' => 'Вес',
            //'weight_to' => 'Вес, до',
            'volume_from' => 'Объем',
            //'volume_to' => 'Объем, до',
            'transport' => 'Транспорт',
            'load_info' => 'Информация о грузе',
            'rate' => 'Ставка',
            'date_create' => 'Дата и время создания',
            'date_departure' => 'Дата и время отбытия',
            'date_arrival' => 'Дата и время прибытия',
        ];
    }

    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['id' => 'id_route']);
    }
    
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
