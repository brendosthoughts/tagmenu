<?php 
include '../../db.class.php';

try{
  $sql = "SELECT update_time
    FROM content c
    ORDER BY update_time DESC LIMIT 1";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
        echo "something went wrong";
        exit(); 
}



header('Content-Type: application/xml; charset=utf-8');

?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <sitemap>
      <loc>http://www.mind-knowledge.com/docs-sitemap.xml</loc>
      <lastmod><?=to_w3c($videos[0]['update_time'])?></lastmod>
   </sitemap>
   <sitemap>
      <loc>http://www.mind-knowledge.com/debates-sitemap.xml</loc>
      <lastmod><?=to_w3c($videos[0]['update_time'])?></lastmod>
   </sitemap>
   <sitemap>
      <loc>http://www.mind-knowledge.com/other-sitemap.xml</loc>
      <lastmod><?=to_w3c($videos[0]['update_time'])?></lastmod>
   </sitemap>
   <sitemap>
      <loc>http://www.mind-knowledge.com/talks-sitemap.xml</loc>
      <lastmod><?=to_w3c($videos[0]['update_time'])?></lastmod>
   </sitemap>
</sitemapindex>

<?php
function to_w3c($time){
        return str_replace(" ", "T", $time) . "-05:00";
}
?>
