<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="load-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_route')->textInput() ?>

    <?= $form->field($model, 'weight_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_create')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_departure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_arrival')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
