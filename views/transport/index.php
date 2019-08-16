<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->title = 'Информация о транспорте';
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
} else {
    if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isCarrierC() || Yii::$app->user->getIdentity()->isCarrierP())) {
        $this->title = 'Информация о вашем транспорте';
    } else {
        $this->title = 'Поиск транспорта';
    }
}

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">

    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <p>
        <?
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            echo Html::a('Добавить транспорт', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php
    if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                ['attribute' => 'userName', 'label' => 'Пользователь', 'value' => 'user.name'],
                'volume',
                'body_dimensions',
                'capacity',
                'name_city_departure',
                'name_city_arrival',
                'date_departure',
                'date_arrival',
                'rate',
                'info',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '50'],
                    'template' => '{view} {update} {delete} {view_user}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о транспорте',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            if ($model->order->status != 2 && $model->order->status != 3) {
                                return Html::a('<span class="fas fa-edit"></span>', $url, [
                                    'title' => 'Обновить информацию о транспорте',
                                ]);
                            }
                        },
                        'delete' => function ($url, $model) {
                            if ($model->order->status != 2 && $model->order->status != 3) {
                                return Html::a('<span class="fas fa-trash"></span>', $url, [
                                    'title' => 'Удалить транспорт',
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => 'Вы уверены что хотите удалить данный транспорт?',
                                    ]
                                ]);
                            }
                        },
                        'view_user' => function ($url, $model) {
                            $url = '/web/users/view?id=' . $model->id_user;
                            return Html::a('<span class="fas fa-user-tie"></span>', $url, [
                                'title' => 'Просмотр информации о грузоперевозчике',
                            ]);
                        },
                    ],
                ],
            ],
        ]);
    } else {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'volume',
                'body_dimensions',
                'capacity',
                'name_city_departure',
                'name_city_arrival',
                'date_departure',
                'date_arrival',
                'rate',
                'info',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '50'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о транспорте',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            if ($model->order->status != 2 && $model->order->status != 3) {
                                return Html::a('<span class="fas fa-edit"></span>', $url, [
                                    'title' => 'Обновить информацию о транспорте',
                                ]);
                            }
                        },
                        'delete' => function ($url, $model) {
                            if ($model->order->status != 2 && $model->order->status != 3) {
                                return Html::a('<span class="fas fa-trash"></span>', $url, [
                                    'title' => 'Удалить транспорт',
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => 'Вы уверены что хотите удалить данный транспорт?',
                                    ]
                                ]);
                            }
                        },
                    ],
                ],
            ],
        ]);
    }

    ?>

</div>

<?php
$js = <<<JS
    $('th').css('font-size','14px');
JS;
$this->registerJs($js);
?>