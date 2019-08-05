<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */

$this->title = 'Добавление груза';

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
    $this->params['breadcrumbs'][] = ['label' => 'Информация о грузах', 'url' => ['index']];
}

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', ['model' => $model, 'routs' => $routs,])
    ?>
</div>