<?php

namespace app\models;

use Yii;
use app\models\Region;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property int $id_region
 * @property int $id_kladr_city
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_region', 'id_kladr_city'], 'required'],
            [['name', 'id_region', 'id_kladr_city'], 'trim'],
            [['id_region'], 'integer'],
            [['name', 'id_kladr_city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название н/п',
            'id_region' => 'Область',
            'id_kladr_city' => 'ID н/п в ФИАС',
        ];
    }

    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'id_region']);
    }
}
