<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Редактировать данные пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/site/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление данных пользователя';

?>
<!-- Page Content -->
<div class="container">
   
   <h1 class="text-center">Редактировать данные пользователя</h1>

   <!-- <div class="row">
      <div class="col-2">
      </div>

      <div class="col-8"> -->
         <?php
            echo $this->render('_form', ['model' => $model, 'roles' => $roles])
         ?>
      <!-- </div>

      <div class="col-2">
      </div>
   </div> -->
</div>