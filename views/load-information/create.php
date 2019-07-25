<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */

$this->title = 'Создание груза';
$this->params['breadcrumbs'][] = ['label' => 'Load Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <br>

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

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