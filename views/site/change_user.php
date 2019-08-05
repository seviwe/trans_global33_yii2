<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);

$this->title = 'Регистрация | Глобал Транс 33';

?>
<!-- Page Content -->
<div class="container">

   <h1 class="text-center mb-3">Кем Вы являетесь?</h1>

   <div class="row mb-4">
      <div class="col-4">
         <?= Html::a('Я грузовладелец', ['site/signup'], ['class' => 'btn btn-success btn-block btn-lg', 'role' => 'button']) ?>
      </div>
      <div class="col-4">
         <?= Html::a('Я грузоперевозчик (компания)', ['signup-company'], ['class' => 'btn btn-primary btn-block btn-lg', 'role' => 'button']) ?>
      </div>
      <div class="col-4">
         <?= Html::a('Я грузоперевозчик (частное лицо)', ['signup-private'], ['class' => 'btn btn-warning btn-block btn-lg', 'style' => 'font-size: 19px', 'role' => 'button']) ?>
      </div>
   </div>

   <div class="row mb-4">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
               здесь будет описание пользователей
            </div>
         </div>
      </div>
   </div>
</div>