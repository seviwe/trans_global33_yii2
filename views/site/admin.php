<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Панель администратора | Глобал Транс 33';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Page Content -->
<div class="container">
   <br>
   <!-- Page Heading/Breadcrumbs -->
   <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="index.php">Главная</a>
      </li>
      <li class="breadcrumb-item active">Панель администратора</li>
   </ol>
   <h1 class="text-center mb-3">Панель администратора</h1>

   <div class="list-group mb-4">
      <a href="index.php?r=users/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-primary">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Пользователи</h5>
         </div>
         <p class="mb-1">Здесь вы можете посмотреть, обновить, удалить или добавить нового пользователя.</p>
      </a>
      <a href="index.php?r=role/index" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-warning">
         <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Роли пользователей</h5>
         </div>
         <p class="mb-1">Здесь вы можете посмотреть, обновить, удалить или добавить роль пользователя.</p>
      </a>
   </div>

</div>
<!-- /.container -->