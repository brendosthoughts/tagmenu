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
?>
  <div class="item link">
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
        <span class="playTime"><?=$vid['play_time']?></span>
        </a>
        <span class="vidSubtags">
		<?php
		foreach($sub_tags as $subtag){
			echo '<a href="'.$subtag.'">' .$subtag. '</a>';
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
          <a href="#"><?=$tagging_info[0]['tag_type_name']?></a> From <a href=""><?=$vid['pub_name']?></a> In <?=$vid['pub_date']?>     
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
    </div> 
  </div>
  
<?php 
}//end of foreach loop 
?>
</div>
<div id="recentSub" class="owl-carousel sub">
<?php    foreach($result as $vid){
?>
  <div class="item"><h3><?=$vid['title']?></h3> <img src="<?=$vid['cover_img']?>" alt="<?=$vid['title']?>"> <i class="icon-video"></i></div>

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

<h2>Populaur this Month</h2>


<div id="popularMain" class="owl-carousel main">
  <div class="item link">
    <div class="vidInfo">
      <div class="left">
      <span class="vidCategories"> <a href="#"> category 1</a> <a href="#"> category 2</a> <a href="#"> category 3</a></span>
        <img src="images/testImage.jpg" alt="img title">
        <span class="playTime">1hr 25min</span>
        <span class="vidSubtags"> <a href="#">subtag 1</a> <a href="#">another subtag </a> <a href="#">third subtag </a> <a href="#">subtag </a> <a href="#">tag </a><a href="#">Fourth subtag</a>
        </span>
      </div>
      <div class="text">
       <a href="#"><h3>A testing of a title</h3></a>
        <p>
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut erat libero, rutrum vitae sapien blandit, vestibulum hendrerit leo. Donec pulvinar feugiat nisl a suscipit. Maecenas vulputate quis sapien ut tempus. Nunc mollis iaculis nunc eu lobortis. Etiam sollicitudin nunc purus, ornare ullamcorper felis posuere sit amet. Duis sodales auctor nisl id interdum. Proin ut placerat lorem. Phasellus dapibus vel diam ac blandit. Curabitur feugiat at eros et rutrum. Nam euismod magna vel urna lacinia elementum at nec orci. Nam varius ultricies facilisis.
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
    </div> 
  </div>  
  <a href="#" class="item link">  </a>
  <a href="#" class="item link">2</a>
  <a href="#" class="item link">3</a>
  <a href="#" class="item link">4</a>
  <a href="#" class="item link">5</a>
  <a href="#" class="item link">6</a>
  <a href="#" class="item link">7</a>
  <a href="#" class="item link">8</a>
  <a href="#" class="item link">9</a>
  <a href="#" class="item link">10</a>
  <a href="#" class="item link">11</a>
  <a href="#" class="item link">12</a>
  <a href="#" class="item link">13</a>
  <a href="#" class="item link">14</a>
  <a href="#" class="item link">15</a>
  <a href="#" class="item link">16</a>
  <a href="#" class="item link">17</a>
  <a href="#" class="item link">18</a>
  <a href="#" class="item link">19</a>
  <a href="#" class="item link">20</a>
  <a href="#" class="item link">21</a>
  <a href="#" class="item link">22</a>

</div>
<div id="popularSub" class="owl-carousel sub">
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>
  <div class="item"><h3>A testing of a title </h3> <img src="images/testImage.jpg" alt="A testing of a title "> <i class="icon-video"></i></div>

</div>

<?php 
  }catch(exception $e){
        echo "hmm something seems to have gone wrong try navigating elsewhere in the site";
  }
?>
