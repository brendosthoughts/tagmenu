<?php 
require_once("../../paginator.class.php");
$toRoot="../";
$referer="category";
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
               $tag_cloud .= ' <a class="tag_in_cloud" href="../SubTag/'. clean_url($subtag['sub_tag_name']) . '">'. $subtag['sub_tag_name'] . '</a>';
            }
        }
	$tag_cloud .= '</div>';

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
?> 
    <li class="item link">
	<?php display_video($vid, $toRoot, $referer); ?>
   </li>

<?php 
}
?>
</ul>
<div id='paginator_btns'></div>;

</div>
