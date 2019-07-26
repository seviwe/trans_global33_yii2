<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Населённые пункты (н/п)';
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
        <li class="breadcrumb-item active">Населённые пункты</li>
    </ol>
    <h1 class="text-center">Населённые пункты</h1>

    <p>
        <?= Html::a('Создать н/п', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            //'id_region',
            // [
            //     'attribute' => 'Область',
            //     'value' => 'region.name',
            // ],
            ['attribute' => 'regionName', 'label' => 'Область', 'value' => 'region.name'],

            'id_kladr_city',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = 'index.php?r=city/view&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = 'index.php?r=city/update&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = 'index.php?r=city/delete&id=' . $model->id;
                        return $url;
                    }
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fas fa-eye"></span>', $url, [
                            'title' => 'Просмотр информации о н/п',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fas fa-edit"></span>', $url, [
                            'title' => 'Обновить информацию об н/п',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fas fa-trash"></span>', $url, [
                            'title' => 'Удалить н/п',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Вы уверены что хотите удалить данный н/п?',
                            ]
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>