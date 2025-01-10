<?php if (!defined('ABSPATH')) exit; ?>

<?php
// 現在のページURLを取得してURLエンコード
if (is_singular()) {
  $url = get_permalink();
  $title = get_the_title();
} elseif (is_tax()) {
  $term = get_queried_object();
  if ($term) {
    $url = rtrim(get_term_link($term), '/'); // 末尾のスラッシュを削除
    $post_type = get_taxonomy($term->taxonomy)->object_type[0] ?? null;
    $post_type_label = $post_type ? get_post_type_object($post_type)->label : '';
    $title = $post_type_label . ' - ' . $term->name;
  } else {
    $url = '';
    $title = '';
  }
} elseif (is_post_type_archive()) {
  $url = rtrim(get_post_type_archive_link(get_post_type()), '/'); // 末尾のスラッシュを削除
  $raw_title = get_the_archive_title();
  $title = preg_replace('/アーカイブ: /', '', wp_strip_all_tags($raw_title));
}

// サイト名を取得
$site_name = get_bloginfo('name');

// エンコード済みのURLとタイトルを準備
$url_encode = urlencode($url);
$title_encode = urlencode($site_name . ' - ' . $title);

// モバイル判定
if (wp_is_mobile()) {
  $line_share_url = 'https://line.me/R/share?text=' . rawurlencode($site_name . ' - ' . $title) . '%0A' . rawurlencode($url);
} else {
  $line_share_url = 'https://social-plugins.line.me/lineit/share?url=' . $url_encode . '&text=' . $title_encode;
}

?>

<ul class="sns-list">
  <!-- Xの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url('https://twitter.com/share?url=' . $url_encode . '&text=' . $site_name . ' - ' . $title); ?>">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/sns/x.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/common/sns/x.png'); ?>" alt="Xのアイコン" loading="lazy">
      </picture>
    </a>
  </li>
  <!-- Facebookの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url_encode . '&title=' . $site_name . ' - ' . $title); ?>">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/sns/facebook.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/common/sns/facebook.png'); ?>" alt="facebookのアイコン" loading="lazy">
      </picture>
    </a>
  </li>
  <!-- LINEの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url($line_share_url); ?>">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/sns/line.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/common/sns/line.png'); ?>" alt="LINEのアイコン" loading="lazy">
      </picture>
    </a>
  </li>
</ul>