<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = 'Обновить н/п: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
<br>
    <h1 class="text-center"> <?= Html::encode($this->title) ?> </h1>

    <div class="row">
      <div class="col-2">
      </div>

      <div class="col-8">
         <?php
            echo $this->render('_form', ['model' => $model,])
         ?>
      </div>

      <div class="col-2">
      </div>
   </div>
</div>
