<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) { 
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
    $this->params['breadcrumbs'][] = ['label' => 'Информация о грузах', 'url' => ['/load-information/index']];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/site/admin']];
    $this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['/users/index']];
}
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>

<div class="container">
    <h1 class="text-center">Пользователи</h1>

    <p>
        <?= Html::a('Обновить данные пользователя', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить пользователя', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данного пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'login',
            'name',
            'phone',
            'email:email',
            'roleName.name',
        ],
    ]) ?>

</div>