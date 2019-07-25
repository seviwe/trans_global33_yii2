<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_USER     = 1;
    const ROLE_LOGIST   = 5;
    const ROLE_ADMIN    = 10;

    public static function roles()
    {
        return [
            self::ROLE_USER     => Yii::t('app', 'User'),
            self::ROLE_LOGIST   => Yii::t('app', 'Logist'),
            self::ROLE_ADMIN    => Yii::t('app', 'Admin'),
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
