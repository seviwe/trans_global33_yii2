<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name
 * @property string $federal_district
 * @property int $id_kladr_region
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'federal_district', 'id_kladr_region'], 'required'],
            [['name', 'federal_district', 'id_kladr_region'], 'trim'],
            [['name', 'federal_district', 'id_kladr_region'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'federal_district' => 'Федеральный округ',
            'id_kladr_region' => 'ID области в ФИАС',
        ];
    }
}
