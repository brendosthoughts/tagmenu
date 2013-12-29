<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Multi-Level Push Menu - Demo 3</title>
		<meta name="description" content="Multi-Level Push Menu: Off-screen navigation with multiple levels" />
		<meta name="keywords" content="multi-level, menu, navigation, off-canvas, off-screen, mobile, levels, nested, transform" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- category-menu -->

					<?php  include '../db.class.php'; 
						include 'display_tags.php';
						print_tag_nav();
					  ?>
				<!-- /category-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<header class="codrops-header">
							<h1>Multi-Level Push Menu <span>Off-screen navigation with multiple levels</span></h1>
						</header>
						<div class="category">
							<div class="block block-40 clearfix">
								<p><a href="#" id="trigger" class="menu-trigger" >Categories <br></a></p>
							</div>
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
						</div>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'category-menu' ), document.getElementById( 'trigger' ) );
		</script>
	</body>
</html>
