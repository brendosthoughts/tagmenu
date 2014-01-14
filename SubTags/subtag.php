<?php 
require_once("../../paginator.class.php");

try{
 if (isset($_GET['id'])){
	$sub_tag_id = $_GET['id'];

   $sql = "SELECT COUNT(*)
        FROM sub_tags sub_tags
        INNER JOIN phpro_tag_targets targets ON sub_tags.sub_tag_id=targets.sub_tag_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id=types.tag_type_id
        INNER JOIN content c ON targets.tag_target_id = c.tag_target_id
        WHERE sub_tags.sub_tag_id=".$sub_tag_id;
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tag_pages = new Paginator;
    $tag_pages->items_total = $count[0]['COUNT(*)'];
    $tag_pages->mid_range = 9;
    $tag_pages->paginate();
    $sql = "SELECT *
        FROM sub_tags sub_tags
        INNER JOIN phpro_tag_targets targets ON sub_tags.sub_tag_id=targets.sub_tag_id
        INNER JOIN phpro_tag_types types ON targets.tag_type_id=types.tag_type_id
        INNER JOIN content c ON targets.tag_target_id = c.tag_target_id
        WHERE sub_tags.sub_tag_id=".$sub_tag_id."
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

<h2><?=$videos[0]['sub_tag_name'] ?></h2>

<?php echo $tag_cloud ?>
<div class="videos">

<ul>
<?php foreach($videos as $vid){ 
?> 
    <li class="item link">
	<?php display_video($vid); ?>
   </li>

<?php 
}
?>
</ul>
<div id='paginator_btns'></div>;

</div>
