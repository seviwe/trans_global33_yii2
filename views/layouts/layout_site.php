<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="keywords" content="<?php echo $keywords; ?>" />
   <meta name="google-site-verification" content="I6qgv8AUa4eHEM6CKlBQYRdYnxmvB2gbqV390wb5jIw" />
   <title><?= Html::encode($this->title) ?></title>
   <?php $this->registerCsrfMetaTags() ?>
   <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap&subset=cyrillic" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
   <!-- ReCaptcha JavaScript-->
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <!-- Yandex.Metrika counter -->
   <script type="text/javascript">
      (function(d, w, c) {
         (w[c] = w[c] || []).push(function() {
            try {
               w.yaCounter47237025 = new Ya.Metrika({
                  id: 47237025,
                  clickmap: true,
                  trackLinks: true,
                  accurateTrackBounce: true
               });
            } catch (e) {}
         });

         var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function() {
               n.parentNode.insertBefore(s, n);
            };
         s.type = "text/javascript";
         s.async = true;
         s.src = "https://mc.yandex.ru/metrika/watch.js";

         if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
         } else {
            f();
         }
      })(document, window, "yandex_metrika_callbacks");
   </script>
   <noscript>
      <div><img src="https://mc.yandex.ru/watch/47237025" style="position:absolute; left:-9999px;" alt="" /></div>
   </noscript>
   <style>
      .breadcrumb>li+li:before {
         padding: 0 5px;
         content: "/";
      }
   </style>
   <!-- /Yandex.Metrika counter -->
   <?php $this->head() ?>
</head>

<body>
   <?php $this->beginBody() ?>

   <!-- Navigation -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow p-1">
      <div class="container">

         <a class="navbar-brand" href="index.php">
            <img class="img-fluid" style="height: 60px;" src="img/logo-gt.png" />
         </a>

         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                  <?= Html::a('О нас', ['site/about'], ['class' => 'nav-link', 'style' => 'font-size: 15px']); ?>
               </li>
               <li class="nav-item">
                  <?= Html::a('Контакты', ['site/contact'], ['class' => 'nav-link', 'style' => 'font-size: 15px']); ?>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <?php
                  if (Yii::$app->user->isGuest) {
                     echo Html::a('Вход', ['site/login'], ['class' => 'btn btn-outline-primary mr-3', 'style' => 'font-size: 15px', 'role' => 'button']);
                  } ?>
               </li>
               <li class="nav-item">
                  <?php
                  if (Yii::$app->user->isGuest) {
                     echo Html::a('Регистрация', ['site/change-user'], ['class' => 'btn btn-primary', 'style' => 'font-size: 15px', 'role' => 'button']);
                  } elseif (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isUser()) {
                     echo Html::a('Ваши грузы', ['load-information/index'], ['class' => 'btn btn-outline-warning mr-3', 'style' => 'font-size: 15px', 'role' => 'button']);
                  }
                  ?>
               </li>
               <li class="nav-item active">
                  <?php
                  if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isUser()) {
                     echo Html::a('Добавить груз', ['load-information/create'], ['class' => 'btn btn-outline-info mr-3', 'style' => 'font-size: 15px', 'role' => 'button']);
                  } elseif (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isAdmin()) {
                     echo Html::a('Панель администратора', ['site/admin'], ['class' => 'btn btn-outline-dark mr-3', 'style' => 'font-size: 15px', 'role' => 'button']);
                  } elseif (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
                     echo Html::a('Панель логиста', ['site/logist'], ['class' => 'btn btn-outline-info mr-3', 'style' => 'font-size: 15px', 'role' => 'button']);
                  }
                  ?>
               </li>
               <li class="nav-item active">
                  <?php
                  if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isAdmin()) {
                     echo Html::a('Панель логиста', ['site/logist'], ['class' => 'btn btn-outline-info mr-3', 'style' => 'font-size: 15px', 'role' => 'button']);
                  }
                  ?>
               </li>
               <li class="nav-item active">
                  <?php
                  if (!Yii::$app->user->isGuest) {
                     if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isAdmin()) {
                        echo Html::a('Личный кабинет (Админ)', ['users/profile'], ['class' => 'nav-link', 'style' => 'font-size: 15px']);
                     } elseif (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
                        echo Html::a('Личный кабинет (Логист)', ['users/profile'], ['class' => 'nav-link', 'style' => 'font-size: 15px']);
                     } else {
                        $user = new User();
                        $login = $user->getLogin(); //логин текущего пользователя
                        echo Html::a('Личный кабинет (' . $login . ')', ['users/profile'], ['class' => 'nav-link', 'style' => 'font-size: 15px']);
                     }
                  } ?>
               </li>
               <li class="nav-item active">
                  <?php
                  if (!Yii::$app->user->isGuest) {
                     echo Html::a('Выйти', ['site/logout'], [
                        'class' => 'nav-link', 'style' => 'font-size: 15px',
                        'data' => [
                           'confirm' => 'Вы уверены что хотите выйти?',
                           'method' => 'post',
                        ],
                     ]);
                  } ?>
               </li>
            </ul>
         </div>

      </div>
   </nav>

   <br>

   <div class="container">
      <br>
      <?= Breadcrumbs::widget([
         'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
   </div>

   <!-- Container Content -->
   <?= $content ?>

   <?php $this->endBody() ?>
</body>

<!-- Footer -->
<footer class="site-footer py-5 bg-dark">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-5">
            <h6>Связаться с нами</h6>
            <ul class="footer-icons">
               <li><i class="fa fa-map-marker"></i> г. Муром, ул. Московская, д.4 (Магазин "Маяк")</li>
               <li><i class="fa fa-phone"></i> <a href="tel:8-905-055-55-95">8-905-055-55-95</a></li>
               <li><i class="fa fa-envelope-o"></i> <a href="mailto:trans@global33.ru">trans@global33.ru</a></li>
            </ul>
         </div>
         <div class="col-xs-6 col-md-4">
            <h6>Реквизиты</h6>
            <p>ИП Тельнов Александр Сергеевич<br />
               ОГРНИП 311333412600027<br />
               ИНН 331906058175</p>
         </div>
         <div class="col-xs-6 col-md-3">
            <h6>Навигация</h6>
            <ul class="footer-links">
               <li> <?= Html::a('Главная', ['site/index']); ?> </li>
               <li> <?= Html::a('О нас', ['site/about']); ?> </li>
               <li> <?= Html::a('Контакты', ['site/contact']); ?> </li>
               <li>
                  <?php
                  echo "<li>";
                  if (Yii::$app->user->isGuest) {
                     echo Html::a('Регистрация', ['site/change-user']);
                  } else {
                     echo Html::a('Личный кабинет', ['users/profile']);
                  }
                  echo "</li>";
                  ?>
            </ul>
         </div>
      </div>
      <hr />
   </div>

   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text"><a href="https://trans.global33.ru/">Глобал Транс 33</a> | <a href="https://global33.ru/">Глобал 33</a> &copy; 2019</p>
         </div>
         <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
               <li><a class="vk" href="https://vk.com/public152682308"><i class="fa fa-vk"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- /.container -->
</footer>

</html>
<?php $this->endPage() ?>