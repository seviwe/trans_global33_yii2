<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'volume') ?>

    <?= $form->field($model, 'body_dimensions') ?>

    <?= $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'id_city_departure') ?>

    <?php // echo $form->field($model, 'name_city_departure') ?>

    <?php // echo $form->field($model, 'id_city_arrival') ?>

    <?php // echo $form->field($model, 'name_city_arrival') ?>

    <?php // echo $form->field($model, 'date_departure') ?>

    <?php // echo $form->field($model, 'date_arrival') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'info') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
