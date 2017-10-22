(function(){
	'use strict';

	$( document ).ready( function(){
		var today = new Date();
		function convertDate(date) {
			var yyyy = date.getFullYear().toString();
			var mm = (date.getMonth()+1).toString();
			var dd = date.getDate().toString();
			var mmChars = mm.split('');
			var ddChars = dd.split('');

			return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
		}
		$.get( "utilities/day.php", { date: convertDate(today) }, function(result){
			$('#jobs').append(result);
		});
	});

	$('.dates li').on('click', function(){
		$('.dates').find('.activeDay').removeClass('activeDay');
		$(this).addClass('activeDay');
		$.get( "utilities/day.php", { date: $(this).attr('data-day') }, function(result){
			$('#jobs').empty();
			$('#jobs').append(result);
		});
	});



}());