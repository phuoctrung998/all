<?php
use yii\helpers\Url;
$baseUrl = Yii::getAlias('@webDomain');

// checking $protocol in HTTP or HTTPS
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                // this is HTTPS
                $protocol  = "https://";
            } else {
                // this is HTTP
                $protocol  = "http://";
            }
            $urlRel = $protocol.$_SERVER['SERVER_NAME'];
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach($models as $model) {?>
           <url>
              <loc><?=$urlRel?>/<?=$model->slug?>/<?=$model->vid?></loc>
			  <lastmod><?php echo date('c', $model->create_time); ?></lastmod>
              <changefreq>weekly</changefreq>
              <priority>0.7</priority>
           </url>
  <?php } ?>
</urlset>