<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = "Заказ №" . $model->id;
//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
}
$this->params['breadcrumbs'][] = ['label' => 'Просмотр заказов', 'url' => ['index']];
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
                    'confirm' => 'Вы уверены что хотите удалить данный заказ?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Груз',
                'value' => $model->load->name,
            ],
            [
                'label' => 'Транспорт',
                'value' => $model->transport->name,
            ],
            [
                'label' => 'Статус',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return '<span class="text-danger">Согласование</span>';
                    }
                    if ($model->status == 2) {
                        return '<span class="text-info">В исполнении</span>';
                    }
                    if ($model->status == 3) {
                        return '<span class="text-success">Завершено</span>';
                    }
                }
            ],
            'comment:ntext',
        ],
    ]) ?>

</div>