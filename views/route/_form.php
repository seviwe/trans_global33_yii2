<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Route */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_city_departure')->dropDownList(ArrayHelper::map($cities, 'id', 'name'), ['prompt' => 'Выберите н/п отбытия', 'id' => 'id_city_departure']) ?>

    <?= $form->field($model, 'id_city_arrival')->dropDownList(ArrayHelper::map($cities, 'id', 'name'), ['prompt' => 'Выберите н/п прибытия', 'id' => 'id_city_arrival']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
