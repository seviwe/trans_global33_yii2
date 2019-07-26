<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = 'Создать населённый пункт';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <br>

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'regions' => $regions,
    ]) ?>

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