/*! jQuery Contact-Form Validation - v1.0.0 - 22/04/2013
* Author Meghan Nicholas
* Licence GPL2 */

jQuery(document).ready(function($) {
    
    $('#frmContact').submit(function() {
        return $('#frmContact').valid();
        //alert('here');
    });
    

	$('#frmContact').validate({ 
	
		errorElement: 'span',
		errorClass: 'help-inline',
		
		highlight: function(element) {
		$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
		element
		.closest('.control-group').removeClass('error').addClass('success');
		} 
	
	
	});
    
});
