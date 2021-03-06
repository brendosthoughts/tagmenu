<?php 
function clean_url($string){
   $string = preg_replace( '/[«»""!?,.!@£$%^&*{};:()]+/', '', $string );
   $string = strtolower($string);
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}


function display_video($vid, $toRoot, $referer){
try{
        $sql = "SELECT `tag_name`,`sub_tag_name`,`tag_type_name`  FROM phpro_tag_targets targets
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
<div class="vidInfo">
 <div class="left">
      <span class="vidCategories">
                <?php
                foreach($tags as $tag){
                        echo '<a href="'. $toRoot .'Category/'. clean_url($tag) .'">' .$tag. '</a>';
                }
                ?>
        </span>
        <a class="img-link"  href="<?php
		if(($toRoot == "") || ($referer =="subtag") || ($referer =="category")){ 
			if($tagging_info[0]['tag_type_name']=="Documentary" ){
				echo $toRoot. "Documentaries/" . clean_url($vid['title']);
			}else if($tagging_info[0]['tag_type_name']=="Debate" ){
				echo  $toRoot. "Debates/".clean_url($vid['title']);
			}else if($tagging_info[0]['tag_type_name']=="Talk" ){
        echo $toRoot. "Talks/".clean_url($vid['title']);
			}
		}else{ echo clean_url($vid['title']);} ?>" title="Play Video">
        <img src="<?=$vid['cover_img']?>" alt="img title">
        <i class="icon-play-circled"></i>
        <span class="playTime"><?= $vid['play_time'] ?></span>
        </a>
        <span class="vidSubtags">
                <?php
                foreach($sub_tags as $tag){
                        echo '<a href="'. $toRoot .'SubTag/'. clean_url($tag) .'">' .$tag. '</a>';
                }
                ?>
        </span>
      </div>
      <div class="text">
	<div class="text-right">
           <a href="#"><h3><?=$vid['title']?></h3></a>
           <p class="vidDescription">
           <?=$vid['description']?>
           </p>

           <span class="otherInfo">
              <a href="#"><?=$tagging_info[0]['tag_type_name']?></a> By <a href=""><?=$vid['pub_name']?></a> From <?=$vid['pub_date']?>
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
      </div>

    <a class="vidPlay"  href="<?php
    if(($toRoot == "") || ($referer =="subtag") || ($referer =="category")){ 
      if($tagging_info[0]['tag_type_name']=="Documentary" ){
        echo $toRoot. "Documentaries/" . clean_url($vid['title']);
      }else if($tagging_info[0]['tag_type_name']=="Debate" ){
        echo  $toRoot. "Debates/".clean_url($vid['title']);
      }else if($tagging_info[0]['tag_type_name']=="Talk" ){
        echo $toRoot. "Talks/".clean_url($vid['title']);
      }
    }else{ echo clean_url($vid['title']);} ?>" title="Play Video">Play</a>

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
                                                <ul class="main-category-list">
		';
        foreach($res as $val)
        {
	   if($val['tag_name']!=="unlisted"){
	         $msg .= '<li class="single-category">
			    <a href="#" class="category-link">' . $val['tag_name'] . '</a>
			    <div class="mp-level">
			        <a class="category-all" href="' . $toRoot . 'Category/' .clean_url($val['tag_name'])  .  '"><h4>' . $val['tag_name'] . '<span>all videos</span></h4></a>
			        <a class="mp-back" href="#">Back</a>
				<ul class="subtag-list">';
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
		      $msg .= '<li><a href="' . $toRoot . 'SubTag/'.clean_url( $subtag['sub_tag_name']). '">'. $subtag['sub_tag_name'] . '</a></li> ';
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

<?php 
function centerhorizontaladd(){
  ?>
<div class="centerhorizontaladd paid">
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          
          <ins class="adsbygoogle"
               style="display:block"
               data-ad-client="ca-pub-9470638740363065"
               data-ad-slot="5153912635"
               data-ad-format="auto"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script> 
</div>
<?php 
}
 ?>
