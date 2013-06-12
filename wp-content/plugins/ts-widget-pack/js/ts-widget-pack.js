jQuery(document).ready(function($) {

	// Hide latest posts
	$('.ts-widgets-list-authors-text ul').hide();
	
	// Toggle latest posts on author name click
	$('.ts-widgets-list-authors-name').click(function(){
		$(this).parent().find('ul').slideToggle(150);
		
		return false;
	});

});