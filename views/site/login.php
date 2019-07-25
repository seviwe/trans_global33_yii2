<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;

?>
<!-- Page Content -->
<div class="container">
    <br>
    <!-- Page Heading/Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Главная</a>
        </li>
        <li class="breadcrumb-item active">Авторизация</li>
    </ol>
    <h1 class="text-center">Авторизация</h1>

    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 col-lg-5\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>