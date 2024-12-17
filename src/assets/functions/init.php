<?php

if ( !defined( 'ABSPATH' ) ) exit;


//ビジュアルエディタースタイルを適用
add_editor_style();

function my_setup(){
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // titleタグ自動生成
  add_theme_support('html5', array( // HTML5による出力
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
}
add_action('after_setup_theme', 'my_setup');




// URL末尾に/?author=1を打った時にTOPにリダイレクト（セキュリティ対策）
function theme_slug_redirect_author_archive()
{
  if (is_author()) {
    wp_redirect(home_url());
    exit;
  }
}
add_action('template_redirect', 'theme_slug_redirect_author_archive');



// REST APIでユーザー名を確認できないように（セキュリティ対策）
function my_filter_rest_endpoints($endpoints)
{
  if (isset($endpoints['/wp/v2/users'])) {
    unset($endpoints['/wp/v2/users']);
  }
  if (isset($endpoints['/wp/v2/users/(?P[\d]+)'])) {
    unset($endpoints['/wp/v2/users/(?P[\d]+)']);
  }
  return $endpoints;
}
add_filter('rest_endpoints', 'my_filter_rest_endpoints', 10, 1);



// 固定ページで「抜粋」を有効化
add_post_type_support('page', 'excerpt');
// カテゴリーとタグのmeta descriptionからpタグを除去
remove_filter('term_description','wpautop');


//投稿・固定ページ管理画面の記事一覧テーブルにIDカラムを作成
add_filter( 'manage_posts_columns', 'customize_admin_manage_posts_columns' );//投稿
add_filter( 'manage_pages_columns', 'customize_admin_manage_posts_columns' );//固定ページ
function customize_admin_manage_posts_columns($columns) {
  //投稿ID
  $columns['post-id'] = 'ID';

  return $columns;
}


//投稿・固定ページ管理画面の記事一覧テーブルにIDを表示
add_action( 'manage_posts_custom_column', 'customize_admin_add_column', 10, 2 );//投稿
add_action( 'manage_pages_custom_column', 'customize_admin_add_column', 10, 2 );//固定ページ
function customize_admin_add_column($column_name, $post_id) {
  //投稿ID
  if ( 'post-id' === $column_name ) {
    $thum = $post_id;
  }
  if ( isset($thum) && $thum ) {
    echo $thum;
  }
}

//投稿・固定ページ管理画面の記事一覧テーブルにIDソートを可能にする
add_filter( 'manage_edit-post_sortable_columns', 'sort_term_columns' );//投稿
add_filter( 'manage_edit-page_sortable_columns', 'sort_term_columns' );//固定ページ
function sort_term_columns($columns) {
  $columns['post-id'] = 'ID';
  return $columns;
}


// カスタム投稿のアーカイブページやタクソノミー一覧、などでwp_title() の出力を無効にする（titleタグが二重になるのを防ぐ）
function disable_wp_title() {
  if( is_post_type_archive('カスタム投稿のタイプ') || is_tax() || is_singular('カスタム投稿のタイプ') ) {
      return '';
  }
}
remove_action('wp_head', '_wp_render_title_tag', 1);
add_filter('wp_title', 'disable_wp_title', 10, 3);



// pタグ、brタグの自動挿入を防ぐ
function disable_autop_on_specific_page($content) {
  // 特定のページIDを指定
  if (is_page(array(146, 245, 247))) {
      remove_filter('the_content', 'wpautop');
      remove_filter('the_excerpt', 'wpautop');
  }
  return $content;
}
add_filter('the_content', 'disable_autop_on_specific_page', 0);
add_filter('the_excerpt', 'disable_autop_on_specific_page', 0);


// パーマリンクにランダムな数字を生成・保存する関数
function force_random_slug_on_new_post($post_ID)
{
  // 新規投稿の場合のみ処理
  if (!wp_is_post_revision($post_ID)) {
    // 投稿タイプが固定ページでない場合のみ処理
    $post_type = get_post_type($post_ID);
    if ($post_type != 'page') {
      // 現在の投稿のスラッグを取得
      $post = get_post($post_ID);

      // スラッグが空または自動生成された場合
      if (empty($post->post_name)) {
        // ランダムな数字のスラッグを生成
        $random_slug = makeRandStr(8);

        // スラッグを更新
        wp_update_post(array(
          'ID' => $post_ID,
          'post_name' => $random_slug
        ));
      }
    }
  }
}
add_action('save_post', 'force_random_slug_on_new_post', 10, 1);

// 既存のauto_post_slug関数と乱数生成関数はそのまま
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
  // 投稿タイプが固定ページでない場合のみ処理
  if ($post_type != 'page') {
    // スラッグが空の場合のみランダムスラッグを生成
    if (empty($slug)) {
      $slug = makeRandStr(8);
    }
  }
  return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 1, 4);

function makeRandStr($length = 8)
{
  static $chars = '0123456789';
  $str = '';
  for ($i = 0; $i < $length; ++$i) {
    $str .= $chars[mt_rand(0, 9)];
  }
  return $str;
}


// WordPressでwp_enqueue系の<style>や<script>から[type属性]を削除。
function custom_theme_setup()
{
  add_theme_support('html5', array('style', 'script'));
}
add_action('after_setup_theme', 'custom_theme_setup');


// wp-block-libraryのid重複を避ける
add_filter('style_loader_tag', function ($html, $handle) {
  if ($handle === 'wp-block-library') {
    // IDを削除
    return str_replace("id='wp-block-library-css'", '', $html);
  }
  return $html;
}, 10, 2);

// コンタクトページでキャッシュ無効化
function set_nocache_headers()
{
  if (is_page('contact')) {
    nocache_headers();
  }
}
add_action('template_redirect', 'set_nocache_headers');

function fix_post_id_on_preview($null, $post_id)
{
  if (is_preview()) {
    return get_the_ID();
  } else {
    $acf_post_id = isset($post_id->ID) ? $post_id->ID : $post_id;

    if (!empty($acf_post_id)) {
      return $acf_post_id;
    } else {
      return $null;
    }
  }
}
add_filter('acf/pre_load_post_id', 'fix_post_id_on_preview', 10, 2);


// 一覧画面の表示件数を変更
function change_posts_per_page($query)
{
  if (is_admin() || ! $query->is_main_query())
    return;
  if ($query->is_archive('recruit')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '2'); //表示件数を指定
    $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
  // } elseif ($query->is_archive('recruit')) { //カスタム投稿タイプを指定
  //   $query->set('posts_per_page', '10'); //表示件数を指定
  //   $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1); // ページネーションを設定
  }
}
add_action('pre_get_posts', 'change_posts_per_page');