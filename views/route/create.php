<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Route */

$this->title = 'Создание маршрута';
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <br>

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', ['model' => $model, 'cities' => $cities,])
    ?>

</div>