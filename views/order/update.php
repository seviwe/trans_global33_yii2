<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Обновить заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Просмотр заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Обновление заказа №'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление заказа';
?>
<div class="container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
