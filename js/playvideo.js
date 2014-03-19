 // credit to Dave Rupbert for videojs resizing
 // he kick's ass at life and everything to do with web development!
 // Once the video is ready
videojs("feature_video").ready(function(){

    var myPlayer = this;    // Store the video object
    var aspectRatio = 9/16; // Make up an aspect ratio
    function resizeVideoJS(){
      // Get the parent element's actual width
      var width = document.getElementById("video_wrapper").offsetWidth;

      // Set width to fill parent element, Set height
      myPlayer.width(width).height( width * aspectRatio );
      //make the description same height as the video

    }

    resizeVideoJS(); // Initialize the function
    window.onresize = resizeVideoJS; // Call the function on resize
  });

//credit below function to Tony Mancini of stack overflow with originial credit to 
// http://www.xtf.dk/2011/08/center-new-popup-window-even-on.html
function openWin(url, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, "_blank", 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}



$(".share_link").click(function() {
  var shareType= this;
  var sharePage = encodeURIComponent(window.location);
  var shareTitle= encodeURIComponent($(".vid_title").text());
  var vidDescription = $(".vid_description").text();
  
    if(shareType.id =="twitter"){
     openWin("http://twitter.com/intent/tweet?text="+ shareTitle+"&url="+ sharePage +"&via=TWITTER-HANDLE" , 700, 500);
    }else if(this.id =="facebook"){
     openWin("https://www.facebook.com/sharer/sharer.php?u=" + sharePage, 700, 500);
    }else if(this.id =="gplus"){
     openWin("https://plus.google.com/share?url="+sharePage, 700, 500);
    }else if(this.id =="linkedin"){
     openWin("https://www.linkedin.com/shareArticle?mini=true&url="+ sharePage+"L&title="+shareTitle +"&summary=YOUR-SUMMARY&source=YOUR-URL", 800, 500);
    }else if(this.id =="stumbleupon"){
     openWin("http://www.stumbleupon.com/submit?url=" + sharePage, 850, 550);
    }else if(this.id =="reddit"){
     openWin("http://www.reddit.com/submit?url=" + sharePage, 850, 500);
    }

});

$(document).ready(function() {
  $('.vjs-poster').append( $('.vid_overlay') );

  $('.vid_overlay').css('display', 'block');
	
//set up nav  menus
    function hasClass(element, cls) {
      return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
    }
    function handleDropDown() {
      if (hasClass(this, 'open')){
              classie.remove(this, 'open');
      }else{
              classie.add(this, 'open');
      }

    }
    new UISearch( document.getElementById( 'sb-search' ) );
    var more = document.getElementById("main-nav-more");
    more.addEventListener("click", handleDropDown, false);

		
    //rating widget 
/*    $('.ratingStars').jRating({
      length:5,
      decimalLength:1,
      rateMax:10,
      bigStarsPath:'../js/icons/stars.png',
      rateInfosX:10,
      rateInfoY:0,	
      phpPath:'jRating.php',
      onSuccess : function(){
	jSuccess('Success : your rate has been saved :)',{
		  HorizontalPosition:'center',
		  VerticalPosition:'top'
		});
      },
      onError : function(){
	jError('Error : please retry');
      }
    });
*/


});
		


    
    
