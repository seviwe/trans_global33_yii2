<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="load-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id_route')->dropDownList(ArrayHelper::map($routs, 'id', 'name'), ['prompt' => 'Выберите маршрут', 'id' => 'route']) ?>

    <?= $form->field($model, 'name_city_departure')->textInput(['maxlength' => true, 'id' => 'name_city_departure']) ?>

    <?= $form->field($model, 'id_city_departure')->textInput(['maxlength' => true, 'type' => 'hidden', 'id' => 'id_city_departure'])->label(false) ?>

    <?= $form->field($model, 'name_city_arrival')->textInput(['maxlength' => true, 'id' => 'name_city_arrival']) ?>

    <?= $form->field($model, 'id_city_arrival')->textInput(['maxlength' => true, 'type' => 'hidden', 'id' => 'id_city_arrival'])->label(false) ?>

    <?= $form->field($model, 'weight_from')->textInput(['maxlength' => true]) ?>

    <? //echo $form->field($model, 'weight_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_from')->textInput(['maxlength' => true]) ?>

    <? //echo $form->field($model, 'volume_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'date_create')->textInput(['maxlength' => true]); ?>

    <?php //echo $form->field($model, 'date_departure')->textInput(['maxlength' => true]); 
    ?>

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

    <? //echo $form->field($model, 'date_arrival')->textInput(['maxlength' => true]); ?>

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
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>