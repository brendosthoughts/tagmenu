
$(document).ready(function(){
  /// in maintemplate.css this is where #main-site menu becomes just a hamburger menu
	$('.main-dropdown').click(function(){
		$('.main-navigation').slideToggle( "slow" );
	});
	$(window).resize(function(){
		if($(window).width() >512){
			$('.main-navigation').css('display','block');
		}else{
			$('.main-navigation').css('display','none');
		}
	});
	var previousTarget=null;
	$('.vidInfo').click(function(){
		if($(window).width() < 512){	    
			$(this).find('.vidCategories').fadeToggle('slow');
			$(this).find('.vidSubtags').fadeToggle('slow');
			$(this).find('.vidDescription').slideToggle('slow');
			$(this).find('.vidPlay').slideToggle('slow')		
		}
	});
});