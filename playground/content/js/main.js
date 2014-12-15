$(document).ready(function($) {
	// Closes the Responsive Menu on Menu Item Click
	$('.navbar-collapse ul li a').click(function() {
		$('.navbar-toggle').hide();
	});
	
	$('#foodModal').on('hidden.bs.modal');
	$('#exerciseModal').on('hidden.bs.modal');
	$('#goalModal').on('hidden.bs.modal');
}); 