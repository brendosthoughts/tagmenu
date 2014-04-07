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
        $sql = "SELECT  c.title, c.description, types.tag_type_name, c.tag_target_id
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

        if(isset($_GET['extra'])){
                        $tags = "SELECT *  FROM phpro_tag_targets targets
                INNER JOIN  sub_tags ON targets.sub_tag_id=sub_tags.sub_tag_id
                INNER JOIN phpro_tags tags ON targets.tag_id=tags.tag_id
                INNER JOIN phpro_tag_types types ON targets.tag_type_id = types.tag_type_id
                WHERE tag_target_id='{$vid['tag_target_id']}'";
            $stmt = db::getInstance()->prepare($tags);
            $stmt->execute();
            $tagging_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $tags=array();
                $sub_tags=array();
                $i=0;
                foreach ( $tagging_info as $value ){
                    $tags[$i]['tag_name'] = $value['tag_name'];
                    $tags[$i]['tag_id']=  $value['tag_id'];
                    $sub_tags[$i] = $value;
                    $i++;
                }

                //make each value unique as tags(categories) only need to display once not multiple times
                $temp_array = array();
                foreach ($tags as &$v) {
                    if (!isset($temp_array[$v['tag_id']]))
                        $temp_array[$v['tag_id']] =& $v;
                }
                $tags = array_values($temp_array);
                $temp_array = array();
                $i=0;
                foreach($sub_tags as $subtag){
                         $temp_array[$i]=$subtag['sub_tag_id'];
                         $i++;
                }
                $subtags=$temp_array;

                echo "<br>tags-> <br>";
                print_r($tags);
                echo '<br> subtags->';
                print_r($subtags);

                $searchstring="";
                foreach ($subtags as $word){
                    $searchstring = $searchstring . $word;
                }
                echo "this is the search string". $searchstring . "<br>";
                $sql = ("SELECT tag_target_id FROM phpro_tag_targets WHERE MATCH (sub_tag_id) AGAINST ('$searchstring' IN BOOLEAN MODE)");
                $stmt = db::getInstance()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo"this is similar content ids";
                print_r($result);
        }else{
        include '../header.php';
        include '../main-template.php';
        include '../tail.php';
        print_header($subTemplate, $toRoot, $meta_data);
        print_main_template($subTemplate, $toRoot);
        print_tail($subTemplate, $toRoot);
        }
}
      db::getInstance()->commit();
?>
