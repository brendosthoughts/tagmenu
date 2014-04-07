<?php
try
{
        $sql = "SELECT *
        FROM content c
        INNER JOIN phpro_tag_targets targets  ON c.tag_target_id = targets.tag_target_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id = types.tag_type_id
        INNER JOIN phpro_tags tags ON targets.tag_id = tags.tag_id
        INNER JOIN publisher p ON c.pub_id = p.pub_id
        WHERE content_id=:content_id";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->bindParam(':content_id', $_GET['videoID']);
        $stmt->execute();
        $vid = $stmt->fetch(PDO::FETCH_ASSOC);

        $tags = "SELECT *  FROM phpro_tag_targets targets
                INNER JOIN  sub_tags ON targets.sub_tag_id=sub_tags.sub_tag_id
                INNER JOIN phpro_tags tags ON targets.tag_id=tags.tag_id
                INNER JOIN phpro_tag_types types ON targets.tag_type_id = types.tag_type_id
                WHERE tag_target_id='{$vid['tag_target_id']}'";
            $stmt = db::getInstance()->prepare($tags);
            $stmt->execute();
            $tagging_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tags= array();
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
	    if (!isset($temp_array[$v['tag_name']]))
	        $temp_array[$v['tag_name']] =& $v;
	}
        $tags = array_values($temp_array);
/*
        foreach ($sub_tags as &$v) {
            if (!isset($temp_array[$v['sub_tag_id']]))
                $temp_array[$v['sub_tag_id']] =& $v;
        }
        $sub_tags = array_values($temp_array);
*/

}catch(Exception $e){
	echo "umm something went wrong your video must have hit a blackhole and been transported to an alternate direction";
	print_r($e);
	echo "<br> maybe try accesing this page from mars or try another link!";
}

?>


	

			<div class="vid_overlay">
				<h2 class="vid_title"><?=$vid['title']?></h2>
				<div class="vid_cats">
			<?php 
					$search_tags = array();
					$search_subtags=array();
					$tag_index=0;
					$sub_tag_index=0;
					foreach($tags as $tag){
						$search_tags[$tag_index++] = $tag['tag_id']; 
						echo '<div class="vidCategory">';
						echo '<a href="' .$toRoot. 'Categories/?id=' .$tag['tag_id']. '" class="vid_cat" title="Video Category">'.$tag['tag_name'] .' </a>';
						foreach($sub_tags as $subtag){
							if($subtag['tag_id']==$tag['tag_id']){
								$search_subtags[$sub_tag_index++] = $subtag['sub_tag_id']; 
								echo '<a href="'.$toRoot. 'SubTag/?id=' .$subtag['sub_tag_id'].'" class="subtag" title="subtag of the video">' .$subtag['sub_tag_name']. '</a>';
							}
						}
						echo '</div>';
					}
			?>
				</div>
				<div class="vid_maker_info">
					<span class="vid_type"><?=$vid['tag_type_name']?></span>
					  made by : <span class="vid_publisher"><?=$vid['pub_name']?> </span> 
					from <span class="pub_date"><?=$vid['pub_date'] ?> 
					</span>
				</div>
			</div>
	<div class="vid_holder">

		<div id="video_wrapper">
			<video id="feature_video"
			      class="video-js vjs-default-skin"
			      controls
			      height="480"
			      width:"600"
			      src=" "
			      preload="auto"
			      poster="<?=$vid['cover_img'] ?>"
			      data-setup='{"techOrder": ["youtube"], "src":"<?=$vid['src_link']?>"}'>
			</video>
		</div>
	</div>
	<div class="vid_info">
		<div id="vid_social_bar" class= "vid_sharing">
			<div class="ratingWidget">
		        <div class="ratingStars
		        	data-average="
		        	<?php if($vid['num_ratings']==0){echo 2.5;}                	
		        	else{
		        		echo $vid['rating']/$vid['num_ratings']; 
		        	}
		        	?>" 
		        	data-id="<?=$vid['content_id'] ?>">
		        </div>
	        	<span class="num_ratings"><?=$vid['num_ratings'] ?></span>
	      	</div>
        	<a href="#" title="share page to facebook" class="share_link" id="facebook"><i class="icon-facebook" target="_blank"></i></a>
			<a href="#" title="share page to twitter" class="share_link" id="twitter"><i class="icon-twitter-1"></i></a>
        	<a href="#" title="share page to google plus" class="share_link" id="gplus"><i class="icon-gplus" target="_blank"></i></a>
        	<a href="#" title="share page to Tumblr" class="share_link" id="tumblr"> <i class="icon-tumblr-1"></i></a>
        	<a href="#" title="share page to linkedin" class="share_link" id="linkedin" ><i class="icon-linked-in">in</i></a>
        	<a href="#" title="share page to stumbleupon" class="share_link" id="stumbleupon"> <i class="icon-stumbleupon"></i></a>
        	<a href="#" title="share page to reddit" class="share_link" id="reddit"> <i class="icon-reddit"></i></a>
        	<a href="#" title="share page via email" class="share_link" id="email"> <i class="icon-mail-alt"></i></a>
    	</div>

    	<article class="vid_description">
    		<span class="text-title">Description:</span>
			<?=$vid['description'] ?>
		</article>	
		<div class= "paid">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- playvideo-description add -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:250px;height:250px"
			     data-ad-client="ca-pub-9470638740363065"
			     data-ad-slot="2272557836"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
	</div>

	<div class="below_vid"> 

		<div class="bullshit_bar bullshit_rating" >


		</div>

	    <div class='similar_videos'> 
		<?php 
		/*subtags search and compare*/
			$values = implode(',', $search_subtags);
		    $sql ="SELECT tag_target_id, targets.tag_id, tag_name, sub_tag_name FROM phpro_tag_targets targets
		    	INNER JOIN  sub_tags ON targets.sub_tag_id=sub_tags.sub_tag_id
		        INNER JOIN phpro_tags tags ON targets.tag_id=tags.tag_id
		    	WHERE targets.sub_tag_id IN ($values)
		    	GROUP BY tag_target_id;
		    	";

		    $stmt = db::getInstance()->prepare($sql);
		    $stmt->execute();
		    $video = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
		    $z=0;
		        foreach($video as $related_vid){
		          	echo "vid ". $z++ . " -->";
		        	echo "<br> tag_target: " .$related_vid['tag_target_id'] . " tag_id->" . $related_vid['tag_id'] ."  sub_tag_name: " . $related_vid['sub_tag_name'] ;
		        	echo "<br>";
		        }
		       
		?>

	</div>
<div class="comments">
		
	</div>
<?php

	        $sql = "UPDATE content SET num_views = num_views + 1 WHERE content_id=:content_id";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->bindParam(':content_id', $vid['content_id']);
        $stmt->execute();
  
?>