<?php 
require_once("../../paginator.class.php");
$toRoot="../";
try{
	
    $sql = "SELECT COUNT(*)
        FROM phpro_tag_types types
        INNER JOIN phpro_tag_targets targets ON types.tag_type_id=targets.tag_type_id
        INNER JOIN content c ON targets.tag_target_id = c.tag_target_id
        WHERE types.tag_type_id=15";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tag_pages = new Paginator;
    $tag_pages->items_total = $count[0]['COUNT(*)'];
    $tag_pages->mid_range = 9;
    $tag_pages->paginate();
    $sql = "SELECT DISTINCT content_id, pub_id, title, src_link, cover_img, src_page, description, series, pub_date, season_num, play_time, ep_num, rating, num_views
        FROM phpro_tag_types types
        INNER JOIN phpro_tag_targets targets ON types.tag_type_id=targets.tag_type_id
        INNER JOIN content c ON targets.tag_target_id = c.tag_target_id
        WHERE types.tag_type_id=15
        ORDER BY update_time DESC
        $tag_pages->limit";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e ){
echo "<h1>404 ... <br> back away , or the world could stop spinning </h1>";
print_r($e);
}
?>

<h2>Documentaries</h2>

<div class="videos">

<ul>
<?php foreach($videos as $vid){ 
?> 
    <li class="item link">
	<?php display_video($vid, $toRoot); ?>
   </li>

<?php 
}
?>
</ul>
<div id='paginator_btns'></div>;

</div>
