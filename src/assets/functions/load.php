<?php
if (!defined('ABSPATH')) exit;


// ファイルをheadとbodyの閉じタグ直前にに追加する関数と宣言
function my_script()
{
  wp_deregister_script('jquery'); // WordPressに含まれているjquery.jsを読み込まない
  wp_enqueue_script('jquery', get_theme_file_uri('/assets/jquery/jquery-3.7.1.min.js'), array(), filemtime(get_theme_file_path('assets/jquery/jquery-3.7.1.min.js')), true);

  wp_enqueue_script('jquery-picturefill', get_theme_file_uri('/assets/jquery/picturefill.min.js'), array(), filemtime(get_theme_file_path('assets/jquery/picturefill.min.js')), true);

  wp_enqueue_script('script-common', get_theme_file_uri('/assets/script/common.js'), array(), filemtime(get_theme_file_path('assets/script/common.js')), true);
  
  if (is_front_page()) {
    wp_enqueue_script('script-splide', get_theme_file_uri('/splide/splide.min.js'), array(), filemtime(get_theme_file_path('splide/splide.min.js')), true);
    wp_enqueue_style('splide-style', get_stylesheet_directory_uri() . '/splide/splide-core.min.css', array(), filemtime(get_theme_file_path('splide/splide-core.min.css')));
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/home.min.css', array(), filemtime(get_theme_file_path('assets/css/home.min.css')));
  }

  if (is_404()) {
    wp_enqueue_script('script-sticky-footer', get_theme_file_uri('/assets/script/sticky-footer.js'), array(), filemtime(get_theme_file_path('assets/script/sticky-footer.js')), true);
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/page-404.min.css', array(), filemtime(get_theme_file_path('assets/css/page-404.min.css')));
  }
}
add_action('wp_enqueue_scripts', 'my_script');




// 指定のcommon.jsにtype="module"属性を追加
function add_module_type_attribute($tag, $handle, $src)
{
  $scripts = array('script-common');
  if (in_array($handle, $scripts)) {
    $tag = '<script src="' . esc_url($src) . '" type="module"></script>' . "\n";
  }
  return $tag;
}
add_filter('script_loader_tag', 'add_module_type_attribute', 10, 3);



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

  // deferを付与
  return str_replace('src', 'defer src', $tag);
}
add_filter('script_loader_tag', 'add_defer', 10);