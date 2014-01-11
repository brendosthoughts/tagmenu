<?php
include '../db.class.php';
$subTemplate="home.php";
include 'header.php';
include 'main-template.php';
print_header($subTemplate);

print_main_template($subTemplate);
include 'tail.php';

?>
