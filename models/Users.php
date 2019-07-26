<?php

namespace app\models;
use app\models\Role;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $role тип_пользователя
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'phone', 'email', 'role'], 'required'],
            [['role'], 'integer'],
            [['login', 'password', 'name', 'phone', 'email'], 'string', 'max' => 255],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'ФИО',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'role' => 'Роль',
        ];
    }

    public function getRoleName()
    {
        return $this->hasOne(Role::className(), ['id' => 'role']);
    }
}
