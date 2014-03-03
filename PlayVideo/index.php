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

try{

        db::getInstance()->beginTransaction();
        $sql = "SELECT  c.title, c.description, types.tag_type_name
        FROM content c
        INNER JOIN phpro_tag_targets targets  ON c.tag_target_id = targets.tag_target_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id = types.tag_type_id
        WHERE content_id=:content_id";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->bindParam(':content_id', $_GET['videoID']);
        $stmt->execute();
        $vid = $stmt->fetch(PDO::FETCH_ASSOC);
	$meta_data=$vid;
}catch(Exception $e){
        echo "something terrible has happened ... sorry about this";
        exit();

}

include '../header.php';
include '../main-template.php';
include '../tail.php';
print_header($subTemplate, $toRoot, $meta_data);
print_main_template($subTemplate, $toRoot);
print_tail($subTemplate, $toRoot);
}
?>
