<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расширенный поиск транспорта';

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">

    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <div id="accordion" class="mb-4">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Фильтры поиска (нажмите чтобы открыть/закрыть)
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <?= $this->render('_search', ['model' => $searchModel]) ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($dataProvider->query->where) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'options' => ['class' => 'table-responsive'],
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
                    'headerOptions' => ['width' => '20'],
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="fas fa-eye"></span>', $url, [
                                'title' => 'Просмотр полной информации о транспорте',
                            ]);
                        }
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

Yii::$app->view->registerJsFile('/web/js/select_city.js');

?>