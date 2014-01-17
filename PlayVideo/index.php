<?php
include '../../db.class.php';
$subTemplate="playvideo.php";
$toRoot = "../";

include '../header.php';
include '../main-template.php';
include '../tail.php';

print_header($subTemplate, $toRoot);
print_main_template($subTemplate, $toRoot);
print_tail($subTemplate, $toRoot);
?>
