<?php
if ( !defined( 'ABSPATH' ) ) exit;


//指定のCSSを非同期で読み込む
function load_css_async_top($html, $handle, $href, $media) {
  if ('font-awesome-all' === $handle or 'wp-block-library' === $handle) {
      //元の link 要素の HTML（改行が含まれているようなので前後の空白文字を削除）
      $default_html = trim($html);
      //HTML を変更
      $html = <<<EOT
      <link rel="stylesheet" id="{$handle}-css" href="$href" media="print" onload="this.media='all'">
      <noscript>{$default_html}</noscript>\n
      EOT;
  }
  return $html;
}
add_filter( 'style_loader_tag', 'load_css_async_top', 10, 4 );