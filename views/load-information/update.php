<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */

$this->title = 'Обновить информацию о грузе: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Информация о грузах', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление информации о грузах';
?>
<div class="container">
    <h1 class="text-center"> <?= Html::encode($this->title) ?> </h1>
    <?php
    echo $this->render('_form', ['model' => $model])
    ?>
</div>