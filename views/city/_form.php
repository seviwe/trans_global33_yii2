<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'name_city']) ?>

    <?= $form->field($model, 'id_region')->dropDownList(ArrayHelper::map($regions, 'id', 'name'), ['prompt' => 'Выберите область', 'id' => 'region']) ?>

    <?= $form->field($model, 'id_kladr_city')->textInput(['id' => 'kladr_city']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>