<?php
require_once 'display_components.php';

 function print_main_template($subTemplate, $toRoot){ ob_start(); ?>
<body >
		<div class="container">
				<!-- Top Navigation -->
			<header class="main-header">
				<div class="site-title">
				<a href="<?=$toRoot?>">
				<?php	include 'logo/logo.php'; ?>
					<h1>Mind-Knowledge.com</h1><span class="sub-header">Watch ... Think, Learn, Do!</span>

				</a>
				</div>
				<nav id="main-site" >
					<div class="main-dropdown"> </div>
					<ul class="main-navigation">
                                                <li>
                                                        <a href="<?=$toRoot?>Documentaries/"><i class="icon-video"></i>Documentaries</a>
                                                </li>
                                                <li>
                                                        <a href="<?=$toRoot?>Talks"><i class="icon-comment"></i>Talks</a>
                                                </li>
						<li>
							<a href="<?=$toRoot?>Debates"><i class="icon-chat"></i>Debates</a>
						</li>

						<li class="more-dropdown" id="main-nav-more">
							<a href="#"><i class="icon-plus"></i>More</i></a>
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
				<!-- <div class="users"><a href="#" id="sign-in"><span class="icon-user">Sign In</span></a> <a href="#" id="sign-up"><span class="icon-user-add">Sign Up</span></a></div> --!>
			
				<div class="share-search-wrapper">		
					<div class="social-share">
						<a href="https://www.facebook.com/pages/mind-knowledgecom/269878006504760" title="Follow us on Facebook" class="icon-facebook"></a>					
						<a href="https://twitter.com/mindknowledge" class="icon-twitter"></a>
						<a href="" class="icon-gplus"></a>
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
<?php 
	$adds = array(
	'<a href="https://www.eff.org/helpout" title="Support the EFF!"><img src="'.$toRoot.'images/eff.jpg" alt="support the eff"> <i class="icon-cc-nc"></i></a>', 
	'<a href="http://www.kiva.org/" title="loan some cash to thos he can use it"><img src="'. $toRoot.'images/kiva-logo.png" alt="Microloans to move people forward"><i class="icon-cc-nc"></i></a>',
	'<a href="http://www.givingwhatwecan.org/why-give/myths-about-aid" title="info how to donate to charity"><img src="'.$toRoot.'images/what-we-can.jpg" alt=""> <i class="icon-cc-nc"></i></a>',      
    '<a href="http://projecthealthychildren.org/" title="Project Healthy Children"><img src="'.$toRoot.'images/phc-logo.jpg" alt=""> <i class="icon-cc-nc"></i></a>',
    '<a href="http://www.againstmalaria.com/"><img src="'.$toRoot.'images/a-g-f-logo.jpg" alt="charity working to fight malaria globally"> <i class="icon-cc-nc"></i></a>',
    '<a href="http://www.givedirectly.org/"><img src="' .$toRoot .'images/givedirectly.jpg" alt="charity working with some of poorest poeple in the world"> <i class="icon-cc-nc"></i></a>',
    '<a href="https://www.khanacademy.org/about"><img src="'.$toRoot.'images/khan-academy.jpg" alt="Khan academy provdes free education to any one with the internet"> <i class="icon-cc-nc"></i></a>'

	 );
?>
				<span class="charity">
				<?=$adds[mt_rand(0,6)]?>
				</span>
            	<span class="paid">
	            	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- left-adds
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-9470638740363065"
					     data-ad-slot="5153912635"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>  --!>
					 <i class="icon-money"></i>
				</span>
				<span class="charity">
				<?=$adds[mt_rand(0,6)]?>
				</span>
				<span class="paid">
				<!-- left-adds
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-9470638740363065"
					     data-ad-slot="5153912635"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					--!>
					<i class="icon-money"></i>
				</span>
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
                          	print_tag_nav($toRoot);
		                ?>
		                <!-- end of category-menu -->

			</div><!-- /pusher -->

		</div><!-- /container -->
<?php
    return ob_end_flush();
} ?>
