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
		var more = document.getElementById("main-nav-more");
		more.addEventListener("click", handleDropDown, false);
 
});
