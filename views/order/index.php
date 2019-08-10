<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Просмотр заказов';
//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            echo Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']);
        } ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?
    //если логист или админ
    if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                ['attribute' => 'loadName', 'label' => 'Груз', 'value' => 'load.name'],
                ['attribute' => 'transportName', 'label' => 'Транспорт', 'value' => 'transport.name'],
                [
                    'attribute' => 'status',
                    'filter' => [
                        1 => 'Согласование',
                        2 => 'В исполнении',
                        3 => 'Завершено',
                    ],
                    // 'filter' => Html::dropDownList(
                    //     $model,
                    //     'status',
                    //     [
                    //         1 => 'Согласование',
                    //         2 => 'В исполнении',
                    //         3 => 'Завершено',
                    //     ],
                    //     [
                    //         'prompt' => 'Все'
                    //     ]
                    // ),
                    'label' => 'Статус',
                    'value' => function ($model) {
                        if ($model->status == 1) {
                            return "Согласование";
                        }
                        if ($model->status == 2) {
                            return "В исполнении";
                        }
                        if ($model->status == 3) {
                            return "Завершено";
                        }
                    },
                ],
                [
                    'attribute' => 'comment',
                    'filter' => false,
                    'value' => function ($model) {
                        if ($model->comment == "") {
                            return "отсутствует";
                        } else {
                            return $model->comment;
                        }
                    },
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '70'],
                    'template' => '{view} {update} {delete} {view_carrier} {view_user}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о заказе',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fas fa-edit"></span>', $url, [
                                'title' => 'Обновить информацию о заказе',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fas fa-trash"></span>', $url, [
                                'title' => 'Удалить груз',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены что хотите удалить данный заказ?',
                                ]
                            ]);
                        },
                        'view_carrier' => function ($url, $model) {
                            $url = '/web/users/view?id=' . $model->transport->id_user;
                            return Html::a('<span class="fas fa-user-tie"></span>', $url, [
                                'title' => 'Просмотр информации о грузоперевозчике',
                            ]);
                        },
                        'view_user' => function ($url, $model) {
                            $url = '/web/users/view?id=' . $model->load->id_user;
                            return Html::a('<span class="fas fa-user-circle"></span>', $url, [
                                'title' => 'Просмотр информации о грузовладельце',
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

                ['attribute' => 'loadName', 'label' => 'Груз', 'value' => 'load.name'],
                ['attribute' => 'transportName', 'label' => 'Транспорт', 'value' => 'transport.name'],
                [
                    'attribute' => 'status',
                    'filter' => [
                        1 => 'Согласование',
                        2 => 'В исполнении',
                        3 => 'Завершено',
                    ],
                    'label' => 'Статус',
                    'value' => function ($model, $key, $index, $column) {
                        if ($model->status == 1) {
                            return "Согласование";
                        }
                        if ($model->status == 2) {
                            return "В исполнении";
                        }
                        if ($model->status == 3) {
                            return "Завершено";
                        }
                    },
                ],
                [
                    'label' => 'Комментарий',
                    'attribute' => 'comment',
                    'filter' => false,
                    'value' => function ($model) {
                        if ($model->comment == "") {
                            return "отсутствует";
                        } else {
                            return $model->comment;
                        }
                    },
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '70'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о заказе',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fas fa-edit"></span>', $url, [
                                'title' => 'Обновить информацию о заказе',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fas fa-trash"></span>', $url, [
                                'title' => 'Удалить груз',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены что хотите удалить данный заказ?',
                                ]
                            ]);
                        },
                    ],
                ],
            ],
        ]);
    }
    ?>


</div>