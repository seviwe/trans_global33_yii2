<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Page Content -->
<div class="container">
    <br>
    <!-- Page Heading/Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Главная</a>
        </li>
        <li class="breadcrumb-item">
            <?= Html::a('Панель администратора', ['site/admin']) ?>
        </li>
        <li class="breadcrumb-item active">Пользователи</li>
    </ol>
    <h1 class="text-center">Пользователи</h1>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'login',
            'name',
            'phone',
            'email:email',
            //'role',
            ['attribute' => 'roleName', 'label' => 'Роль', 'value' => 'roleName.name'],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                //'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = 'index.php?r=users/view&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = 'index.php?r=users/update&id=' . $model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = 'index.php?r=users/delete&id=' . $model->id;
                        return $url;
                    }
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fas fa-eye"></span>', $url, [
                            'title' => 'Просмотр даннных пользователя',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fas fa-user-edit"></span>', $url, [
                            'title' => 'Обновить данные пользователя',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fas fa-user-times"></span>', $url, [
                            'title' => 'Удалить пользователя',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Вы уверены что хотите удалить данного пользователя?',
                            ]
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <br>
</div>