<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

 $this->title = 'Личный кабинет';
// $this->params['breadcrumbs'][] = 'Обновление данных пользователя';

?>
<!-- Page Content -->
<div class="container">

    <h1 class="text-center">Личный кабинет</h1>

    <p class="text-center">Здесь Вы можете посмотреть информацию о Вашей учетной записи, а также, при необходимости, изменить контактные данные.</p>


    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-6 col-md-6">

            <?php $form = ActiveForm::begin(); ?>

            <div class="card mb-4 my-1">
                <div class="card-body">
                    <h5>Данные для авторизации на сайте</h5>
                    <hr>

                    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5>Контактные данные пользователя</h5>
                    <hr>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>