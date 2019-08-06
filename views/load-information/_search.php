<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="load-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name_city_departure') ?>

    <?= $form->field($model, 'name_city_arrival') ?>

    <?= $form->field($model, 'weight_from') ?>

    <?= $form->field($model, 'volume_from') ?>

    <?= $form->field($model, 'transport') ?>

    <?= $form->field($model, 'load_info') ?>

    <?= $form->field($model, 'rate') ?>

    <?= $form->field($model, 'date_departure') ?>

    <?= $form->field($model, 'date_arrival') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск груза', ['class' => 'btn btn-primary mr-3']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>