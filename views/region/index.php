<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RegionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Области';
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
        <li class="breadcrumb-item active">Области</li>
    </ol>
    <h1 class="text-center">Области</h1>

    <p>
        <?= Html::a('Создать область', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'federal_district',
            'id_kladr_region',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = 'index.php?r=region/view&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = 'index.php?r=region/update&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = 'index.php?r=region/delete&id=' . $model->id;
                        return $url;
                    }
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fas fa-eye"></span>', $url, [
                            'title' => 'Просмотр информации об области',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fas fa-edit"></span>', $url, [
                            'title' => 'Обновить информацию об области',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fas fa-trash"></span>', $url, [
                            'title' => 'Удалить область',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Вы уверены что хотите удалить данную область?',
                            ]
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>