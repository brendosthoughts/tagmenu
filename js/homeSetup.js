		$(document).ready(function() {

		var popularMain = $("#popularMain");
  		var popularSub = $("#popularSub");
		 
		  popularMain.owlCarousel({
                    navigationText: ["",""],
		    singleItem : true,
		    slideSpeed : 1000,
		    navigation: true,
		    pagination:false,
		    lazyEffect: false,
		    responsiveBaseWidth: "#recentMain",
		    afterAction : syncPosition,
		    responsiveRefreshRate : 200,
		  });
		 
		  popularSub.owlCarousel({
                    autoHeight : false,
                    items : 8,
		    navigationText: ["",""],
		    navigation: true,
                    itemsDesktop      : [1199,10],
                    itemsDesktopSmall     : [979,10],
                    itemsTablet       : [768,8],
                    itemsMobile       : [479,4],
                    pagination: true,
                    itemsCustom: [[0,0],[360,3],[480,4],[720,5],[840,5],[960,7],[1080,8],[1200,9],[1320, 10],[1440,11],[1560,12],[1680,13]],
                    responsiveRefreshRate : 100,
                    afterInit : function(el){
                      el.find(".owl-item").eq(0).addClass("synced");
                    }
		  });
		 
		  function popSyncPosition(el){
		    var current = this.currentItem;
		    $("#popularSub")
		      .find(".owl-item")
		      .removeClass("synced")
		      .eq(current)
		      .addClass("synced")
		    if($("#popularSub").data("owlCarousel") !== undefined){
		      center(current)
		    }
		  }
		 
		  $("#popularSub").on("click", ".owl-item", function(e){
		    e.preventDefault();
		    var number = $(this).data("owlItem");
		    popularMain.trigger("owl.goTo",number);
		  });
		 
		  function center(number){
		    var popularSubvisible = popularSub.data("owlCarousel").owl.visibleItems;
		    var num = number;
		    var found = false;
		    for(var i in popularSubvisible){
		      if(num === popularSubvisible[i]){
		        var found = true;
		      }
		    }
		 
		    if(found===false){
		      if(num>popularSubvisible[popularSubvisible.length-1]){
		        popularSub.trigger("owl.goTo", num - popularSubvisible.length+2)
		      }else{
		        if(num - 1 === -1){
		          num = 0;
		        }
		        popularSub.trigger("owl.goTo", num);
		      }
		    } else if(num === popularSubvisible[popularSubvisible.length-1]){
		      popularSub.trigger("owl.goTo", popularSubvisible[1])
		    } else if(num === popularSubvisible[0]){
		      popularSub.trigger("owl.goTo", num-1)
		    }
		    
		  }
		 
		 /* For the most recent  videos*/
		  var recentMain = $("#recentMain");
		  var recentSub = $("#recentSub");
		 
		  recentMain.owlCarousel({
                    navigationText: ["",""],
		    singleItem : true,
		    slideSpeed : 1000,
		    navigation: true,
		    pagination:false,
		    lazyEffect: false,
		    responsiveBaseWidth: "#recentMain",
		    afterAction : syncPosition,
		    responsiveRefreshRate : 200,
		  });
		 
		  recentSub.owlCarousel({
                    autoHeight : false,
                    items : 8,
		    navigationText: ["",""],
		    navigation: true,
                    itemsDesktop      : [1199,10],
                    itemsDesktopSmall     : [979,10],
                    itemsTablet       : [768,8],
                    itemsMobile       : [479,4],
                    pagination: true,
                    itemsCustom: [[0,0],[360,3],[480,4],[720,5],[840,5],[960,7],[1080,8],[1200,9],[1320, 10],[1440,11],[1560,12],[1680,13]],
                    responsiveRefreshRate : 100,
                    afterInit : function(el){
                      el.find(".owl-item").eq(0).addClass("synced");
                    }
		  });
                  
		  $('#recentMain').find('.owl-next').mouseover(function(){
		       recentMain.trigger('owl.next');
                       recentMain.trigger('owl.play', 12000);

                  }).mouseout(function(){
                       recentMain.trigger('owl.stop');

                  });

		  $('#recentSub').find('.owl-next').mouseover(function(){
			recentSub.trigger('owl.play', 1200);

		  }).mouseout(function(){
                       recentSub.trigger('owl.stop');

                  });


		  function syncPosition(el){
		    var current = this.currentItem;
		    $("#recentSub")
		      .find(".owl-item")
		      .removeClass("synced")
		      .eq(current)
		      .addClass("synced")
		    if($("#recentSub").data("owlCarousel") !== undefined){
		      center(current)
		    }
		  }
		 
		  $("#recentSub").on("click", ".owl-item", function(e){
		    e.preventDefault();
		    var number = $(this).data("owlItem");
		    recentMain.trigger("owl.goTo",number);
		  });
		 
		  function center(number){
		    var recentSubvisible = recentSub.data("owlCarousel").owl.visibleItems;
		    var num = number;
		    var found = false;
		    for(var i in recentSubvisible){
		      if(num === recentSubvisible[i]){
		        var found = true;
		      }
		    }
		 
		    if(found===false){
		      if(num>recentSubvisible[recentSubvisible.length-1]){
		        recentSub.trigger("owl.goTo", num - recentSubvisible.length+2)
		      }else{
		        if(num - 1 === -1){
		          num = 0;
		        }
		        recentSub.trigger("owl.goTo", num);
		      }
		    } else if(num === recentSubvisible[recentSubvisible.length-1]){
		      recentSub.trigger("owl.goTo", recentSubvisible[1])
		    } else if(num === recentSubvisible[0]){
		      recentSub.trigger("owl.goTo", num-1)
		    }
		    
		  }
  		$('.link').on('click', function(event){
		var $this = $(this);
		if($this.hasClass('clicked')){
		  $this.removeAttr('style').removeClass('clicked');
		} else{
		  $this.css('background','#7fc242').addClass('clicked');
		}
		});
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
 

});
