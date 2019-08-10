<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/site/admin']];
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Page Content -->
<div class="container">
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