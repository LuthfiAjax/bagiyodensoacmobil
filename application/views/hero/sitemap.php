<?php
header('Content-type: application/xml; charset="ISO-8859-1"', true);

$datetime1 = new DateTime(date('Y-m-d H:i:s'));
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url() ?></loc>
        <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url('tentang') ?></loc>
        <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?= base_url('layanan') ?></loc>
        <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?= base_url('kontak') ?></loc>
        <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?= base_url('artikel') ?></loc>
        <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>

    <?php foreach ($articles as $row) : ?>
    <url>
        <loc><?= base_url('artikel/'. $row['slug_article_id']) ?></loc>
        <lastmod><?= (new DateTime(date('Y-m-d H:i:s', $row['publish'])))->format(DATE_ATOM);; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>

</urlset>