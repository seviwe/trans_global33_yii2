<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'region']) ?>

    <?= $form->field($model, 'federal_district')->textInput(['maxlength' => true,'id' => 'federal_district']) ?>

    <?= $form->field($model, 'id_kladr_region')->textInput(['maxlength' => true, 'id' => 'kladr_region']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
