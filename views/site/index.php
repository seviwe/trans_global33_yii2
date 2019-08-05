<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);

$this->title = 'Главная | Грузоперевозки по РФ';

?>

<!-- Page Content -->
<div class="container">

   <?php if (Yii::$app->session->hasFlash('success')) : ?>
      <br>
      <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?php echo Yii::$app->session->getFlash('success'); ?>
      </div>
   <?php endif; ?>

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
   <h2 class="my-2 text-center">Поиск грузов</h2>

   <?php Pjax::begin(['enablePushState' => false]) ?>
   <div class="card">
      <div class="card-body">
         <?= Html::beginForm(['site/cargo-search'], 'post', ['data-pjax' => ''/*, 'class' => 'form-inline'*/]); ?>
         <div class="row">
            <div class="col-12">
               <div class="row">
                  <div class="col-6">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'cityDerival', Yii::$app->request->post('cityDerival'), ['class' => 'form-control', 'id' => 'cityDerival', 'placeholder' => 'Откуда']) ?>
                        <?= Html::input('hidden', 'cityDerival_id', Yii::$app->request->post('cityDerival_id'), ['id' => 'cityDerival_id', 'placeholder' => 'Откуда']) ?>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group mb-3">
                        <?= Html::input('text', 'cityArrival', Yii::$app->request->post('cityArrival'), ['class' => 'form-control', 'id' => 'cityArrival', 'placeholder' => 'Куда']) ?>
                        <?= Html::input('hidden', 'cityArrival_id', Yii::$app->request->post('cityDerival_id'), ['id' => 'cityArrival_id', 'placeholder' => 'Откуда']) ?>
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
                              <?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control', 'name' => 'from', 'placeholder' => 'От', 'aria-label' => 'from']) ?>
                           </div>
                        </div>
                        —
                        <div class="col-4">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control', 'name' => 'from', 'placeholder' => 'До', 'aria-label' => 'from']) ?>
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
                              <?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control', 'name' => 'from', 'placeholder' => 'От', 'aria-label' => 'from']) ?>
                           </div>
                        </div>
                        —
                        <div class="col-4">
                           <div class="input-group input-group-sm mb-3">
                              <?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control', 'name' => 'from', 'placeholder' => 'До', 'aria-label' => 'from']) ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <br>

         <div class="row">
            <div class="col-6 text-right">
               <?= Html::submitButton('&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspНайти грузы&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp', ['class' => 'btn btn-success', 'name' => 'cargo_search', 'id' => 'cargo_search']) ?>
            </div>
            <div class="col-6 text-left">
               <button type="button" id="clear_form" class="btn btn-outline-dark">Очистить форму</button>
            </div>
         </div>
         <?= Html::endForm() ?>

         <div class="row mt-3">
            <div class="col-12">
               <?= $result_cargo_search ?>
            </div>
         </div>

      </div>
   </div>
   <?php Pjax::end(); ?>
   <!-- /.row -->

   <!-- <form action="" method="post">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-12">
                  <div class="row">
                     <div class="col-6">
                        <div class="input-group mb-3">
                           <input type="text" class="form-control" name="cityDerival" id="cityDerival" placeholder="Откуда" />
                           <input type="hidden" name="cityDerival_id" id="cityDerival_id" />
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="input-group mb-3">
                           <input type="text" class="form-control" name="cityArrival" id="cityArrival" placeholder="Куда" />
                           <input type="hidden" name="cityArrival_id" id="cityArrival_id" />
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
                                 <input type="text" aria-label="from" class="form-control" name="from" placeholder="От">
                              </div>
                           </div>
                           —
                           <div class="col-4">
                              <div class="input-group input-group-sm mb-3">
                                 <input type="text" aria-label="from" class="form-control" name="from" placeholder="До">
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
                                 <input type="text" aria-label="from" class="form-control" name="from" placeholder="От">
                              </div>
                           </div>
                           —
                           <div class="col-4">
                              <div class="input-group input-group-sm mb-3">
                                 <input type="text" aria-label="from" class="form-control" name="from" placeholder="До">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <br>

            <div class="row">
               <div class="col-6 text-right">
                  <input name="search_loads" id="search_loads" type="submit" class="btn btn-success" value="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspНайти грузы&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp">
               </div>
               <div class="col-6 text-left">
                  <button type="button" id="clear_form" class="btn btn-outline-dark">Очистить форму</button>
               </div>
            </div>

            <div class="row mt-3">
               <div class="col-12 set_loads">
               </div>
            </div>

         </div>
      </div>
   </form> -->

   <!-- Cooperation Section -->
   <!-- <div class="card my-4">
      <div class="card-body">
         <div class="row">
            <div class="col-lg-6">
               <h2>Приглашаем к сотрудничеству</h2>
               <p>Глобал Транс 33 приглашает к сотрудничеству:</p>
               <ul>
                  <li>Грузовладельцев.</li>
                  <li>Перевозчиков.</li>
               </ul>
               <p></p>
            </div>
            <div class="col-lg-6">
               <img class="img-fluid rounded" src="/web/img/slide-mini.jpg" alt="" />
            </div>
         </div>
      </div>
   </div> -->

   <hr />

   <!-- Call to Action Section -->
   <div class="row mb-4">
      <div class="col-md-8">
         <p>Есть предложение? Напишите нам и мы ответим на все интересующие Вас вопросы.</p>
      </div>
      <div class="col-md-4">
         <a class="btn btn-outline-primary btn-block" href="/site/contact">Написать нам</a>
      </div>
   </div>

