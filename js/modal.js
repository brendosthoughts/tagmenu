$(document).ready(function() {

	$('.category').click(function(){
		$("#category-menu").modal();
		$("#category-menu").css({'display' : 'block'});


	});
	$('.category-link').click(function(){
		$('.category-link').fadeOut('slow', 'linear', fadeInCategory( $(this) ) ); 
	});

	$('.mp-back').click(function(){
		$('.category-link').fadeIn('slow');
		var testing = $(this).closest('.mp-level');
		testing.css('display', 'none');
	});

});

function fadeInCategory(category){
	category=category.parent();
	category.find('.mp-level').fadeIn('slow');
	category.find('ul').fadeIn('slow');
}
function back2allCategories(){

	$('.category-link').css('display', 'block');

}
