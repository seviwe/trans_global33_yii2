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
if (!Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => 'Информация о транспорте', 'url' => ['index']];
}
if (Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => 'Расширенный поиск транспорта', 'url' => ['search']];
}
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

?>
<div class="container">

    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <p>
        <?
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            echo Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены что хотите удалить данную машину?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
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