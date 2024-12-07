<?php if (!defined('ABSPATH')) exit; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php if (is_home() || is_front_page()): ?>

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php else: ?>

    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <?php endif; ?>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- title -->
    <?php if (is_home() || is_front_page()): ?>
      <title></title>
    <?php elseif (is_page('group')): ?>
      <title></title>
    <?php elseif (is_page('about')): ?>
      <title></title>
    <?php elseif (is_page('contact')): ?>
      <title></title>
    <?php elseif (is_singular('recruit')): ?>
      <title></title>
    <?php elseif (is_post_type_archive('news')): ?>
      <title></title>
    <?php elseif (is_post_type_archive('recruit')): ?>
      <title></title>
    <?php endif; ?>

    <!-- description -->
    <?php if (is_home() || is_front_page()): ?>
      <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php elseif (is_page('')): ?>
      <meta name="description" content="">
    <?php elseif (is_category()): ?>
      <meta name="description" content="<?php echo category_description(); ?>">
    <?php elseif (is_tag()): ?>
      <meta name="description" content="<?php echo tag_description(); ?>">
    <?php elseif (is_tax()): ?>
      <meta name="description" content=<?php echo tag_description(); ?>>
    <?php elseif (is_singular()): ?>
      <meta name="description" content="<?php echo get_the_excerpt(); ?>">
    <?php elseif (is_post_type_archive('カスタム投稿のスラッグ')): ?>
      <meta name="description" content="カスタム投稿一覧の説明">
    <?php endif; ?>

    <!-- og:site_name -->
    <meta property="og:site_name" content="このサイトの名前">

    <!-- og:title -->
    <?php if (is_home() || is_front_page()): ?>
      <meta property="og:title" content="">
    <?php elseif (is_page('group')): ?>
      <meta property="og:title" content="">
    <?php elseif (is_singular('recruit')): ?>
      <meta property="og:title" content="">
    <?php elseif (is_post_type_archive('news')): ?>
      <meta property="og:title" content="">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta property="og:title" content="">
    <?php endif; ?>


    <!-- og:url -->
    <?php if (is_home() || is_front_page()): ?>
      <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>" />
    <?php elseif (is_page('about')): ?>
      <meta property="og:url" content="<?php echo esc_url(home_url('/about/')); ?>" />
    <?php elseif (is_page('group')): ?>
      <meta property="og:url" content="<?php echo esc_url(home_url('/group/')); ?>" />
    <?php elseif (is_page('contact')): ?>
      <meta property="og:url" content="<?php echo esc_url(home_url('/contact/')); ?>" />
    <?php elseif (is_singular('recruit')): ?>
      <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
    <?php elseif (is_post_type_archive('news')): ?>
      <meta property="og:url" content="<?php echo esc_url(get_post_type_archive_link('news')); ?>">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta property="og:url" content="<?php echo esc_url(get_post_type_archive_link('recruit')); ?>">
    <?php endif; ?>

    <meta property="og:image" content="<?php echo get_theme_file_uri('assets/images/common/ogp/ogp.jpg'); ?>">
    <meta property="og:site_name" content="このサイトの名前">

    <!-- og:description -->
    <?php if (is_home() || is_front_page()): ?>
      <meta property="og:description" content="">
    <?php elseif (is_page('group')): ?>
      <meta property="og:description" content="">
    <?php elseif (is_page('about')): ?>
      <meta property="og:description" content="">
    <?php elseif (is_page('contact')): ?>
      <meta property="og:description" content="">
    <?php elseif (is_singular('recruit')): ?>
      <meta property="og:description" content="">
    <?php elseif (is_post_type_archive('news')): ?>
      <meta property="og:description" content="">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta property="og:description" content="">
    <?php endif; ?>

    <!-- twitter:card -->
    <meta name="twitter:card" content="summary_large_image">

    <?php if (is_home() || is_front_page()): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_page('group')): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_page('about')): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_page('contact')): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_singular('recruit')): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_post_type_archive('news')): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta name="twitter:title" content="">
    <?php endif; ?>


    <?php if (is_home() || is_front_page()): ?>
      <meta name="twitter:description" content="">
    <?php elseif (is_page('group')): ?>
      <meta name="twitter:description" content="">
    <?php elseif (is_page('about')): ?>
      <meta name="twitter:description" content="">
    <?php elseif (is_page('contact')): ?>
      <meta name="twitter:description" content="">
    <?php elseif (is_singular('recruit')): ?>
      <meta name="twitter:description" content="">
    <?php elseif (is_post_type_archive('news')): ?>
      <meta name="twitter:description" content="">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta name="twitter:description" content="">
    <?php endif; ?>

    <!-- og:type -->
    <meta property="og:type" content="<?php if (is_singular()) {
                                        echo 'article';
                                      } else {
                                        echo 'website';
                                      } ?>" />

    <!-- twitter:card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo get_theme_file_uri('/assets/images/common/ogp/ogp.jpg'); ?>">

    <!-- サイトカラー -->
    <meta name="theme-color" content="#8EC11F">

    <!-- モバイル検索結果にサムネイル画像を表示させるためのthumbnailタグ -->
    <meta name="thumbnail" content="<?php echo get_theme_file_uri('images/header/mobile-search.jpg'); ?>">

    <!-- ファビコン -->
    <link rel="icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/apple-touch-icon.png'); ?>" sizes="180x180">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/android-chrome.png'); ?>" sizes="192x192">

    <!-- ファーストビューの画像を先に読み込む -->
    <?php if (is_home() || is_front_page()): ?>
      <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/top/fv/fv1.jpg'); ?>">
      <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/top/fv/fv1.webp'); ?>">
    <?php elseif (is_page('group')): ?>
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Shippori+Mincho:wght@400;500;600;700;800&family=Sorts+Mill+Goudy:ital@0;1&display=swap" rel="stylesheet">

    <!-- Googleフォント -->

    <!-- canonical属性（類似ページがある場合、どのページをクロールさせるか指定する） -->
    <!-- <link rel="canonical" href="④リンク（このページのURLを入力）"> -->

    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M38HFQSX');</script> -->
    <!-- End Google Tag Manager -->

    <!-- /Google Search Console -->
    <!-- /Google Search Console -->

    <?php wp_head(); ?>
    </head>

  <body <?php body_class(); ?>><?php wp_body_open(); ?>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M38HFQSX"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
    <div class="pc-background">
      <!-- welcome-banner -->
      <div class="welcome-banner">
        <div class="welcome-banner__logo">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/pc-logo.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/pc-logo.png'); ?>" alt="アピタ長久手店のロゴ" loading="lazy">
          </picture>
        </div>
        <div class="welcome-banner__text">
          <p class="welcome-banner__title">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/welcome-title.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/welcome-title.png'); ?>" alt="Welcome to Forest" loading="lazy">
            </picture>
          </p>
          <p class="welcome-banner__description">
            自然豊かな街で、<br>
            みんなが楽しさ・喜びを<br>
            分かち合える森、<br>
            アピタ長久手店へようこそ。<br>
            楽しさあふれる森の中から<br>
            あなたの<span>”たからもの</span>を<br>
            見つけてください。
          </p>
        </div>
        <div class="welcome-banner__graphic">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/forest-graphic.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/forest-graphic.png'); ?>" alt="自然をモチーフにした木と動物のイラスト" loading="lazy">
          </picture>
        </div>
      </div>
      <!-- welcome-banner -->
      <!-- pc-navigation -->
      <div class="pc-navigation">
        <a href="#" class="pc-navigation__link">
          <img src="icon-restaurants.png" alt="レストランアイコン" loading="lazy">
          <span>RESTAURANTS</span>
        </a>
        <a href="#" class="pc-navigation__link">
          <img src="icon-floor-guide.png" alt="フロアガイドアイコン" loading="lazy">
          <span>FLOOR GUIDE</span>
        </a>
        <a href="#" class="pc-navigation__link">
          <img src="icon-shop-guide.png" alt="ショップガイドアイコン" loading="lazy">
          <span>SHOP GUIDE</span>
        </a>
        <a href="#" class="pc-navigation__link">
          <img src="icon-events.png" alt="イベントアイコン" loading="lazy">
          <span>EVENTS</span>
        </a>
        <a href="#" class="pc-navigation__link">
          <img src="icon-shop-news.png" alt="ショップニュースアイコン" loading="lazy">
          <span>SHOP NEWS</span>
        </a>
        <a href="#" class="pc-navigation__link">
          <img src="icon-about.png" alt="アバウトアイコン" loading="lazy">
          <span>ABOUT</span>
        </a>
      </div>
      <!-- pc-navigation -->

      <header class="header">
        <div class="header__inner">

          <?php if (is_home() || is_front_page()): ?>
            <h1 class="header__logo">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('images/header/logo.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('images/header/logo.png'); ?>" alt="ロゴ">
                </picture>
              </a>
            </h1>
          <?php else: ?>
            <p class="header__logo">
              <a href="<?php echo esc_url(home_url('/#home')); ?>" class="header__logo-link">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('images/header/logo.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('images/header/logo.png'); ?>" alt="ロゴ">
                </picture>
              </a>
            </p>
          <?php endif; ?>

          <nav class="header__menu">
            <ul class="header__list">
              <li class="header__item"><a href="" class="header__link"></a></li>
            </ul>
          </nav>
        </div>
      </header>
      <button type="button" id="hamburger" class="hamburger js-hamburger" aria-expanded="false" aria-controls="headerDrawer" aria-label="メニューを開く">
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <!-- <p class="header__menu">MENU</p> -->
      </button>
      <nav id="headerDrawer" class="headerDrawer js-drawer" aria-label="スマホ用メニュー" aria-hidden="true">
        <div class="headerDrawer__inner">
          <ul class="headerDrawer__list">
            <li class="headerDrawer__item">
              <a href="" class="headerDrawer__link"></a>
            </li>
          </ul>
        </div>
      </nav>