<?php if (!defined('ABSPATH')) exit; ?>

<?php
// 現在のページURLを取得してURLエンコード
$url_encode = urlencode(get_permalink());
// 現在のページのタイトルを取得してURLエンコード
$title_encode = urlencode(get_the_title());
// サイト名を取得
$site_name = get_bloginfo('name');
?>

<ul class="sns-list">
  <!-- Xの共有リンク -->
  <li class="sns-item">
    <a class="sns-link" target="_blank" href="<?php echo esc_url('https://twitter.com/share?url=' . $url_encode . '&text=' . $site_name . ' - アピタ長久手 ' . $title_encode); ?>">
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