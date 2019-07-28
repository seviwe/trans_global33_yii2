<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = 'Обновить н/п: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
$this->params['breadcrumbs'][] = ['label' => 'Населённые пункты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить н/п';
?>
<div class="container">
   <h1 class="text-center"> <?= Html::encode($this->title) ?> </h1>

   <!-- <div class="row">
      <div class="col-2">
      </div>

      <div class="col-8"> -->
         <?php
         echo $this->render('_form', ['model' => $model, 'regions' => $regions,])
         ?>
      <!-- </div> -->

      <!-- <div class="col-2">
      </div>
   </div> -->
</div>

<?php
$js = <<<JS

	//var region = "";
	var kladr_city = "";

    var initb = function() {
         //город отправки
         $('#name_city').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            onSelect: function(suggestion) {
               //console.log(suggestion.data);
               kladr_city = suggestion.data.city_kladr_id; //город id 

               //$('#region').attr('data-kladr-id', suggestion.data.region_kladr_id.charAt(0) == 0 ? suggestion.data.region_kladr_id.substring(1) /*+ '000000000000'*/ : suggestion.data.region_kladr_id /*+ '000000000000'*/);
            }
         });

         $('#name_city').change(function() {
            $('#kladr_city').val(kladr_city);
         });

      };

   initb();
   $(document).on("pjax:end", initb);

JS;

$this->registerJs($js);
?>