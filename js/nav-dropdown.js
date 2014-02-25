
$(document).ready(function(){
  /// in maintemplate.css this is where #main-site menu becomes just a hamburger menu
	$('.main-dropdown').click(function(){
		$('.main-navigation').slideToggle( "slow" );
	});

	oldSize=$(window).width();
	if(oldSize < 850){
		large2mediumScreen();
	}
	if(oldSize < 512){
		change2smallScreen();
	}

	$(window).resize(function(){
		windowSize= $(window).width();
		if( ( windowSize< 850)&&(oldSize < 512) ){
			small2mediumScreen();
			oldSize=750; // set to a random window size inbetween 800 and 512 exact number is not necesary
		}else if( (windowSize > 850 )&&(oldSize < 850) ){
			medium2largeScreen();
			oldSize=900;
		}else if ( (windowSize < 850 )&&(oldSize > 850) ){
			large2mediumScreen();
			oldSize=750;
		}else if( (windowSize < 512)&&(oldSize>512) ){
			change2smallScreen();
			oldSize=500;
		}
	});
	var previousTarget=null;
	$('.vidInfo').click(function(){
		if($(window).width() < 512){	    
			$(this).find('.vidCategories').fadeToggle('slow');
			$(this).find('.vidSubtags').fadeToggle('slow');
			$(this).find('.vidDescription').slideToggle('slow');
			$(this).find('.vidPlay').slideToggle('slow');	
		}
	});
});

/*for screens smaller then 512px wide*/
function change2smallScreen(){
	$('.main-navigation').css('display','none');
	$('.category').appendTo('.main-navigation').css('display','block');
	$('.category').wrap('<li class="addedCategory"></li>');
}
/*for screens less then 800px wide*/
function large2mediumScreen(){
		$('.scroller-inner').prepend($('.paid')).css( 'display', 'block');
}
/*for screens 800px wide or less*/
function medium2largeScreen(){
	$('#left-paid-1').insertBefore($('#charity-1'));
	$('#left-paid-2').insertBefore($('#charity-2'));
}

function small2mediumScreen(){
	$('#main-site').css('display','block');
	$('.main-navigation').css('display','block');
//	$('.category').unwrap();	
	$('.category').appendTo('.main-header');
	$('.addedCategory').remove();

}