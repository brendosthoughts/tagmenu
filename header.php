<?php 
function print_header($subTemplate, $toRoot, $meta){ ob_start(); ?>

<html lang="en" class=" js csstransforms3d" style="">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<link rel="shortcut icon" href="http://ec2-54-226-219-255.compute-1.amazonaws.com/tagging/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?= $toRoot ?>css/mainTemplate.css">
		<link rel="stylesheet" href="<?= $toRoot ?>fonts/css/fontello.css">
		<link rel="stylesheet" href="<?= $toRoot ?>fonts/css/animation.css">
        <script src="<?= $toRoot ?>js/jquery-1.10.2.min.js"></script>
	<?php if ($subTemplate == "home.php"){ ?>
		<title>Documentaries, Talks & Debates to help expand your mind and perspective of the world</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="<?= $toRoot ?> css/home.css">
		<script src="<?= $toRoot ?>js/owl.carousel.min.js"></script>
	<?php }else if($subTemplate =="playvideo.php"){ ?>
	<title><?= $meta['tag_type_name'] . ' | ' . $meta['title'] ?> </title>
	<meta name="description" content="<?=substr($meta['description'], 0, 145) . '...' ?>">
	<link rel="stylesheet" href="<?= $toRoot ?>css/playvideo.css">
<link href='<?=$toRoot ?>js/videojs-youtube-master/lib/video-js.css' rel='stylesheet'>
<script src='<?=$toRoot ?>js/videojs-youtube-master/lib/video.js'></script>
<script src='<?=$toRoot ?>js/videojs-youtube-master/vjs.youtube.js'></script>
		
	<?php
	}else if($subTemplate == "producers.php"){
	?>
		<link rel="stylesheet" href="<?= $toRoot ?>css/producers.css">
	<?php	
	}else{ ?>
  		<link rel="stylesheet" href="<?=$toRoot?>css/vidList.css"> 
  	<?php }	?>

		<script src="<?= $toRoot ?>js/modernizr.custom.js"></script><style type="text/css"></style>
<?php
    return ob_end_flush();
} ?>
