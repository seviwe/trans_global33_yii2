<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->title = 'Информация о машинах';
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
} else {
    if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isCarrierC() || Yii::$app->user->getIdentity()->isCarrierP())) {
        $this->title = 'Информация о ваших машинах';
    } else {
        $this->title = 'Поиск машины';
    }
}

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p>
        <?
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            echo Html::a('Добавить машину', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php //Pjax::begin(); 
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php
    if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                ['attribute' => 'userName', 'label' => 'Пользователь', 'value' => 'user.name'],
                'volume',
                'body_dimensions',
                'capacity',
                //'id_city_departure',
                'name_city_departure',
                //'id_city_arrival',
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
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = 'index.php?r=transport/view&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = 'index.php?r=transport/update&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = 'index.php?r=transport/delete&id=' . $model->id;
                            return $url;
                        }
                    },
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о машине',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fas fa-edit"></span>', $url, [
                                'title' => 'Обновить информацию о машине',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fas fa-trash"></span>', $url, [
                                'title' => 'Удалить машину',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены что хотите удалить данную машину?',
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

                'volume',
                'body_dimensions',
                'capacity',
                //'id_city_departure',
                'name_city_departure',
                //'id_city_arrival',
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
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = 'index.php?r=transport/view&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = 'index.php?r=transport/update&id=' . $model->id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = 'index.php?r=transport/delete&id=' . $model->id;
                            return $url;
                        }
                    },
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр информации о машине',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fas fa-edit"></span>', $url, [
                                'title' => 'Обновить информацию о машине',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fas fa-trash"></span>', $url, [
                                'title' => 'Удалить машину',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены что хотите удалить данную машину?',
                                ]
                            ]);
                        },
                    ],
                ],
            ],
        ]);
    }

    ?>

    <?php //Pjax::end(); 
    ?>

</div>

<?php
$js = <<<JS
    $('th').css('font-size','14px');
JS;
$this->registerJs($js);
?>