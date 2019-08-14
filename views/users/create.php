<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Создание пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/site/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title text-center"><?= Html::encode($this->title) ?></h2>
            <hr>
            <?= $this->render('_form', [
                'model' => $model, 'roles' => $roles,
            ]) ?>

        </div>
    </div>
</div>