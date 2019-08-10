<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadInformation */

$this->title = 'Добавление груза';

//для логиста отображаем навигацию по разделам
if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isLogist()) {
    $this->params['breadcrumbs'][] = ['label' => 'Панель логиста', 'url' => ['/site/logist']];
    $this->params['breadcrumbs'][] = ['label' => 'Информация о грузах', 'url' => ['index']];
}

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', ['model' => $model])
    ?>
</div>

<?php
$js = <<<JS

	//var region = "";
	var kladr_city = "";

    var initb = function() {
         //город отправки
         $('#name_city_departure').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            onSelect: function(suggestion) {
               //console.log(suggestion.data);
               city_departure = suggestion.data.city_kladr_id; //город id 

               //$('#region').attr('data-kladr-id', suggestion.data.region_kladr_id.charAt(0) == 0 ? suggestion.data.region_kladr_id.substring(1) /*+ '000000000000'*/ : suggestion.data.region_kladr_id /*+ '000000000000'*/);
            }
         });

        //город прибытия
        $('#name_city_arrival').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "city",
            onSelect: function(suggestion) {
               //console.log(suggestion.data);
               city_arrival = suggestion.data.city_kladr_id; //город id 

               //$('#region').attr('data-kladr-id', suggestion.data.region_kladr_id.charAt(0) == 0 ? suggestion.data.region_kladr_id.substring(1) /*+ '000000000000'*/ : suggestion.data.region_kladr_id /*+ '000000000000'*/);
            }
         });

         $('#name_city_arrival').change(function() {
            $('#id_city_arrival').val(city_arrival);
         });
         
         $('#name_city_departure').change(function() {
            $('#id_city_departure').val(city_departure);
         });

      };

   initb();
   $(document).on("pjax:end", initb);

JS;

$this->registerJs($js);
?>