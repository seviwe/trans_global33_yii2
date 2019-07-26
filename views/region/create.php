<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = 'Создать область';
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <br>

    <h1 class="text-center">Создание области</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
$js = <<<JS

	var federal_district = "";
	var id_region = "";

    var initb = function() {
         //город отправки
         $('#region').suggestions({
            token: '70d1e189675ccb53b5e90e229faa665215bf265f',
            type: 'ADDRESS',
            hint: false,
            bounds: "region",
            onSelect: function(suggestion) {
               //console.log(suggestion.data);
               federal_district = suggestion.data.federal_district; //ФО
               id_region = suggestion.data.region_kladr_id; //ID region

               //$('#region').attr('data-kladr-id', suggestion.data.region_kladr_id.charAt(0) == 0 ? suggestion.data.region_kladr_id.substring(1) /*+ '000000000000'*/ : suggestion.data.region_kladr_id /*+ '000000000000'*/);
            }
         });

         $('#region').change(function() {
            //console.log(id_region);
            $('#federal_district').val(federal_district);
            $('#kladr_region').val(id_region);
         });

      };

   initb();
   $(document).on("pjax:end", initb);

JS;

$this->registerJs($js);
?>