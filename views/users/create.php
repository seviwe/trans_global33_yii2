<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Создание пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <br>

    <h1 class="text-center">Создание пользователя</h1>

    <?= $this->render('_form', [
        'model' => $model, 'roles' => $roles,
    ]) ?>

</div>
