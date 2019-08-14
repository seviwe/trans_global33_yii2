<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Обновить заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Просмотр заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Обновление заказа №' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление заказа';
?>
<div class="container">

    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title text-center"><?= Html::encode($this->title) ?></h2>
            <hr>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>