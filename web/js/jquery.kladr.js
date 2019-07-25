$(function() {
	$('#cityDerival').suggestions({
		token: '70d1e189675ccb53b5e90e229faa665215bf265f',
		type: 'ADDRESS',
		hint: false,
		bounds: "city",
		constraints: {
			label: "",
			locations: { city_type_full: "город" }
		},
		onSelect: function(suggestion) {
			$('#cityDerival').attr('data-kladr-id', suggestion.data.city_kladr_id.charAt(0) == 0 ? suggestion.data.city_kladr_id.substring(1) + '000000000000' : suggestion.data.city_kladr_id + '000000000000');
		}
	});
	
	$('#cityArrival').suggestions({
		token: '70d1e189675ccb53b5e90e229faa665215bf265f',
		type: 'ADDRESS',
		hint: false,
		bounds: "city",
		constraints: {
			label: "",
			locations: { city_type_full: "город" }
		},
		onSelect: function(suggestion) {
			$('#cityArrival').attr('data-kladr-id', suggestion.data.city_kladr_id.charAt(0) == 0 ? suggestion.data.city_kladr_id.substring(1) + '000000000000' : suggestion.data.city_kladr_id + '000000000000');
		}
	});
	
	$('#cityDerival').change(function() {
		$('#cityDerival_id').val(($('#cityDerival').attr('data-kladr-id')));
	});
	
	$('#cityArrival').change(function() {
		$('#cityArrival_id').val(($('#cityArrival').attr('data-kladr-id')));
	});
});
