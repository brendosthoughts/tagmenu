<?php 
function display_video($vid){
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

<?php
}
function print_tag_nav($toRoot){
    try
    {

        $sql = "SELECT * FROM phpro_tags ORDER BY tag_name ASC";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        /*** loop over the array and create the listing ***/
  	$msg = '    <nav id="category-menu" class="category-menu">
                                        <div class="mp-level">
                                                <ul>
		';
        foreach($res as $val)
        {
	   if($val['tag_name']!=="unlisted"){
	         $msg .= '<li class="icon icon-arrow-left">
			    <a class="icon icon-display" href="#">' . $val['tag_name'] . '</a>
			    <div class="mp-level">
			        <a class="category-all" href="' . $toRoot . 'Categories/?id=' . $val['tag_id']  .  '"><h2 class="icon icon-display">' . $val['tag_name'] . '</h2></a>
			        <a class="mp-back" href="#">back</a>
				<ul>';
		 $sql = "SELECT * FROM phpro_tag_targets targets 
		 INNER JOIN sub_tags ON targets.sub_tag_id = sub_tags.sub_tag_id
		 WHERE tag_id=".$val['tag_id']. "
		 GROUP BY sub_tags.sub_tag_name"  ;
	         
		 $stmt = db::getInstance()->prepare($sql);
        	 $stmt->execute();
        	 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		 foreach($result as $subtag)
		 {
		    if  ($subtag['sub_tag_name']!=="unknown") // || ($subtag['sub_tag_name'] !=="random") )
		    {
		      $msg .= '<li><a href="' . $toRoot . 'SubTags/?id='. $subtag['sub_tag_id']. '">'. $subtag['sub_tag_name'] . '</a></li> ';
		    }
		 }
		 $msg .= '</ul>
			</div>
		     </li>';
	    }
        }
        $msg .= '</ul></div></nav>';
    }
    catch(Exception $e)
    {
        $msg = 'Unable to process tag type';
    }

 echo $msg;
}

?>
