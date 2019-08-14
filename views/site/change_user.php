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

   <h2 class="text-center mb-3">Кем Вы являетесь?</h2>

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
               <ul>
                  <li>Грузовладелец может добавлять свои грузы и следить за статусом его доставки.</li>
                  <li>Грузоперевозчик может добавлять свой транспорт.</li>
                  <br> 
                  Если будет найден подходящий груз или транспорт для доставки, с грузоперевозчиком и грузовладельцем свяжется логист компании через указаный мобильный телефон и/или электронную почту.
               </ul>
            </div>
         </div>
      </div>
   </div>

   <!-- Cooperation Section -->
   <div class="card my-3">
      <div class="card-body">
         <div class="row">
            <div class="col-lg-6">
               <h2>Приглашаем к сотрудничеству</h2>
               <p>Глобал Транс 33 приглашает к сотрудничеству:</p>
               <ul>
                  <li>Грузовладельцев.</li>
                  <li>Перевозчиков (компания).</li>
                  <li>Перевозчиков (частное лицо).</li>
               </ul>
               <p></p>
            </div>
            <div class="col-lg-6">
               <img class="img-fluid rounded" src="/web/img/slide-mini.jpg" alt="" />
            </div>
         </div>
      </div>
   </div>
</div>