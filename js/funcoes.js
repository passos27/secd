 $(document).ready(function(){
 	$('.parallax').parallax();
 });

 $(function () {
 	var austDay = new Date();

 	austDay = new Date(austDay.getFullYear(), 12 - 1, 01);
 	$('#defaultCountdown').countdown({until: austDay});
 	$('#year').text(austDay.getFullYear());
 });