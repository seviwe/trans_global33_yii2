<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация о маршрутах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <br>
    <!-- Page Heading/Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Главная</a>
        </li>
        <li class="breadcrumb-item">
            <?= Html::a('Панель логиста', ['site/logist']) ?>
        </li>
        <li class="breadcrumb-item active">Информация о маршрутах</li>
    </ol>
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать маршрут', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'id_city_departure',
            'id_city_arrival',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = 'index.php?r=route/view&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = 'index.php?r=route/update&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = 'index.php?r=route/delete&id=' . $model->id;
                        return $url;
                    }
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fas fa-eye"></span>', $url, [
                            'title' => 'Просмотр информации о маршруте',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fas fa-edit"></span>', $url, [
                            'title' => 'Обновить информацию о маршруте',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fas fa-trash"></span>', $url, [
                            'title' => 'Удалить маршрут',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Вы уверены что хотите удалить данный маршрут?',
                            ]
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>