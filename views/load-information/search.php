<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск грузов';

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
   <h1 class="text-center"><?= $this->title ?></h1>

   <div id="accordion" class="mb-4">
      <div class="card">
         <div class="card-header" id="headingOne">
            <h5 class="mb-0">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Фильтры поиска (нажмите чтобы открыть)
               </button>
            </h5>
         </div>

         <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
               <?= $this->render('_search', ['model' => $searchModel]) ?>
            </div>
         </div>
      </div>
   </div>

   <?
   echo GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
         ['class' => 'yii\grid\SerialColumn'],

         'name_city_departure',
         'name_city_arrival',
         'weight_from',
         'volume_from',
         'transport',
         'load_info',
         'rate',
         //'date_create',
         'date_departure',
         'date_arrival',

         [
            'class' => 'yii\grid\ActionColumn',
            'header' => '',
            'headerOptions' => ['width' => '20'],
            'template' => '{view}',
            'urlCreator' => function ($action, $model, $key, $index) {
               if ($action === 'view') {
                  $url = 'index.php?r=load-information/view&id=' . $model->id;
                  return $url;
               }
            },
            'buttons' => [
               'view' => function ($url, $model) {
                  return Html::a('<span class="fas fa-eye"></span>', $url, [
                     'title' => 'Просмотр полной информации о грузе',
                  ]);
               },
            ],
         ],
      ],
   ]);
   ?>

</div>

<?php
$js = <<<JS
    $('th').css('font-size','14px');
JS;
$this->registerJs($js);
?>