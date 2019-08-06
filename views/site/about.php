<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

$this->title = 'О Нас | Глобал Транс 33';
$this->params['breadcrumbs'][] = 'О Нас';

?>

<!-- Page Content -->
<div class="container">
   <h1 class="text-center">О Нас</h1>

   <!-- Intro Content -->
   <div class="row">
      <div class="col-lg-6">
         <div id="carouselSlides" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="img/slides/3.jpg" />
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="img/slides/2.jpg" />
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="img/slides/1.jpg" />
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <h2>Глобал Транс 33</h2>
         <p>
            Транспортная компания Глобал Транс 33 это подразделение, входящее в состав группы компаний <a href="https://global33.ru/">Глобал 33</a>.
            Мы занимаемся доставкой и перевозкой грузов от 1 килограмма до 20 тонн по всей России собственным и сторонним транспортом.
            Благодаря большому опыту работы в данной сфере, мы с уверенностью может заявлять о надежности нашей компании.
         </p>
         <p>
            Также Глобал Транс 33 предлагает работу грузоперевозчикам и помощь в поисках транспорта грузовладельцам.
            Если Вы работаете в сфере перевозок и готовы к сотрудничеству, или у Вас есть предложение, Вы можете написать нам через <a href="https://trans.global33.ru/contact">форму обратной связи</a> или оставить соответствующий комментарий в группе <a href="https://vk.com/public152682308">ВКонтакте</a>.
         </p>
      </div>
   </div>
   <!-- /.row -->

</div>
<!-- /.container -->