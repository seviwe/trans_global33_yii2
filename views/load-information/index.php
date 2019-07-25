<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация о грузах';
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
        <li class="breadcrumb-item active">Информация о грузах</li>
    </ol>
    <h1 class="text-center">Информация о грузах</h1>

    <p>
        <?= Html::a('Создать груз', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_route',
            'weight_from',
            'weight_to',
            'volume_from',
            'volume_to',
            'transport',
            'load_info',
            'rate',
            'date_create',
            'date_departure',
            'date_arrival',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '',
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
    ]); ?>

</div>

<?php
$js = <<<JS
    $('th').css('font-size','13px');
JS;
$this->registerJs($js);
?>