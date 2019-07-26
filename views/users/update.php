<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Редактировать данные пользователя | Глобал Транс 33';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<!-- Page Content -->
<div class="container">
   <br>
   
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