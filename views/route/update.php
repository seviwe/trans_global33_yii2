<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Route */

$this->title = 'Обновить маршрут: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
$this->params['breadcrumbs'][] = ['label' => 'Маршруты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление маршрута';
?>
<div class="container">
    <h1 class="text-center"> <?= Html::encode($this->title) ?> </h1>

    <!-- <div class="row">
        <div class="col-2">
        </div>

        <div class="col-8"> -->
    <?php
    echo $this->render('_form', ['model' => $model, 'cities' => $cities])
    ?>
    <!-- </div>

        <div class="col-2">
        </div>
    </div> -->
</div>