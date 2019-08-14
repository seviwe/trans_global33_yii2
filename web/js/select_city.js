var kladr_city = "";

var initb = function () {
   //город отправки
   $('#name_city_departure').suggestions({
      token: '70d1e189675ccb53b5e90e229faa665215bf265f',
      type: 'ADDRESS',
      hint: false,
      bounds: "city",
      onSelect: function (suggestion) {
         city_departure = suggestion.data.city_kladr_id; //город id 
      }
   });

   //город прибытия
   $('#name_city_arrival').suggestions({
      token: '70d1e189675ccb53b5e90e229faa665215bf265f',
      type: 'ADDRESS',
      hint: false,
      bounds: "city",
      onSelect: function (suggestion) {
         city_arrival = suggestion.data.city_kladr_id; //город id 
      }
   });

   $('#name_city_arrival').change(function () {
      $('#id_city_arrival').val(city_arrival);
   });

   $('#name_city_departure').change(function () {
      $('#id_city_departure').val(city_departure);
   });

};

initb();
$(document).on("pjax:end", initb);