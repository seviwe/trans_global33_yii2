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
   <div class="card mb-3">
      <div class="card-body">
         <h2 class="card-title text-center mb-1"><i class="fas fa-box-open mr-2"></i>Поиск грузов</h2>
         <hr>
         <?= Html::beginForm(['site/cargo-search'], 'post', ['data-pjax' => ''/*, 'class' => 'form-inline'*/]); ?>
         <div class="row">
            <div class="col-12">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'name_city_departure', Yii::$app->request->post('name_city_departure'), ['class' => 'form-control', 'id' => 'name_city_departure', 'placeholder' => 'Откуда']) ?>
                        <?= Html::input('hidden', 'id_city_departure', Yii::$app->request->post('id_city_departure'), ['id' => 'id_city_departure', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'name_city_arrival', Yii::$app->request->post('name_city_arrival'), ['class' => 'form-control', 'id' => 'name_city_arrival', 'placeholder' => 'Куда']) ?>
                        <?= Html::input('hidden', 'id_city_arrival', Yii::$app->request->post('id_city_departure'), ['id' => 'id_city_arrival', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
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
                  <div class="col-lg-6 col-md-6 col-sm-12">
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
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                           Дата погрузки
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
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
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                           Дата разгрузки
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
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
            <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
               <?= Html::a('Расширенный поиск грузов', ['load-information/search'], ['class' => 'btn btn-info btn-block', 'role' => 'button']) ?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
               <?= Html::submitButton('Найти грузы', ['class' => 'btn btn-success btn-block', 'name' => 'cargo_search', 'id' => 'cargo_search']) ?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
               <?= Html::resetButton('Очистить форму', ['class' => 'btn btn-outline-dark btn-block', 'name' => 'clear_form', 'id' => 'clear_form']) ?>
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

   <!--Section Search Transports-->
   <?php Pjax::begin(['enablePushState' => false]) ?>
   <div class="card mb-3">
      <div class="card-body">
         <h2 class="card-title text-center mb-1"><i class="fas fa-truck mr-2"></i>Поиск транспорта</h2>
         <hr>
         <?= Html::beginForm(['site/transport-search'], 'post', ['data-pjax' => ''/*, 'class' => 'form-inline'*/]); ?>
         <div class="row">
            <div class="col-12">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'name_city_departure_t', Yii::$app->request->post('name_city_departure_t'), ['class' => 'form-control', 'id' => 'name_city_departure_t', 'placeholder' => 'Откуда']) ?>
                        <?= Html::input('hidden', 'id_city_departure_t', Yii::$app->request->post('id_city_departure_t'), ['id' => 'id_city_departure_t', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'name_city_arrival_t', Yii::$app->request->post('name_city_arrival_t'), ['class' => 'form-control', 'id' => 'name_city_arrival_t', 'placeholder' => 'Куда']) ?>
                        <?= Html::input('hidden', 'id_city_arrival_t', Yii::$app->request->post('id_city_departure_t'), ['id' => 'id_city_arrival_t', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-4">
                           <p class="text-left">Грузоподъем., т</p>
                        </div>
                        <div class="col-3">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'capacity_from', Yii::$app->request->post('capacity_from'), ['id' => 'capacity_from', 'class' => 'form-control', 'placeholder' => 'От', 'aria-label' => 'from']) ?>
                           </div>
                        </div>
                        —
                        <div class="col-3">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'capacity_to', Yii::$app->request->post('capacity_to'), ['id' => 'capacity_to', 'class' => 'form-control', 'placeholder' => 'До', 'aria-label' => 'to']) ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
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
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                           Дата погрузки
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
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
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                           Дата разгрузки
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
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
            <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
               <?= Html::a('Расширенный поиск транспорта', ['transport/search'], ['class' => 'btn btn-info btn-block', 'role' => 'button']) ?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
               <?= Html::submitButton('Найти транспорт', ['class' => 'btn btn-success btn-block', 'name' => 'cargo_search', 'id' => 'cargo_search']) ?>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
               <?= Html::resetButton('Очистить форму', ['class' => 'btn btn-outline-dark btn-block', 'name' => 'clear_form', 'id' => 'clear_form']) ?>
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

$js = <<<JS

	var kladr_city = "";

    var initb = function() {
         //город отправки
         $('#name_city_departure_t').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            onSelect: function(suggestion) {
               city_departure = suggestion.data.city_kladr_id; //город id 
            }
         });

        //город прибытия
        $('#name_city_arrival_t').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            onSelect: function(suggestion) {
               city_arrival = suggestion.data.city_kladr_id; //город id 
            }
         });

         $('#name_city_arrival_t').change(function() {
            $('#id_city_arrival_t').val(city_arrival);
         });
         
         $('#name_city_departure_t').change(function() {
            $('#id_city_departure_t').val(city_departure);
         });

      };

   initb();
   $(document).on("pjax:end", initb);

JS;

$this->registerJs($js);

Yii::$app->view->registerJsFile('/web/js/select_city.js');
?>​