<?php 
function sub_tag_cloud($tag){
	$msg = '<h4 class="tag_list">'. $tag . '</h4>';
        $sql = "SELECT * FROM phpro_tags tags
	INNER JOIN  phpro_tag_targets targets ON  tags.tag_id = targets.tag_id
        INNER JOIN sub_tags ON targets.sub_tag_id = sub_tags.sub_tag_id
        WHERE tags.tag_name='" .$tag ."'
	GROUP BY sub_tags.sub_tag_name";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $msg .= '<div class="sub_tag_cloud"><span>';
        foreach($result as $subtag)
        {
            if  ($subtag['sub_tag_name']!=="unknown") // || ($subtag['sub_tag_name'] !=="random") )
            {
               $msg .= '<a class="tags_in_cloud" href="subTag.php?subtag='.  $subtag['sub_tag_name'] . '">'. $subtag['sub_tag_name'] . '</a>';
            }
         }
        $msg .= '<span></div>';
 echo $msg;
}
function print_tag_nav(){
    try
    {

        $sql = "SELECT * FROM phpro_tags ORDER BY tag_name ASC";
        $stmt = db::getInstance()->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        /*** loop over the array and create the listing ***/
  	$msg = '    <nav id="category-menu" class="category-menu">
                                        <div class="mp-level">
                                                <h2 class="icon icon-world">All Categories</h2>
                                                <ul>
		';
        foreach($res as $val)
        {
	   if($val['tag_name']!=="unlisted"){
	         $msg .= '<li class="icon icon-arrow-left">
			      <a class="icon icon-display" href="#">' . $val['tag_name'] . '</a>
			      	<div class="mp-level">
				<a class="category-all" href="/tag.php?tag=' . $val['tag_name']  .  '">
				<h2 class="icon icon-display">' . $val['tag_name'] . '</h2>
				</a>
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
		      $msg .= '<li><a href="subTag.php?subtag='. $subtag['sub_tag_name']. '">'. $subtag['sub_tag_name'] . '</a></li>';
		    }
		 }
		 $msg .= '</ul></li>';
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

