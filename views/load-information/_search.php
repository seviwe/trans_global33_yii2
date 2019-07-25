<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="load-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_route') ?>

    <?= $form->field($model, 'weight_from') ?>

    <?= $form->field($model, 'weight_to') ?>

    <?= $form->field($model, 'volume_from') ?>

    <?php // echo $form->field($model, 'volume_to') ?>

    <?php // echo $form->field($model, 'transport') ?>

    <?php // echo $form->field($model, 'load_info') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_departure') ?>

    <?php // echo $form->field($model, 'date_arrival') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
