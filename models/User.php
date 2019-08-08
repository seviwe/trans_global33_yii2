<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_USER             = 1;  //грузовладелец
    const ROLE_CARRIER_PRIVATE  = 2;  //грузоперевозчик (частное лицо)
    const ROLE_CARRIER_COMPANY  = 3;  //грузоперевозчик (компания)
    const ROLE_LOGIST           = 5;  //логист
    const ROLE_ADMIN            = 10; //админ

    public static function roles()
    {
        return [
            self::ROLE_USER             => Yii::t('app', 'User'),
            self::ROLE_CARRIER_PRIVATE  => Yii::t('app', 'CarrierP'),
            self::ROLE_CARRIER_COMPANY  => Yii::t('app', 'CarrierC'),
            self::ROLE_LOGIST           => Yii::t('app', 'Logist'),
            self::ROLE_ADMIN            => Yii::t('app', 'Admin'),
        ];
    }

    /**
     * Название роли
     * @param int $id
     * @return mixed|null
     */
    public function getRoleName(int $id)
    {
        $list = self::roles();

        if (isset($list[$id])) {
            return $list[$id];
        } else {
            return null;
        }
        //return $list[$id] ?? null;
    }

    public function isAdmin()
    {
        return ($this->role == self::ROLE_ADMIN);
    }

    public function isLogist()
    {
        return ($this->role == self::ROLE_LOGIST);
    }    
    
    public function isCarrierP()
    {
        return ($this->role == self::ROLE_CARRIER_PRIVATE);
    }

    public function isCarrierC()
    {
        return ($this->role == self::ROLE_CARRIER_COMPANY);
    }

    public function isUser()
    {
        return ($this->role == self::ROLE_USER);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    public static function findBylogin($login)
    {
        return static::findOne(['login' => $login]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getLogin()
    {
        return \Yii::$app->user->identity->login;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}
