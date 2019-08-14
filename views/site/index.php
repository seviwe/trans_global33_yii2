<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

AppAsset::register($this);

$this->title = 'Главная | Грузоперевозки по РФ';

?>

<!-- Page Content -->
<div class="container">
   <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">
            <div class="carousel-item active img-fluid" style="background-image: url('/web/img/slide-full.jpg')"></div>
         </div>
      </div>
   </header>

   <!-- Section Features -->
   <h2 class="my-4 text-center">Выбирая Глобал Транс 33, Вы получаете</h2>

   <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
         <div class="card h-100">
            <div class="card-body">
               <h4 class="card-title text-center">Качественный сервис</h4>
               <div class="card-image text-center">
                  <img class="img-fluid" src="/web/img/icon-1.png" alt="" />
               </div>
               <p class="card-text text-center">Большой опыт работы позволяет с уверенностью заявлять о надежности нашей компании</p>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
         <div class="card h-100">
            <div class="card-body">
               <h4 class="card-title text-center">Быструю доставку</h4>
               <div class="card-image text-center">
                  <img class="img-fluid" src="/web/img/icon-2.png" alt="" />
               </div>
               <p class="card-text text-center">Осуществляем перевозку грузов по РФ (ЦФО) сторонним и собственным транспортом</p>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
         <div class="card h-100">
            <div class="card-body">
               <h4 class="card-title text-center">Выгодные цены</h4>
               <div class="card-image text-center">
                  <img class="img-fluid" src="/web/img/icon-3.png" alt="" />
               </div>
               <p class="card-text text-center">Приемлемая стоимость на все виды предлагаемых услуг</p>
            </div>
         </div>
      </div>
   </div>
   <!-- /.row -->

   <!--Section Search Goods-->
   <?php Pjax::begin(['enablePushState' => false]) ?>
   <div class="card">
      <div class="card-body">
         <h2 class="card-title text-center mb-3">Поиск грузов</h2>
         <?= Html::beginForm(['site/cargo-search'], 'post', ['data-pjax' => ''/*, 'class' => 'form-inline'*/]); ?>
         <div class="row">
            <div class="col-12">
               <div class="row">
                  <div class="col-6">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'name_city_departure', Yii::$app->request->post('name_city_departure'), ['class' => 'form-control', 'id' => 'name_city_departure', 'placeholder' => 'Откуда']) ?>
                        <?= Html::input('hidden', 'id_city_departure', Yii::$app->request->post('id_city_departure'), ['id' => 'id_city_departure', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'name_city_arrival', Yii::$app->request->post('name_city_arrival'), ['class' => 'form-control', 'id' => 'name_city_arrival', 'placeholder' => 'Куда']) ?>
                        <?= Html::input('hidden', 'id_city_arrival', Yii::$app->request->post('id_city_departure'), ['id' => 'id_city_arrival', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-6">
                     <div class="row">
                        <div class="col-3">
                           <p class="text-left">Вес, т</p>
                        </div>
                        <div class="col-4">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'weight_from', Yii::$app->request->post('weight_from'), ['id' => 'weight_from', 'class' => 'form-control', 'placeholder' => 'От', 'aria-label' => 'from']) ?>
                           </div>
                        </div>
                        —
                        <div class="col-4">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'weight_to', Yii::$app->request->post('weight_to'), ['id' => 'weight_to', 'class' => 'form-control', 'placeholder' => 'До', 'aria-label' => 'to']) ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="row">
                        <div class="col-3">
                           <p class="text-left">Объем, м3</p>
                        </div>
                        <div class="col-4">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'volume_from', Yii::$app->request->post('volume_from'), ['id' => 'volume_from', 'class' => 'form-control', 'placeholder' => 'От', 'aria-label' => 'from']) ?>
                           </div>
                        </div>
                        —
                        <div class="col-4">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'volume_to', Yii::$app->request->post('volume_to'), ['id' => 'volume_to', 'class' => 'form-control', 'placeholder' => 'До', 'aria-label' => 'to']) ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-6">
                     <div class="row">
                        <div class="col-4">
                           Дата погрузки
                        </div>
                        <div class="col-8">
                           <?php
                           echo DatePicker::widget([
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
                           ]);
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="row">
                        <div class="col-4">
                           Дата разгрузки
                        </div>
                        <div class="col-8">
                           <?php
                           echo DatePicker::widget([
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
                           ]);
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <hr>

         <div class="row">
            <div class="col-4 text-right">
               <?= Html::a('Расширенный поиск', ['load-information/search'], ['class' => 'btn btn-info', 'role' => 'button']) ?>
            </div>
            <div class="col-4 text-center">
               <?= Html::submitButton('Найти грузы', ['class' => 'btn btn-success', 'name' => 'cargo_search', 'id' => 'cargo_search']) ?>
            </div>
            <div class="col-4 text-left">
               <?= Html::resetButton('Очистить форму', ['class' => 'btn btn-outline-dark', 'name' => 'clear_form', 'id' => 'clear_form']) ?>
               <!-- <button type="button" id="clear_form" class="btn btn-outline-dark">Очистить форму</button> -->
            </div>
         </div>
         <?= Html::endForm() ?>

         <div class="row mt-2">
            <div class="col-12">
               <?= $result_cargo_search ?>
            </div>
         </div>

      </div>
   </div>
   <?php Pjax::end(); ?>
   <!-- /.row -->
   <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
      </li>
   </ul>
   <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">.1..</div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..2.</div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.3..</div>
   </div> -->
   <hr />

   <!-- Call to Action Section -->
   <div class="row mb-4">
      <div class="col-md-8">
         <p>Есть предложение? Напишите нам и мы ответим на все интересующие Вас вопросы.</p>
      </div>
      <div class="col-md-4">
         <a class="btn btn-outline-primary btn-block" href="/web/site/contact">Написать нам</a>
      </div>
   </div>

</div>
<!-- /.container -->

<?php
Yii::$app->view->registerJsFile('/web/js/select_city.js');
?>​