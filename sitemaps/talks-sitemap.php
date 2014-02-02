<?php
include '../../db.class.php';

try{
  $sql = "SELECT title, update_time
    FROM content c
    WHERE tag_target_id IN (
    SELECT DISTINCT tag_target_id
    FROM phpro_tag_types types
    INNER JOIN phpro_tag_targets targets ON types.tag_type_id=targets.tag_type_id
    WHERE types.tag_type_id=17
	)
    ORDER BY update_time DESC";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
        echo "something went wrong";
        exit(); 
}

header('Content-Type: application/xml; charset=utf-8');
echo '
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
  xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
  ';

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($videos as $video) {
?>
    <url>
        <loc>http://www.mind-knowledge.com/Talks/<?= clean_url($video['title']) ?></loc>
	<lastmod><?=to_w3c($video['update_time'])?></lastmod>
	<changefreq>monthly</changefreq>
	<priority>0.3</priority>
    </url>

<?php
}
?>
</urlset>
<?php
function clean_url($string){
   $string = preg_replace( '/[«»""!?,.!@£$%^&*{};:()]+/', '', $string );
   $string = strtolower($string);
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
function to_w3c($time){
        return str_replace(" ", "T", $time) . "-05:00";
}

?>
