<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Route */

$this->title = 'Создание маршрута';
$this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
$this->params['breadcrumbs'][] = ['label' => 'Маршруты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', ['model' => $model, 'cities' => $cities,])
    ?>

</div>