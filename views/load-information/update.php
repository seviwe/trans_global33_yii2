<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */

$this->title = 'Обновить информацию о грузе: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Информация о грузах', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление информации о грузах';
?>

<div class="container">
   <div class="card">
      <div class="card-body">
         <h2 class="card-title text-center"><?= Html::encode($this->title) ?></h2>
         <hr>
         <?php
         echo $this->render('_form', ['model' => $model])
         ?>
      </div>
   </div>
</div>

<?php
Yii::$app->view->registerJsFile('/web/js/select_city.js');
?>​