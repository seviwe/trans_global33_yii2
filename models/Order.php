<?php

namespace app\models;

use Yii;
use app\models\LoadInformation;
use app\models\Transport;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $id_load
 * @property int $id_transport
 * @property string $comment
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_load', 'id_transport', 'status'], 'required'],
            [['id_load', 'id_transport'], 'integer'],
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_load' => 'Груз',
            'id_transport' => 'Транспорт',
            'comment' => 'Комментарий',
            'status' => 'Статус',
        ];
    }

    public function getLoad()
    {
        return $this->hasOne(LoadInformation::className(), ['id' => 'id_load']);
    }

    public function getTransport()
    {
        return $this->hasOne(Transport::className(), ['id' => 'id_transport']);
    }
}
