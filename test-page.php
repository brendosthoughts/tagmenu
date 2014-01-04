<!DOCTYPE html>

<html lang="en" class=" js csstransforms3d" style=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<link rel="shortcut icon" href="http://ec2-54-226-219-255.compute-1.amazonaws.com/tagging/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/demo.css">
		<link rel="stylesheet" type="text/css" href="css/icons.css">
		<link rel="stylesheet" type="text/css" href="css/component.css">
		<link rel="stylesheet" href="fonts/css/fontello.css">
	    <link rel="stylesheet" href="fonts/css/animation.css">
   		<link rel="stylesheet" type="text/css" href="css/search.css" />
		<script src="js/modernizr.custom.js"></script><style type="text/css"></style>
	</head>
	<body screen_capture_injected="true">
		<div class="container">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher" style="-webkit-transform: translate3d(0, 0, 0);">

				<!-- category-menu -->					
                                        <?php  include '../db.class.php';
                                                include 'display_tags.php';
                                                print_tag_nav();
                                          ?>
					
                                <!-- end of category-menu -->

				<!-- scroller -->
				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
							<div class="block block-60">
								<p><strong>Demo 3:</strong> Overlapping levels with back links</p>
								<p>This menu will open by pushing the website content to the right. It has multi-level functionality, allowing endless nesting of navigation elements.</p>
								<p>The next level can optionally overlap or cover the previous one.</p>
							</div>
							<div class="info">
								<p>If you enjoyed this you might also like:</p>
								<p><a href="http://goo.gl/JLJ4v5">Responsive Multi-Level Menu</a></p>
								<p><a href="http://goo.gl/qjbq9Y">Google Nexus Website Menu</a></p>
							</div>
							
<!-- 							<br>
							<br>
													<br>
							<br>						<br>
							<br>
							
							
							<div class="block block-60">
								<p><strong>Demo 3:</strong> Overlapping levels with back links</p>
								<p>This menu will open by pushing the website content to the right. It has multi-level functionality, allowing endless nesting of navigation elements.</p>
								<p>The next level can optionally overlap or cover the previous one.</p>
							</div>
							<div class="info">
								<p>If you enjoyed this you might also like:</p>
								<p><a href="http://goo.gl/JLJ4v5">Responsive Multi-Level Menu</a></p>
								<p><a href="http://goo.gl/qjbq9Y">Google Nexus Website Menu</a></p>
							</div>
							
							<br>
							<br>
													<br>
							<br>						<br>
							<br>
 -->
					</div><!-- /scroller-inner -->
					<!-- Top Navigation -->
					
				</div><!-- /scroller -->

			</div><!-- /pusher -->
			<header class="main-header">
				<div class="site-title">
					<h1>Mind-Knowledge.com</h1><span class="sub-header">Watch ... Think, Learn, Do!</span>
				</div>
				<nav id="main-site" >
					<ul>
						<li>
							<a href="#"><i class="icon-video"></i>Documentaries</a>
						</li>			
						<li class="main-dropdown" id="main-nav-talks">
							<a href="#"><i class="icon-comment"></i>Talks <i class="icon-angle-circled-down"> </i></a>
							<ul >
								<li>
									<a href="#"><i class="icon-ellipsis-vert"></i>All</a>
								</li>
								<li>
									<a href="#"><i class="icon-users"></i>Confrences</a>
								</li>
								<li>
									<a href="#"><i class="icon-chat"></i>Debates</a>
								</li>
								<li>
									<a href="#"><i class="icon-graduation-cap-1"></i>Lectures</a>
								</li>								
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-podcast"></i>Webcasts</a>
						</li>

						<li class="main-dropdown" id="main-nav-more">
							<a href="#"><i class="icon-plus"></i>More<i  class="icon-angle-circled-down"></i></a>
							<ul>
								<li>
									<a href="#"><i class="icon-videocam"></i>Producers</a>
								</li>
								<li>
									<a href="#"><i class="icon-heart"></i>Social Good</a>
								</li>
							</ul>
						</li>						
					</ul>

				</nav>
				<div class="users">
					<a href="#" id="sign-in"><span class="icon-user">Sign In</span></a>
					<a href="#" id="sign-up"><span class="icon-user-add">Sign Up</span></a>
				</div>
			
				<div class="share-search-wrapper">		
					<div class="social-share">
						<a href="#" class="icon-facebook"></a>					
						<a href="#" class="icon-twitter"></a>
						<a href="#" class="icon-gplus"></a>
						<a href="#" class="icon-tumblr"></a>
						<a href="#" class="icon-reddit"></a>
						<a href="#" class="icon-stumbleupon"></a>
						<a href="#" class="icon-email"></a>
						<a href="#" class="icon-rss"></a>
					</div>			
					<div id="sb-search" class="sb-search">		
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search icon-search"></span>
						</form>	
					</div>
				</div>
				<div class="category">
						<a href="#" id="trigger" class="menu-trigger">
							<div class="menu-wrapper">
								<div id="menu-icon" >
									<div class="menu-bar">
										<span class="bar-left "></span>
										<span class="bar-right "></span>
									</div>
									<div class="menu-bar">
										<span class="bar-left "></span>
										<span class="bar-right "></span>
									</div>
									<div class="menu-bar">
										<span class="bar-left "></span>
										<span class="bar-right "></span>
									</div>
								</div>
							</div>
							<span class="category-text">Categories </span></a>				 	
				</div>

			</header>
		</div><!-- /container -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/mlpushmenu.js"></script>
		<script src="js/uisearch.js"></script>
		<script src="js/nav-dropdown.js"></script>
		<script src="js/jquery.simplemodal.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
			new mlPushMenu( document.getElementById( 'category-menu' ), document.getElementById( 'trigger' ), document.getElementById('menu-icon') );
		</script>
		<script>
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
			var more = document.getElementById("main-nav-more");
			more.addEventListener("click", handleDropDown, false);
			var talks = document.getElementById("main-nav-talks");
			talks.addEventListener("click", handleDropDown, false);

		</script>
	

</body></html>
