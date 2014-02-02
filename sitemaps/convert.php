<?php
$mysql_time="2014-01-25 08:03:17";


echo convert_to_w3c($mysql_time);

function convert_to_w3c($time){
	return str_replace(" ", "T", $time) . "-5:00";
}


?>
