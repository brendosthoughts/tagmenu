<?php
try
{
        db::getInstance()->beginTransaction();
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
            $sub_tags[$i]['sub_tag_name'] = $value['sub_tag_name'];
            $sub_tags[$i]['sub_tag_id'] = $value['sub_tag_id'];
	    $i++;
        }
//make each value unique as only need to display once not multiple times
	$temp_array = array();
	foreach ($tags as &$v) {
	    if (!isset($temp_array[$v['tag_name']]))
	        $temp_array[$v['tag_name']] =& $v;
	}
        $tags = array_values($temp_array);

        foreach ($sub_tags as &$v) {
            if (!isset($temp_array[$v['sub_tag_id']]))
                $temp_array[$v['sub_tag_id']] =& $v;
        }
        $sub_tags = array_values($temp_array);


}catch(Exception $e){
	echo "umm something went wrong your video must have hit a blackhole and been transported to an alternate direction";
	print_r($e);
	echo "<br> maybe try accesing this page from mars or try another link!";
}

?>
<h2 class="vid_title"><?=$vid['title']?></h2>

	<div class="vid_cats">
		<?php foreach($tags as $tag){
			echo '<a href="' .$toRoot. 'Categories/?id=' .$tag['tag_id']. '" class="vid_cat" title="Video Category">'.$tag['tag_name'] .' </a>';
		}?>
	</div>

<div class="page_center">
	<div class="vid_holder">
		<div class="vid_maker_info">
			<span class="vid_type"><a href="#"><?=$vid['tag_type_name']?></a> </span>
			 Made by : <span class="vid_publisher"><?=$vid['pub_name']?> </span> 
			on <span class="pub_date"><?=$vid['pub_date'] ?> 
			</span>
		</div>
		<div id="video_wrapper">

		<video id="feature_video"
		      class="video-js vjs-default-skin"
		      controls
		      height= "264"
		      width= "600"
		      preload="auto"
		      poster="<?=$vid['cover_img'] ?>"
		      data-setup='{"techOrder":["youtube"], "src":"<?=$vid['src_link']?>"}'>
		</video></div>

	</div>
	<div class="vid_right">
		<article class="vid_description">
			<h4> Description: </h4>
				<?=$vid['description'] ?>
		</article>
	</div>
	<div class= "vid_sharing">
		<div id="r1" class="rate_widget">  
	    	<span class="star_1 ratings_stars"></span>  
	        <span class="star_2 ratings_stars"></span>  
	        <span class="star_3 ratings_stars"></span>  
	        <span class="star_4 ratings_stars"></span>  
	        <span class="star_5 ratings_stars"></span>  
	        <span class="total_votes">vote data</span>  
	    </div>
		<button class="share_link" id="twitter"><i class="icon-twitter-1"></i>Twitter</button>
		<button class="share_link" id="facebook"><i class="icon-facebook" target="_blank"></i>Facebook</button>
	    <button class="share_link" id="gplus"><i class="icon-gplus" target="_blank"></i>Google+</button>
	    <button class="share_link" id="linkedin" ><i>in</i>LinkedIn</button>    
		<button class="share_link" id="stumbleupon"> <i class="icon-stumbleupon"></i>StumbleUpon</button>
		<button class="share_link" id="reddit"> <i class="icon-reddit"></i> reddit </button>
	</div>

</div>
<div class= "add_below_vid">
		<span class="single_add">advertise with us </span>
		<span class="single_add">ur add here</span>
		<span class="single_add">advertise with us </span>		
		<span class="single_add">ur add here</span>
</div>
<div class="below_vid"> 

	<div class="bullshit_bar bullshit_rating" >


	</div>

	<div class="vid_subtags" >
		<a href="vid_subtag">subtag1 </a>
		<a href="vid_subtag">subtag2 </a>
		<a href="vid_subtag">subtag3 </a>
		<a href="vid_subtag">subtag4 </a>
		<a href="vid_subtag">subtag5 </a>
		<a href="vid_subtag">subtag5 </a>
	</div>

	<div class="similar_videos">
		<div class="type_similar">
		    similar videos in an owl carousel of the same video type
		</div>
		<div class="other_types_similar">
			similar videos in an owl carousel off other types
		</div>
	</div>	
</div>
<div class="comments">
	
</div>


