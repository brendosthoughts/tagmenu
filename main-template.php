<?php
require_once 'display_components.php';

 function print_main_template($subTemplate, $toRoot){ ob_start(); ?>
<body >
		<div class="container">
				<!-- Top Navigation -->
			<header class="main-header">
				<div class="site-title">
				<a href="#">
				<?php	include 'logo/logo.php'; ?>
					<h1>Mind-Knowledge.com</h1><span class="sub-header">Watch ... Think, Learn, Do!</span>

				</a>
				</div>
				<nav id="main-site" >
					<ul>
						<li>
							<a href="<?=$toRoot?>Documentaries/"><i class="icon-video"></i>Documentaries</a>
						</li>			
						<li class="main-dropdown" id="main-nav-talks">
							<a href="#"><i class="icon-comment"></i>Talks <i class="icon-angle-circled-down"> </i></a>
							<ul >
								<li>
									<a href="<?=$toRoot?>Talks/"><i class="icon-ellipsis-vert"></i>All</a>
								</li>
								<li>
									<a href="<?=$toRoot?>Confrences"><i class="icon-users"></i>Confrences</a>
								</li>
								<li>
									<a href="<?=$toRoot?>Debates"><i class="icon-chat"></i>Debates</a>
								</li>
								<li>
									<a href="<?=$toRoot?>Lectures"><i class="icon-graduation-cap-1"></i>Lectures</a>
								</li>								
							</ul>
						</li>
						<li>
							<a href="<?=$toRoot?>Webcasts"><i class="icon-podcast"></i>Webcasts</a>
						</li>

						<li class="main-dropdown" id="main-nav-more">
							<a href="#"><i class="icon-plus"></i>More<i  class="icon-angle-circled-down"></i></a>
							<ul>
								<li>
									<a href="<?=$toRoot?>Producers"><i class="icon-videocam"></i>Producers</a>
								</li>
								<li>
									<a href="<?=$toRoot?>SocialGood"><i class="icon-heart"></i>Social Good</a>
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
			<div class="add-left">
				

			</div>
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher" style="-webkit-transform: translate3d(0, 0, 0);">
				<!-- scroller -->
				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<?php include $subTemplate; ?>
							
						<footer class="main-footer"> 
							<ul class="about"><a href="#"> About </a>
							  <li> <a href="#"> </a></li>
							</ul>
						<footer>

					</div><!-- /scroller-inner -->
					
				</div><!-- /scroller -->
				<!-- category-menu -->					
			        <?php  
						/*   THIS IS FOR LIVE SITE */
                        /*   	print_tag_nav($toRoot);*/
                        include "testing.php";
		                ?>
		                <!-- end of category-menu -->

			</div><!-- /pusher -->

		</div><!-- /container -->
<?php
    return ob_end_flush();
} ?>
