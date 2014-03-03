
$(document).ready(function(){
  /// in maintemplate.css this is where #main-site menu becomes just a hamburger menu
	$('.main-dropdown').click(function(){
		$('.main-navigation').slideToggle( "slow" );
	});

	initialSize=$(window).width();
	$(window).resize(function(){
		windowSize= $(window).width();
		if( ( windowSize > 800)&&(initialSize < 800) ){ /*smaller to bigger screen add left comes into size*/
			small2largeScreen();
			oldSize=750; 
		}else if( (windowSize < 800 )&&(initialSize > 800) ){/*bigger to smaller screen add left leaves the screen*/
			large2smallScreen();
			oldSize=900;
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