<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Авторизация | Глобал Транс 33';
// $this->params['breadcrumbs'][] = $this->title;

?>
<!-- Page Content -->
<div class="container mb-4">

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Авторизация</h2>
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
            </div>
        </div>
    </div>
</div>