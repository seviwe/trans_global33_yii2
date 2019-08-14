<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Панель логиста | Глобал Транс 33';
// $this->params['breadcrumbs'][] = $this->title;

?>

<!-- Page Content -->
<div class="container">

   <h2 class="text-center mb-3">Панель логиста</h2>

   <div class="list-group mb-4">
      <a href="/web/load-information/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-success">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Добавление, просмотр и редактирование грузов</h5>
         </div>
         <p class="mb-1">Здесь будет происходить работа с грузами.</p>
      </a>
      <a href="/web/transport/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-warning">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Добавление, просмотр и редактирование транспорта</h5>
         </div>
         <p class="mb-1">Здесь будет происходить работа с транспортом.</p>
      </a>
      <a href="/web/order/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-info">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Добавление, просмотр и редактирование заказов</h5>
         </div>
         <p class="mb-1">Здесь будет происходить работа с заказами.</p>
      </a>
      <!-- <a href="index.php?r=route/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-danger">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Добавление, просмотр и редактирование маршрутов</h5>
         </div>
         <p class="mb-1">Здесь будет происходить работа с маршрутами.</p>
      </a>
      <a href="index.php?r=city/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-info">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Добавление, просмотр и редактирование населённых пунктов (н/п)</h5>
         </div>
         <p class="mb-1">Здесь будет происходить работа с н/п.</p>
      </a>
      <a href="index.php?r=region/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-warning">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Добавление, просмотр и редактирование областей</h5>
         </div>
         <p class="mb-1">Здесь будет происходить работа с областями.</p>
      </a> -->
   </div>

</div>
<!-- /.container -->