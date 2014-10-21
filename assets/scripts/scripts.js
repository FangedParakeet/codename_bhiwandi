$(document).ready(function(){
	$('#add_butt').click(function(){
		$('html, body').animate({
		        scrollTop: $("#add_activity").offset().top
		    }, 1000);
	});
});