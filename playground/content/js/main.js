$(document).ready(function($) {
	// Highlight the top nav as scrolling occurs
	$('body').scrollspy({
		target : '.navbar-fixed-top'
	});

	// Closes the Responsive Menu on Menu Item Click
	$('.navbar-collapse ul li a').click(function() {
		$('.navbar-toggle').hide();
	});
	
	$('#foodModal').on('hidden.bs.modal');
	$('#exerciseModal').on('hidden.bs.modal');
	$('#goalModal').on('hidden.bs.modal');
}); 