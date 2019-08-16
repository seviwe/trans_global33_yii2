<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */

$this->title = $model->name;

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
}
if (!Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => 'Информация о грузах', 'url' => ['index']];
}
if (Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => 'Расширенный поиск грузов', 'url' => ['search']];
}
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">

    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <p>
        <?
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin()) && $model->order->status != 2 && $model->order->status != 3) {
            echo Html::a('Обновить информацию', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger ml-2',
                'data' => [
                    'confirm' => 'Вы уверены что хотите удалить данный груз?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.name',
            'name_city_departure',
            'name_city_arrival',
            'weight_from',
            'volume_from',
            'transport',
            'load_info',
            'rate',
            'date_create',
            'date_departure',
            'date_arrival',
        ],
    ]) ?>

</div>