<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */

$this->title = 'Обновить информацию о машине: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Информация о машинах', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление информации о машине';
?>
<div class="container">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>