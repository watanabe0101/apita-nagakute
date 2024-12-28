<?php if (!defined('ABSPATH')) exit; ?>

<?php
// 現在のページURLを取得してURLエンコード
if (is_singular()) {
  // 投稿ページや固定ページの場合
  $url_encode = urlencode(get_permalink());
  $title_encode = urlencode(get_the_title());
} elseif (is_tax()) {
  // タクソノミー一覧ページの場合
  $term = get_queried_object();
  if ($term) {
    $url_encode = urlencode(get_term_link($term)); // タクソノミーのURLを取得
    // 親となる投稿タイプを取得
    $post_type = get_taxonomy($term->taxonomy)->object_type[0] ?? null;
    $post_type_label = $post_type ? get_post_type_object($post_type)->label : '';
    $title_encode = urlencode($post_type_label . ' - ' . $term->name); // 親の投稿タイプ名 + タクソノミー名
  } else {
    $url_encode = ''; // URLが取得できなかった場合
    $title_encode = '';
  }
} elseif (is_post_type_archive()) {
  // カスタム投稿タイプのアーカイブページの場合
  $url_encode = urlencode(get_post_type_archive_link(get_post_type())); // カスタム投稿タイプのアーカイブURLを取得
  // アーカイブタイトルから「アーカイブ: 」や余分な情報を削除
  $raw_title = get_the_archive_title();
  $title_encode = urlencode(preg_replace('/アーカイブ: /', '', wp_strip_all_tags($raw_title))); // 「アーカイブ: 」を削除
}

// サイト名を取得
$site_name = get_bloginfo('name');
?>

<ul class="sns-list">
  <!-- Xの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url('https://twitter.com/share?url=' . $url_encode . '&text=' . $site_name . ' - ' . $title_encode); ?>">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/sns/x.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/common/sns/x.png'); ?>" alt="Xのアイコン" loading="lazy">
      </picture>
    </a>
  </li>
  <!-- Facebookの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url_encode . '&title=' . $site_name . ' - ' . $title_encode); ?>">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/sns/facebook.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/common/sns/facebook.png'); ?>" alt="facebookのアイコン" loading="lazy">
      </picture>
    </a>
  </li>
  <!-- LINEの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url('https://line.me/R/msg/text/?' . $site_name . ' - ' . $title_encode . '%0A' . $url_encode); ?>">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/sns/line.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/common/sns/line.png'); ?>" alt="LINEのアイコン" loading="lazy">
      </picture>
    </a>
  </li>
</ul>