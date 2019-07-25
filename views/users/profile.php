<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Личный кабинет | Глобал Транс 33';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<!-- Page Content -->
<div class="container">

    <?php if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success alert-dismissible mt-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <br>

    <!-- Page Heading/Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Главная</a>
        </li>
        <li class="breadcrumb-item active">Личный кабинет</li>
    </ol>
    <h1 class="text-center">Личный кабинет</h1>

    <p class="text-center">Здесь Вы можете посмотреть информацию о Вашей учетной записи, а также, при необходимости, изменить контактные данные.</p>


    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6">
            <?php //echo $this->render('_form', ['model' => $model,]) 
            ?>

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

        <div class="col-3">
        </div>
    </div>
</div>