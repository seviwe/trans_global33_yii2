<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="load-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?= $form->field($model, 'weight_from') ?>

            <?= $form->field($model, 'volume_from') ?>

            <?= $form->field($model, 'transport') ?>

            <?= $form->field($model, 'load_info') ?>

            <?= $form->field($model, 'rate') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Найти грузы', ['class' => 'btn btn-primary mr-3 search_loads']) ?>
        <?= Html::resetButton('Очистить поиск', ['class' => 'btn btn-outline-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>