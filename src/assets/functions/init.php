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
add_action('save_post', function ($post_id) {
  // 自動保存やリビジョンの更新を避ける
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  // 投稿タイプが "page" でない場合のみ実行
  if (get_post_type($post_id) !== 'page') {
    // 現在のスラッグを取得
    $current_slug = get_post_field('post_name', $post_id);

    // スラッグがランダムな数字でない場合に更新
    if (!preg_match('/^[0-9]{8}$/', $current_slug)) {
      // ランダムな8桁の数字を生成
      $new_slug = makeRandStr(8);
      wp_update_post([
        'ID' => $post_id,
        'post_name' => $new_slug,
      ]);
    }
  }
});

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