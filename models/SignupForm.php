<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
   public $first_name; //имя
   public $last_name; //фамилия
   public $middle_name; //отчество
   public $email;
   public $password;
   public $login;
   public $phone;

   public function rules()
   {
      return [
         [['first_name', 'email', 'password', 'login'], 'required', 'message' => 'Заполните поле'],
         ['login', 'unique', 'targetClass' => User::className(), 'message' => 'Логин уже занят'],
         ['email', 'email'],
         [['first_name', 'email', 'password', 'login'], 'trim'],
         ['phone', 'string'],
         ['last_name', 'string'],
         ['middle_name', 'string'],
      ];
   }

   public function attributeLabels()
   {
      return [
         'first_name' => 'Имя',
         'last_name' => 'Фамилия',         
         'middle_name' => 'Отчество',
         'password' => 'Пароль',
         'email' => 'Email',
         'login' => 'Логин',
         'phone' => 'Номер телефона'
      ];
   }
}
