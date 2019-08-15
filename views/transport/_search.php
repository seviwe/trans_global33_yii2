<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TransportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
        // 'options' => [
        //     'data-pjax' => 1
        // ],
    ]); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'name_city_departure')->textInput(['maxlength' => true, 'id' => 'name_city_departure']) ?>

            <?= $form->field($model, 'id_city_departure')->textInput(['maxlength' => true, 'type' => 'hidden', 'id' => 'id_city_departure'])->label(false) ?>

            <?= $form->field($model, 'name_city_arrival')->textInput(['maxlength' => true, 'id' => 'name_city_arrival']) ?>

            <?= $form->field($model, 'id_city_arrival')->textInput(['maxlength' => true, 'type' => 'hidden', 'id' => 'id_city_arrival'])->label(false) ?>

            <?php
            echo $form->field($model, 'date_departure')->widget(
                DatePicker::className(),
                [
                    'name' => 'date_departure',
                    'options' => ['placeholder' => 'Введите дату отгрузки...'],
                    //'convertFormat' => true,
                    'value' =>  Yii::$app->request->post('date_departure'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy',
                        'weekStart' => 1, //неделя начинается с понедельника
                        'startDate' => '01.07.2019', //самая ранняя возможная дата
                        'todayBtn' => true, //снизу кнопка "сегодня"
                    ]
                ]
            );
            ?>

            <?php
            echo $form->field($model, 'date_arrival')->widget(
                DatePicker::className(),
                [
                    'name' => 'date_arrival',
                    'options' => ['placeholder' => 'Введите дату погрузки...'],
                    //'convertFormat' => true,
                    'value' =>  Yii::$app->request->post('date_arrival'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy',
                        'weekStart' => 1, //неделя начинается с понедельника
                        'startDate' => '01.07.2019', //самая ранняя возможная дата
                        'todayBtn' => true, //снизу кнопка "сегодня"
                    ]
                ]
            );
            ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'volume') ?>

            <?= $form->field($model, 'body_dimensions') ?>

            <?= $form->field($model, 'capacity') ?>

            <?= $form->field($model, 'rate') ?>

            <?= $form->field($model, 'info') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Найти транспорт', ['class' => 'btn btn-primary mr-3']) ?>
        <?= Html::resetButton('Очистить поиск', ['class' => 'btn btn-outline-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>