<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

AppAsset::register($this);

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Page Content -->
<div class="container">
   <h1 class="text-center mb-3">Контакты</h1>

   <!-- Content Row -->
   <div class="row">
      <!-- Map Column -->
      <div class="col-lg-7 mb-4">
         <!-- Map -->
         <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9f5b5784e4a6a55ad633e358816e9d4b1d7a5a12da17cce529786edf8f1ba399&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-5 mb-4">
         <h3>Контактная информация</h3>
         <p>
            <abbr title="Адрес компании">Адрес</abbr>: г. Муром, ул. Московская, д.4 (Магазин "Маяк")
         </p>
         <p>
            <abbr title="Телефон">Телефон</abbr>: <a href="tel:8-905-055-55-95">8-905-055-55-95</a>
         </p>
         <p>
            <abbr title="Email">Адрес электронной почты</abbr>:
            <a href="mailto:trans@global33.ru">trans@global33.ru</a>
         </p>
         <p>
            <abbr title="Время работы">Время работы</abbr>: Круглосуточно
         </p>
         <h3>Реквизиты</h3>
         <p>ИП Тельнов Александр Сергеевич</p>
         <p>ОГРНИП 311333412600027</p>
         <p>ИНН 331906058175</p>
      </div>
   </div>
   <!-- /.row -->

   <!-- Contact Form -->
   <hr>
   <?php if (Yii::$app->session->hasFlash('success')) : ?>

      <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?php echo Yii::$app->session->getFlash('success'); ?>
      </div>

   <?php else : ?>
      <div class="row">
         <div class="col-lg-7 mb-4">
            <h3>Отправить сообщение</h3>
            <?php $form = ActiveForm::begin(['id' => 'contact_form']) ?>
            <div class="row">
               <div class="col-lg-12 mb-2">
                  <?= $form->field($model, 'name')->textInput() ?>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-6 mb-2">
                  <?= $form->field($model, 'phone_number')->input('tel') ?>
               </div>
               <div class="col-lg-6 mb-2">
                  <?= $form->field($model, 'email')->input('email') ?>
               </div>
            </div>
            <div class="control-group form-group">
               <?= $form->field($model, 'body')->textArea(['rows' => 10, 'cols' => 100, 'maxLength' => 999, 'style' => 'resize: none']) ?>
            </div>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
               'captchaAction' => '/site/captcha',
               'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-8">{input}</div></div>',
            ]) ?>

            <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-outline-primary', 'name' => 'contact-button']) ?>

            <?php ActiveForm::end() ?>
         <?php endif; ?>
      </div>
   </div>
   <!-- /.row -->
</div>