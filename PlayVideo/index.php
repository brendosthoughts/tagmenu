<?php
if($_GET['videoID']=="documentaries"){
include '/var/www/tagmenu/Documentaries/index.php';
}else if($_GET['videoID']=="talks"){
include '/var/www/tagmenu/Talks/index.php';
}else if($_GET['videoID']=="debates"){
include '/var/www/tagmenu/Debates/index.php';
}else{
include '../../db.class.php';
$subTemplate="playvideo.php";
$toRoot = "../";


include '../header.php';
include '../main-template.php';
include '../tail.php';

print_header($subTemplate, $toRoot);
print_main_template($subTemplate, $toRoot);
print_tail($subTemplate, $toRoot);
}
?>
