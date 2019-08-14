<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?= $form->field($model, 'id_city_departure')->textInput(['maxlength' => true, 'type' => 'hidden', 'id' => 'id_city_departure'])->label(false) ?>

            <?= $form->field($model, 'name_city_departure')->textInput(['maxlength' => true, 'id' => 'name_city_departure']) ?>

            <?= $form->field($model, 'id_city_arrival')->textInput(['maxlength' => true, 'type' => 'hidden', 'id' => 'id_city_arrival'])->label(false) ?>

            <?= $form->field($model, 'name_city_arrival')->textInput(['maxlength' => true, 'id' => 'name_city_arrival']) ?>

            <?php
            echo $form->field($model, 'date_departure')->widget(
                DateTimePicker::className(),
                [
                    'name' => 'date_departure',
                    'type' => DateTimePicker::TYPE_INPUT,
                    'options' => ['placeholder' => 'Введите дату и время отбытия...'],
                    'value' => date("dd.mm.Y H:i", (int) $model->date_departure),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy HH:ii',
                        'weekStart' => 1, //неделя начинается с понедельника
                        'startDate' => '01.07.2019 00:00', //самая ранняя возможная дата
                        'todayBtn' => true, //снизу кнопка "сегодня"
                    ]
                ]
            );
            ?>

            <?php
            echo $form->field($model, 'date_arrival')->widget(
                DateTimePicker::className(),
                [
                    'name' => 'date_arrival',
                    'type' => DateTimePicker::TYPE_INPUT,
                    'options' => ['placeholder' => 'Введите дату и время прибытия...'],
                    'value' => date("dd.mm.Y H:i", (int) $model->date_departure),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy HH:ii',
                        'weekStart' => 1, //неделя начинается с понедельника
                        'startDate' => '01.07.2019 00:00', //самая ранняя возможная дата
                        'todayBtn' => true, //снизу кнопка "сегодня"
                    ]
                ]
            );
            ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?= $form->field($model, 'volume')->textInput() ?>

            <?= $form->field($model, 'body_dimensions')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'capacity')->textInput() ?>

            <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>