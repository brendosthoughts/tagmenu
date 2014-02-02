<?php
include '../../db.class.php';
try{
  $sql = "SELECT tag_name
FROM phpro_tags";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
        echo "something went wrong";
        exit(); 
}

try{
  $sql = "SELECT sub_tag_name
FROM sub_tags";
    $stmt = db::getInstance()->prepare($sql);
    $stmt->execute();
    $subtags = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
        echo "something went wrong";
        exit(); 
}

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
  xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
';

?>
 <url> 
     <loc>http://www.mind-knowledge.com/</loc>
     <changefreq>daily</changefreq>
     <priority>1.0</priority>
 </url>
 <url> 
     <loc>http://www.mind-knowledge.com/Documentaries/</loc>
     <changefreq>daily</changefreq>
     <priority>1.0</priority>
 </url>
 <url> 
     <loc>http://www.mind-knowledge.com/Talks/</loc>
     <changefreq>daily</changefreq>
     <priority>1.0</priority>
 </url>
 <url> 
     <loc>http://www.mind-knowledge.com/Debates/</loc>
     <changefreq>daily</changefreq>
     <priority>1.0</priority>
 </url>


<?php
foreach($categories as $cat){
?>
 <url>
     <loc>http://www.mind-knowledge.com/Category/<?=$cat['tag_name']?></loc>
     <changefreq>never</changefreq>
     <priority>0.6</priority>
 </url>
<?php
}

foreach($subtags as $subtag){
?>
 <url>
     <loc>http://www.mind-knowledge.com/SubTag/<?=$subtag['sub_tag_name']?></loc>
     <changefreq>never</changefreq>
     <priority>0.6</priority>
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
        return str_replace(" ", "T", $time) . "-5:00";
}

?>
