		$(document).ready(function() {

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
		new mlPushMenu( document.getElementById( 'category-menu' ), document.getElementById( 'trigger' ), document.getElementById('menu-icon') );
		var more = document.getElementById("main-nav-more");
		more.addEventListener("click", handleDropDown, false);
		var talks = document.getElementById("main-nav-talks");
		talks.addEventListener("click", handleDropDown, false);
 
});
