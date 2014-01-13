<?php 
require_once("../../paginator.class.php");

try{
 if (isset($_GET['id'])){
	$category_id = $_GET['id'];
     $sql = "SELECT * FROM phpro_tags tags
        INNER JOIN  phpro_tag_targets targets ON  tags.tag_id = targets.tag_id
        INNER JOIN sub_tags ON targets.sub_tag_id = sub_tags.sub_tag_id
        WHERE tags.tag_id='" . $category_id ."'
        GROUP BY sub_tags.sub_tag_name";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$tag_cloud ='<div class="tagsInCategory">';
	foreach($result as $subtag)
        {
            if  ($subtag['sub_tag_name']!=="unknown") // || ($subtag['sub_tag_name'] !=="random") )
            {
               $tag_cloud .= '<a class="tag_in_cloud" href="subTag.php?id='.  $subtag['sub_tag_name'] . '">'. $subtag['sub_tag_name'] . '</a>';
            }
        }
	$tag_cloud .= '</div>';
	echo "this is the category ID __.>".$category_id; ;
   $sql = "SELECT COUNT(*)
        FROM phpro_tags tags
        INNER JOIN phpro_tag_targets targets ON tags.tag_id=targets.tag_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id=types.tag_type_id
        INNER JOIN content c ON targets.tag_target_id = c.tag_target_id
        WHERE tags.tag_id=".$category_id;
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tag_pages = new Paginator;
    $tag_pages->items_total = $count[0]['COUNT(*)'];
    $tag_pages->mid_range = 9;
    $tag_pages->paginate();
    $sql = "SELECT *
        FROM phpro_tags tags
        INNER JOIN phpro_tag_targets targets ON tags.tag_id=targets.tag_id
        RIGHT JOIN sub_tags ON targets.sub_tag_id=sub_tags.sub_tag_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id=types.tag_type_id
        INNER JOIN content c ON targets.tag_target_id = c.tag_target_id
        WHERE tags.tag_id=".$category_id."
        ORDER BY update_time DESC
        $tag_pages->limit";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);


  }

}catch(Exception $e ){
echo "<h1>404 ... <br> back away , or the world could stop spinning </h1>";
print_r($e);
}
?>

<h2><?=$result[0]['tag_name'] ?></h2>

<?php echo $tag_cloud ?>
<div class="videos">

<ul>
<?php foreach($videos as $vid){ 
try{
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
}catch(Exception $e){

}
?> 
    <li class="item link">
    <div class="vidInfo">
      <div class="left">
      <span class="vidCategories">
                <?php
                foreach($tags as $tag){
                        echo '<a href="'.$tag.'">' .$tag. '</a>';
                }
                ?>
	</span>
        <a href="#" title="Play Video"> 
        <img src="<?=$vid['cover_img']?>" alt="img title">
        <i class="icon-play-circled"></i>
        <span class="playTime"><?= $vid['play_time'] ?></span>
        </a>
        <span class="vidSubtags"> 
                <?php
                foreach($sub_tags as $tag){
                        echo '<a href="'.$tag.'">' .$tag. '</a>';
                }
                ?>
        </span>
      </div>
      <div class="text">
       <a href="#"><h3><?=$vid['title']?></h3></a>
        <p>
	<?=$vid['description']?>
        </p>
        <span class="otherInfo">
          <a href="#">Documentary</a> From <a href="">Vice/Discovery</a> In 2012     
        </span>
        <div class="rating-widget"> 

          <span class="star_1 icon-star"></span>  
          <span class="star_2 icon-star"></span>  
          <span class="star_3 icon-star-half-alt"></span>  
          <span class="star_4 icon-star-empty"></span>  
          <span class="star_5 icon-star-empty"></span>  
          <span class="total_votes">  #</span>   
        </div>
      </div>
      <div class="bullshit-bar">
        <span class="percentage">60%</span> 
      </div>
   </li>

<?php 
}
?>
</ul>
<div id='paginator_btns'></div>;

</div>