</div>
<!-- /.container -->

<?php
$js = <<<JS

	var city_derival = "";
	var city_arrival = "";

   var initb = function() {
         //город отправки
         $('#cityDerival').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            constraints: {
               label: "",
               locations: {
                  city_type_full: "город"
               }
            },
            onSelect: function(suggestion) {
               console.log(suggestion.data);
               city_derival = suggestion.data.city; //город
               $('#cityDerival').attr('data-kladr-id', suggestion.data.city_kladr_id.charAt(0) == 0 ? suggestion.data.city_kladr_id.substring(1) /*+ '000000000000'*/ : suggestion.data.city_kladr_id /*+ '000000000000'*/);
            }
         });

         //город пребытия
         $('#cityArrival').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            constraints: {
               label: "",
               locations: {
                  city_type_full: "город"
               }
            },
            onSelect: function(suggestion) {
               city_arrival = suggestion.data.city; //город
               $('#cityArrival').attr('data-kladr-id', suggestion.data.city_kladr_id.charAt(0) == 0 ? suggestion.data.city_kladr_id.substring(1) /*+ '000000000000'*/ : suggestion.data.city_kladr_id /*+ '000000000000'*/);
            }
         });

         $('#cityDerival').change(function() {
            $('#cityDerival_id').val(($('#cityDerival').attr('data-kladr-id')));
         });

         $('#cityArrival').change(function() {
            $('#cityArrival_id').val(($('#cityArrival').attr('data-kladr-id')));
         });
      };

   initb();
   $(document).on("pjax:end", initb);


	 //поиск грузов
	// $('#search_loads').click(function() {
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "index.php?r=site/cargo-search",
	// 		data: {
	// 			city_derival: city_derival,
	// 			city_arrival: city_arrival,
	// 		},
	// 		dataType: "JSON",
	// 		success: function(data) {
	// 			// $(document).ready(function() {
	// 			// 	$('.set_loads').html(data.table);

	// 			// 	$('html,body').animate({
	// 			// 		scrollTop: $(".set_loads").offset().top
	// 			// 	}, 1000);
   //          // });
   //          alert("yes");
   //       },
   //       error: function(){
   //          alert("error");
   //       }         
	// 	});
	// });

	//очистка формы поиска
	$('#clear_form').click(function() {

	});
JS;

$this->registerJs($js);
?>