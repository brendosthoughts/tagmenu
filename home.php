<h2> Most Recent </h2>
<div id="recentMain" class="owl-carousel main">
<?php
try
{
    $sql = "SELECT *
        FROM content c
        INNER JOIN publisher p ON c.pub_id = p.pub_id
	ORDER BY update_time DESC LIMIT 15";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $vid){

/*
        INNER JOIN phpro_tag_targets targets ON targets.tag_target_id=c.tag_target_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id = types.tag_type_id
*/
$sql = "SELECT `tag_name`,`sub_tag_name`,`tag_type_name` FROM phpro_tag_targets targets
        INNER JOIN  sub_tags ON targets.sub_tag_id=sub_tags.sub_tag_id
        INNER JOIN phpro_tags tags ON targets.tag_id=tags.tag_id
	INNER JOIN phpro_tag_types types ON targets.tag_type_id = types.tag_type_id
        WHERE tag_target_id='{$vid['tag_target_id']}'";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $tagging_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
$tags= array();
$sub_tags=array();
foreach ( $tagging_info as $value )
{
    $tags[] = $value['tag_name'];
    $sub_tags[] = $value['sub_tag_name'];
    $tags = array_unique( $tags );
    $sub_tags = array_unique( $sub_tags );
}
  

  display_video($vid, $toRoot); 

 
}//end of foreach loop 
?>
</div>
<div id="recentSub" class="owl-carousel sub">
<?php    foreach($result as $vid){
?>
  <div class="item"><h3><?=$vid['title']?></h3> <div class="sub_img_wrapper"><img src="<?=$vid['cover_img']?>" alt="<?=$vid['title']?>"> </div>
	<?php
	 if($vid['tag_type_name']=="Documentary"){
		echo '<i class="icon-video"></i>';
	}else if($vid['tag_type_name']=="Talk"){
		echo '<i class="icon-comment"></i>';
	}else{
		echo '<i class="icon-chat"></i>';
	}

	?>
   </div>

<?php 
}
?>
</div>


<div class="centerhorizontaladd">
  <span> far left </span>
  <span> middle left</span>
  <span> middle right</span>
  <span> far left</span>
</div>

<?php 
  }catch(exception $e){
        echo "hmm something seems to have gone wrong try navigating elsewhere in the site";
  }
?>


