<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */

$this->title = $model->name;

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
}
$this->params['breadcrumbs'][] = ['label' => 'Информация о машинах', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

?>
<div class="container">

    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данную машину?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'user.name',
            'volume',
            'body_dimensions',
            'capacity',
            //'id_city_departure',
            'name_city_departure',
            //'id_city_arrival',
            'name_city_arrival',
            'date_departure',
            'date_arrival',
            'rate',
            'info',
        ],
    ]) ?>

</div>