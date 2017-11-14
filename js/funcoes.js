 $(document).ready(function(){
 	$('.parallax').parallax();
 	$('select').material_select();
 	$('checkbox').material_checkbox();
 });

 $(function () {
 	var austDay = new Date();

 	austDay = new Date(austDay.getFullYear(), 12 - 1, 01);
 	$('#defaultCountdown').countdown({until: austDay});
 	$('#year').text(austDay.getFullYear());
 });