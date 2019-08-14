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
// $this->params['breadcrumbs'][] = $this->title;

?>
<!-- Page Content -->
<div class="container mb-4">

   <div class="row justify-content-center">
      <!-- Forms -->
      <div class="col-6">
         <div class="card">
            <div class="card-body">
               <h2 class="card-title text-center">Регистрация</h2>
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
         </div>
      </div>
   </div>
</div>