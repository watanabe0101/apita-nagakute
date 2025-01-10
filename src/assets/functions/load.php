<?php
if (!defined('ABSPATH')) exit;


// ファイルをheadとbodyの閉じタグ直前にに追加する関数と宣言
function my_script()
{
  wp_deregister_script('jquery'); // WordPressに含まれているjquery.jsを読み込まない
  wp_enqueue_script('jquery', get_theme_file_uri('/assets/jquery/jquery-3.7.1.min.js'), array(), filemtime(get_theme_file_path('assets/jquery/jquery-3.7.1.min.js')), true);

  wp_enqueue_script('jquery-picturefill', get_theme_file_uri('/assets/jquery/picturefill.min.js'), array(), filemtime(get_theme_file_path('assets/jquery/picturefill.min.js')), true);

  wp_enqueue_script('script-common', get_theme_file_uri('/assets/script/common.js'), array(), filemtime(get_theme_file_path('assets/script/common.js')), true);

  // wp_enqueue_style('lite-youtube-embed-style', get_stylesheet_directory_uri() . '/lite-youtube-embed/src/lite-yt-embed.css', array(), filemtime(get_theme_file_path('lite-youtube-embed/src/lite-yt-embed.css')));
  // wp_enqueue_script('script-lite-youtube-embed', get_theme_file_uri('/lite-youtube-embed/src/lite-yt-embed.js'), array(), filemtime(get_theme_file_path('lite-youtube-embed/src/lite-yt-embed.js')), true);

  // splide
  if (is_front_page() || is_post_type_archive('recruit') || is_singular('shop-news') || is_singular('shop-guide') || is_singular('event')) {
    wp_enqueue_script('script-splide', get_theme_file_uri('/splide/splide.min.js'), array(), filemtime(get_theme_file_path('splide/splide.min.js')), true);
    wp_enqueue_style('splide-style', get_stylesheet_directory_uri() . '/splide/splide-core.min.css', array(), filemtime(get_theme_file_path('splide/splide-core.min.css')));
  }
  
  if (is_front_page()) {
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/home.min.css', array(), filemtime(get_theme_file_path('assets/css/home.min.css')));
  }

  if (is_page('floor')) {
    wp_enqueue_style('floor-style', get_stylesheet_directory_uri() . '/assets/css/floor.min.css', array(), filemtime(get_theme_file_path('assets/css/floor.min.css')));
  }

  if (is_singular('shop-news')) {
    wp_enqueue_style('shop-news-style', get_stylesheet_directory_uri() . '/assets/css/home.min.css', array(), filemtime(get_theme_file_path('assets/css/home.min.css')));
  }

  // ショップガイド
  if (is_post_type_archive('shop-guide') || is_tax('shop-genre')) {
    wp_enqueue_style('archive-shop-guide-style', get_stylesheet_directory_uri() . '/assets/css/archive-shop-guide.min.css', array(), filemtime(get_theme_file_path('assets/css/archive-shop-guide.min.css')));
  }
  if (is_singular('shop-guide')) {
    wp_enqueue_style('single-shop-guide-style', get_stylesheet_directory_uri() . '/assets/css/single-shop-guide.min.css', array(), filemtime(get_theme_file_path('assets/css/single-shop-guide.min.css')));
  }

  // ショップニュース
  if (is_post_type_archive('shop-news') || is_tax('shop-news-genre')) {
    wp_enqueue_style('archive-shop-guide-style', get_stylesheet_directory_uri() . '/assets/css/archive-shop-news.min.css', array(), filemtime(get_theme_file_path('assets/css/archive-shop-news.min.css')));
  }
  if (is_singular('shop-news')) {
    wp_enqueue_style('single-shop-news-style', get_stylesheet_directory_uri() . '/assets/css/single-shop-news.min.css', array(), filemtime(get_theme_file_path('assets/css/single-shop-news.min.css')));
  }

  // イベント・キャンペーン
  if (is_post_type_archive('event') || is_tax('event_type') || is_tax('genre')) {
    wp_enqueue_style('event-style', get_stylesheet_directory_uri() . '/assets/css/archive-event.min.css', array(), filemtime(get_theme_file_path('assets/css/archive-event.min.css')));
  }
  if (is_singular('event')) {
    wp_enqueue_style('single-event-style', get_stylesheet_directory_uri() . '/assets/css/single-event.min.css', array(), filemtime(get_theme_file_path('assets/css/single-event.min.css')));
  }

  // 求人情報
  if (is_post_type_archive('recruit') || is_tax('recruitment_status')|| is_tax('employment_type') || is_tax('special_conditions') || is_tax('recruit_shop-genre')) {
    wp_enqueue_style('archive-recruit-style', get_stylesheet_directory_uri() . '/assets/css/archive-recruit.min.css', array(), filemtime(get_theme_file_path('assets/css/archive-recruit.min.css')));
  }
  if (is_singular('recruit')) {
    wp_enqueue_style('single-recruit-style', get_stylesheet_directory_uri() . '/assets/css/single-recruit.min.css', array(), filemtime(get_theme_file_path('assets/css/single-recruit.min.css')));
  }

  // 施設からのお知らせ
  if (is_post_type_archive('information')) {
    wp_enqueue_style('archive-information-style', get_stylesheet_directory_uri() . '/assets/css/archive-information.min.css', array(), filemtime(get_theme_file_path('assets/css/archive-information.min.css')));
  }
  if (is_singular('information')) {
    wp_enqueue_style('single-information-style', get_stylesheet_directory_uri() . '/assets/css/single-information.min.css', array(), filemtime(get_theme_file_path('assets/css/single-information.min.css')));
  }

  // 交通アクセス
  if (is_page('access')) {
    wp_enqueue_style('access-style', get_stylesheet_directory_uri() . '/assets/css/access.min.css', array(), filemtime(get_theme_file_path('assets/css/access.min.css')));
  }

  // 施設情報
  if (is_page('about')) {
    wp_enqueue_style('about-style', get_stylesheet_directory_uri() . '/assets/css/about.min.css', array(), filemtime(get_theme_file_path('assets/css/about.min.css')));
  }

  // サイトの利用について
  if (is_page('terms-of-service')) {
    wp_enqueue_style('terms-of-service-style', get_stylesheet_directory_uri() . '/assets/css/terms-of-service.min.css', array(), filemtime(get_theme_file_path('assets/css/terms-of-service.min.css')));
  }

  // サイトマップ
  if (is_page('site-map')) {
    wp_enqueue_style('site-map-style', get_stylesheet_directory_uri() . '/assets/css/site-map.min.css', array(), filemtime(get_theme_file_path('assets/css/site-map.min.css')));
  }

  // majica/UCSカード利⽤可能店舗
  if (is_page('majica-ucs')) {
    wp_enqueue_style('majica-ucs-style', get_stylesheet_directory_uri() . '/assets/css/majica-ucs.min.css', array(), filemtime(get_theme_file_path('assets/css/majica-ucs.min.css')));
  }

  // SDGs・地域連携
  if (is_page('sdgs')) {
    wp_enqueue_style('sdgs-style', get_stylesheet_directory_uri() . '/assets/css/sdgs.min.css', array(), filemtime(get_theme_file_path('assets/css/sdgs.min.css')));
  }

  // Facility-Information
  if (is_page('facility-information')) {
    wp_enqueue_style('facility-information-style', get_stylesheet_directory_uri() . '/assets/css/facility-information.min.css', array(), filemtime(get_theme_file_path('assets/css/facility-information.min.css')));
  }

  if (is_404()) {
    wp_enqueue_script('script-sticky-footer', get_theme_file_uri('/assets/script/sticky-footer.js'), array(), filemtime(get_theme_file_path('assets/script/sticky-footer.js')), true);
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/page-404.min.css', array(), filemtime(get_theme_file_path('assets/css/page-404.min.css')));
  }
}
add_action('wp_enqueue_scripts', 'my_script');



// JSファイルにdefer属性を付与（レンダリングを妨げるリソースの場外対策）
function add_defer($tag)
{
  // 管理画面では処理しない
  if (is_admin()) {
    return $tag;
  }

  // jQueryにはdeferを追加しない
  if (strpos($tag, 'jquery.js')) {
    return $tag;
  }

  // aioseo関連のスクリプトにはdeferを追加しない
  if (strpos($tag, 'aioseo')) {
    return $tag;
  }

  if (strpos($tag, 'lite-youtube-embed')) {
    return $tag;
  }

  // type="module" があるスクリプトにはdeferを追加しない
  if (strpos($tag, 'type="module"')) {
    return $tag;
  }

  // deferを付与
  return str_replace('src', 'defer src', $tag);
}
add_filter('script_loader_tag', 'add_defer', 10);
