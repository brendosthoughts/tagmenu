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
					<h1><span style="font-weight">Mind-Knowledge</h1><span class="sub-header">Watch ... Think ... Do!</span>

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
									<a href="<?=$toRoot?>About"><i class="icon-info-circled"></i>About</a>
								</li>
								<li>
									<a href="<?=$toRoot?>Add-Video"><i class="icon-link"></i>Add Video's</a>
								</li>
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
				<span class="charity" id="charity-1">
				<?=$adds[mt_rand(0,6)]?>
				</span>
            	<span class="paid" id="left-paid-1">
	            	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				 	
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-9470638740363065"
					     data-ad-slot="5153912635"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script> 
			<div class="background-paid">
			    <h6>Advertising seems to be blocked by your browser</h6>
			    <p>Realize that advertisemnet is the primary way this site pays for hosting and developemnt costs any profit made from the site goes directly to a charity like the one above!
			     If you would consider enabling adds to be displayed on this site it would be greatly appreciated.
			    </p>
			    <p>
			    Or Consider sending a small donation to keep the sight going. If not just enjoy the site and help spread the word about it!
				</p>

				  <a class="btc-link" href="bitcoin:14ud3wMyqB2BjBc5wpmMwpvVgBwTZWZtFF"> BTC: 14ud3wMyqB2BjBc5wpmMwpvVgBwTZWZtFF </a>
				
				<br>

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
					">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>



				</span>

				
				<span class="charity" id="charity-2">
				<?=$adds[mt_rand(0,6)]?>
				</span>
				<span class="paid" id="left-paid-2">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-9470638740363065"
					     data-ad-slot="5153912635"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>

			<div class="background-paid">
			    <h6>Advertising seems to be blocked by your browser</h6>
			    <p>Realize that advertisemnet is the primary way this site pays for hosting and developemnt costs any profit made from the site goes directly to a charity like the one above!
			     If you would consider enabling adds to be displayed on this site it would be greatly appreciated.
			    </p>
			    <p>
			    Or Consider sending a small donation to keep the sight going. If not just enjoy the site and help spread the word about it!
				</p>

				  <a class="btc-link" href="bitcoin:14ud3wMyqB2BjBc5wpmMwpvVgBwTZWZtFF"> BTC: 14ud3wMyqB2BjBc5wpmMwpvVgBwTZWZtFF </a>
				
				<br>

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
					">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>


				</span>
			</div>

			<!-- main-content-->
			<div class="main-wrapper">
				<?php include $subTemplate; ?>
				<!-- category-menu -->					
		        <?php  
					/*   THIS IS FOR LIVE SITE */
                      	print_tag_nav($toRoot);
	                ?>
		    </div>
		                <!-- end of category-menu -->
		</div><!-- /container -->
<?php
    return ob_end_flush();
} ?>
