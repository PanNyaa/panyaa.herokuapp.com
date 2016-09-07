<?php
// wp-load.php を読み込む（環境に応じて書き換えて下さい）
require_once dirname(__FILE__) . '/../wp-load.php';
 
require_once dirname(__FILE__) . '/sitemap_generator.php';
 
$sitemap = new SitemapGenerator();
 
// 取得する記事の設定
$args = array(
    'posts_per_page'   => -1, // すべての記事
    'offset'           => 0,
    'category_name'    => '',
    'orderby'          => 'post_date', // 投稿順
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => ['post', 'page'],  // ブログ記事と固定ページ
    'post_mime_type'   => '',
    'post_parent'      => '',
    'post_status'      => 'publish', // 公開されている記事のみ
    'suppress_filters' => false
);
 
// WordPress ホームページを登録
$datetime1 = new DateTime(get_lastpostmodified());
$home = array(
    'loc' => home_url(),
    'lastmod' => $datetime1->format('c'),
    'changefreq' => 'daily',
    'priority' => 1.0
);
$sitemap->add($home);
 
// 投稿と固定ページを登録
$posts = get_posts( $args );
 
foreach($posts as $post){
    $permalink = get_permalink($post->ID);
    if($permalink === false) $permalink = $post->guid;
    $datetime2 = new DateTime($post->post_modified);
    $param = array(
        'loc' => $permalink,
        'lastmod' => $datetime2->format('c'),
        'changefreq' => 'monthly',
        'priority' => 0.5
    );
    $sitemap->add($param);
}
 
$sitemap->generate();
exit;