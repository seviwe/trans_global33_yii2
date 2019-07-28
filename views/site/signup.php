<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);

// $this->title = 'Регистрация';
// $this->params['breadcrumbs'][] = $this->title;

?>
<!-- Page Content -->
<div class="container">

   <h1 class="text-center">Регистрация</h1>

   <div class="row">
      <div class="col-2">
      </div>

      <!-- Forms -->
      <div class="col-8">
         <?php $form = ActiveForm::begin() ?>

         <?= $form->field($model, 'first_name')->textInput() ?>

         <?= $form->field($model, 'last_name')->textInput() ?>

         <?= $form->field($model, 'middle_name')->textInput() ?>

         <?= $form->field($model, 'login')->textInput() ?>

         <?= $form->field($model, 'password')->passwordInput() ?>

         <?= $form->field($model, 'phone')->input('tel') ?>
         
         <?= $form->field($model, 'email')->input('email') ?>

         <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary mb-4']) ?>

         <?php ActiveForm::end() ?>
      </div>

      <div class="col-2">
      </div>
   </div>
</div>