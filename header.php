<?php 
function print_header($subTemplate, $toRoot){ ob_start(); ?>

<html lang="en" class=" js csstransforms3d" style="">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<link rel="shortcut icon" href="http://ec2-54-226-219-255.compute-1.amazonaws.com/tagging/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?= $toRoot ?>css/mainTemplate.css">
		<link rel="stylesheet" href="<?= $toRoot ?>fonts/css/fontello.css">
		<link rel="stylesheet" href="<?= $toRoot ?>fonts/css/animation.css">
               <script src="<?= $toRoot ?>js/jquery-1.10.2.min.js"></script>
	<?php if ($subTemplate == "home.php"){ ?>
		<link rel="stylesheet" href="<?= $toRoot ?> css/home.css">
		<script src="<?= $toRoot ?>js/owl.carousel.min.js"></script>
	<?php }else if($subTemplate =="playvideo.php"){ ?>
<link href='<?=$toRoot ?>js/videojs-youtube-master/lib/video-js.css' rel='stylesheet'>
<script src='<?=$toRoot ?>js/videojs-youtube-master/lib/video.js'></script>
<script src='<?=$toRoot ?>js/videojs-youtube-master/vjs.youtube.js'></script>
		
	<?php
	}else{ ?>
  		<link rel="stylesheet" href="<?=$toRoot?>css/vidList.css"> 
  	<?php }	?>

		<script src="<?= $toRoot ?>js/modernizr.custom.js"></script><style type="text/css"></style>
<?php
    return ob_end_flush();
} ?>
