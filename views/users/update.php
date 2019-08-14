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

   <div class="card mb-3">
      <div class="card-body">
         <h2 class="card-title text-center"><?= Html::encode($this->title) ?></h2>
         <hr>
         <?php
         echo $this->render('_form', ['model' => $model, 'roles' => $roles])
         ?>
      </div>
   </div>
</div>