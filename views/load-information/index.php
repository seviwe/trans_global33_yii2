<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->title = 'Информация о грузах';
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
} else {
    if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isUser()) {
        $this->title = 'Информация о ваших грузах';
    } else {
        $this->title = 'Поиск груза';
    }
}

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
    <h1 class="text-center"><?= $this->title ?></h1>

    <p>
        <?
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            echo Html::a('Добавить груз', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php
    if (Yii::$app->user->isGuest){
        echo $this->render('_search', ['model' => $searchModel]);
    }
    ?>

    <?
    if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_route',
                ['attribute' => 'userName', 'label' => 'Пользователь', 'value' => 'user.name'],
                //['attribute' => 'routeName', 'label' => 'Маршрут', 'value' => 'route.name'],
                'name_city_departure',
                'name_city_arrival',
                'weight_from',
                //'weight_to',
                'volume_from',
                //'volume_to',
                'transport',
                'load_info',
                'rate',
                //'date_create',
                'date_departure',
                'date_arrival',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '50'],
                    'template' => '{view} {update} {delete}',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = 'index.php?r=load-information/view&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = 'index.php?r=load-information/update&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = 'index.php?r=load-information/delete&id=' . $model->id;
                            return $url;
                        }
                    },
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о грузе',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fas fa-edit"></span>', $url, [
                                'title' => 'Обновить информацию о грузе',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fas fa-trash"></span>', $url, [
                                'title' => 'Удалить груз',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены что хотите удалить данный груз?',
                                ]
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

                //'id_route',
                //['attribute' => 'routeName', 'label' => 'Маршрут', 'value' => 'route.name'],
                'name_city_departure',
                'name_city_arrival',
                'weight_from',
                //'weight_to',
                'volume_from',
                //'volume_to',
                'transport',
                'load_info',
                'rate',
                //'date_create',
                'date_departure',
                'date_arrival',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '50'],
                    'template' => '{view} {update} {delete}',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = 'index.php?r=load-information/view&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = 'index.php?r=load-information/update&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = 'index.php?r=load-information/delete&id=' . $model->id;
                            return $url;
                        }
                    },
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о грузе',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fas fa-edit"></span>', $url, [
                                'title' => 'Обновить информацию о грузе',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fas fa-trash"></span>', $url, [
                                'title' => 'Удалить груз',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены что хотите удалить данный груз?',
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

<?php
$js = <<<JS
    $('th').css('font-size','14px');
JS;
$this->registerJs($js);
?>