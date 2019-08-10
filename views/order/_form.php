<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Transport;
use app\models\LoadInformation;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_load')->dropDownList(ArrayHelper::map(LoadInformation::find()->all(), 'id', 'fullName'), ['prompt' => 'Выберите груз...', 'id' => 'id_load']) ?>

    <?= $form->field($model, 'id_transport')->dropDownList(ArrayHelper::map(Transport::find()->all(), 'id', 'fullName'), ['prompt' => 'Выберите транспорт...', 'id' => 'id_transport']) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            '1' => 'Согласование',
            '2' => 'В исполнении',
            '3' => 'Завершено',
        ],
        [
            'prompt' => 'Выберите статус заказа...',
        ]
    );
    ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>