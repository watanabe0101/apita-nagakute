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

    <!-- Google Tag Manager -->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-K53XC74');
    </script>
    <!-- End Google Tag Manager -->

    <?php
    $title = get_bloginfo('name'); // デフォルトでサイト名を設定

    if (is_tax()) {
      // タクソノミーページの場合
      $term = get_queried_object();
      if ($term) {
        $title = get_bloginfo('name') . ' - ' . get_post_type_object(get_taxonomy($term->taxonomy)->object_type[0])->label . ' - ' . $term->name;
      }
    } elseif (is_post_type_archive()) {
      // カスタム投稿タイプアーカイブの場合
      $title = get_bloginfo('name') . ' - ' . post_type_archive_title('', false);
    } elseif (is_singular()) {
      // 投稿や固定ページの場合
      $title = get_the_title() . ' - ' . get_bloginfo('name');
    }
    ?>

    <!-- title -->
    <?php if (is_home() || is_front_page()): ?>
      <title>TOPページ - アピタ長久手</title>
    <?php elseif (is_page('floor')): ?>
      <title>フロアガイド - アピタ長久手</title>
    <?php elseif (is_page('about')): ?>
      <title>施設情報 - アピタ長久手</title>
    <?php elseif (is_page('access')): ?>
      <title>交通アクセス - アピタ長久手</title>
    <?php elseif (is_page('terms-of-service')): ?>
      <title>サイトの利用について - アピタ長久手</title>
    <?php elseif (is_page('site-map')): ?>
      <title>サイトマップ - アピタ長久手</title>
    <?php elseif (is_page('sdgs')): ?>
      <title>SDGs・地域連携 - アピタ長久手</title>
    <?php elseif (is_page('facility-information')): ?>
      <title>Facility Information - アピタ長久手</title>
    <?php elseif (is_page('majica-ucs')): ?>
      <title>majica/UCSカード利⽤可能店舗 - アピタ長久手</title>
    <?php elseif (is_singular()): ?>
      <title><?php echo esc_attr($title); ?></title>
    <?php elseif (is_post_type_archive()): ?>
      <title><?php echo esc_attr($title); ?></title>
    <?php elseif (is_post_type_archive()): ?>
      <title><?php echo esc_attr($title); ?></title>
    <?php elseif (is_tax()): ?>
      <title><?php echo esc_attr($title); ?></title>
    <?php endif; ?>

    <?php
    $description = get_bloginfo('name'); // デフォルトでサイト名を設定
    if (is_singular()) {
      $description = get_bloginfo('name') . ' - ' . get_the_title();
    }
    ?>

    <!-- description -->
    <?php if (is_tax()): ?>
      <meta name="description" content="<?php echo esc_attr($title); ?>ページです。">
    <?php elseif (is_post_type_archive()): ?>
      <meta name="description" content="<?php echo esc_attr($title); ?>ページです。">
    <?php elseif (is_singular() && !is_singular('shop-guide') && !is_singular('event') && !is_singular('recruit') && !is_singular('information') && !is_page()): ?>
      <meta name="description" content="<?php echo esc_attr($description); ?>ページです。">
    <?php endif; ?>

    <meta property="og:image" content="<?php echo get_theme_file_uri('assets/images/common/ogp/ogp.jpg'); ?>">

    <!-- og:title -->
    <?php if (is_tax()): ?>
      <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <?php endif; ?>

    <!-- og:description -->
    <?php if (is_tax()): ?>
      <meta property="og:description" content="<?php echo esc_attr($title); ?>ページです。">
    <?php elseif (is_singular() && !is_singular('shop-guide') && !is_singular('event') && !is_singular('recruit') && !is_singular('information') && !is_page()): ?>
      <meta property="og:description" content="<?php echo esc_attr($description); ?>ページです。">
    <?php elseif (is_post_type_archive()): ?>
      <meta property="og:description" content="<?php echo esc_attr($title); ?>ページです。">
    <?php endif; ?>

    <!-- twitter:title -->
    <?php if (is_singular('recruit')): ?>
      <meta name="twitter:title" content="">
    <?php elseif (is_tax()): ?>
      <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta name="twitter:title" content="">
    <?php endif; ?>

    <!-- twitter:description -->
    <?php if (is_singular() && !is_singular('shop-guide') && !is_singular('event') && !is_singular('recruit') && !is_singular('information') && !is_page()): ?>
      <meta name="twitter:description" content="<?php echo esc_attr($description); ?>ページです。">
    <?php elseif (is_post_type_archive()): ?>
      <meta name="twitter:description" content="<?php echo esc_attr($title); ?>ページです。">
    <?php elseif (is_tax()): ?>
      <meta name="twitter:description" content="<?php echo esc_attr($title); ?>ページです。">
    <?php endif; ?>

    <!-- twitter:card -->
    <meta name="twitter:image" content="<?php echo get_theme_file_uri('/assets/images/common/ogp/twitter.jpg'); ?>">

    <!-- サイトカラー -->
    <meta name="theme-color" content="#008C4F">

    <!-- モバイル検索結果にサムネイル画像を表示させるためのthumbnailタグ -->
    <meta name="thumbnail" content="<?php echo get_theme_file_uri('/assets/images/common/ogp/ogp.jpg'); ?>">

    <!-- ファビコン -->
    <link rel="icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/apple-touch-icon.png'); ?>" sizes="180x180">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/android-chrome.png'); ?>" sizes="192x192">

    <!-- ファーストビューの画像を先に読み込む -->
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/header/header-logo.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/header/header-eng.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/majica.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/ucs.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/icon-restaurants.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/icon-floor-guide.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/icon-shop-guide.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/icon-events.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/icon-shop-news.png'); ?>">
    <link rel="preload" as="image" href="<?php echo get_theme_file_uri('./assets/images/common/icon/icon-about.png'); ?>">

    <!-- Googleフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" fetchpriority="high" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" media="print" onload='this.media="all"' />

    <?php wp_head(); ?>
    </head>

  <body <?php body_class(); ?>><?php wp_body_open(); ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K53XC74"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="pc-background">
      <!-- welcome-banner -->
      <div class="welcome-banner">
        <div class="welcome-banner__inner">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="welcome-banner__logo">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/pc-logo.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/common/welcome-banner/pc-logo.png'); ?>" alt="アピタ長久手店のロゴ" loading="lazy">
            </picture>
          </a>
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
              あなたの<span>”たからもの”</span>を<br>
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
      </div>
      <!-- welcome-banner -->
      <!-- pc-navigation -->
      <div class="pc-navigation">
        <div class="pc-navigation__inner">
          <ul class="pc-navigation__list">
            <li class="pc-navigation__item">
              <a href="<?php echo esc_url(home_url('/shop-genre/gourmet/')); ?>" class="pc-navigation__link">
                <div class="pc-navigation__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-restaurants.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-restaurants.png'); ?>" alt="レストランアイコン">
                  </picture>
                </div>
                <span class="pc-navigation__text">RESTAURANTS</span>
              </a>
            </li>
            <li class="pc-navigation__item">
              <a href="<?php echo esc_url(home_url('/floor/')); ?>" class="pc-navigation__link">
                <div class="pc-navigation__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.png'); ?>" alt="フロアガイドアイコン">
                  </picture>
                </div>
                <span class="pc-navigation__text">FLOOR GUIDE</span>
              </a>
            </li>
            <li class="pc-navigation__item">
              <a href="<?php echo esc_url(home_url('/shop-guide/')); ?>" class="pc-navigation__link">
                <div class="pc-navigation__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.png'); ?>" alt="ショップガイドアイコン">
                  </picture>
                </div>
                <span class="pc-navigation__text">SHOP GUIDE</span>
              </a>
            </li>
            <li class="pc-navigation__item">
              <a href="<?php echo esc_url(home_url('/event/')); ?>" class="pc-navigation__link">
                <div class="pc-navigation__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.png'); ?>" alt="イベントアイコン">
                  </picture>
                </div>
                <span class="pc-navigation__text">EVENTS</span>
              </a>
            </li>
            <li class="pc-navigation__item">
              <a href="<?php echo esc_url(home_url('/shop-news/')); ?>" class="pc-navigation__link">
                <div class="pc-navigation__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.png'); ?>" alt="ショップニュースアイコン">
                  </picture>
                </div>
                <span class="pc-navigation__text">SHOP NEWS</span>
              </a>
            </li>
            <li class="pc-navigation__item">
              <a href="<?php echo esc_url(home_url('/about/')); ?>" class="pc-navigation__link">
                <div class="pc-navigation__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.png'); ?>" alt="アバウトアイコン">
                  </picture>
                </div>
                <span class="pc-navigation__text">ABOUT</span>
              </a>
            </li>
          </ul>
          <div class="pc-navigation__payment">
            <a href="<?php echo esc_url(home_url('/majica-ucs/')); ?>" class="pc-navigation__payment-link">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/pc-navigation/pc-navigation-payment.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/pc-navigation/pc-navigation-payment.png'); ?>" alt="majica UCSカード利用可能店舗一覧" loading="lazy">
              </picture>
            </a>
          </div>
          <div class="pc-navigation__graphic">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/common/pc-navigation/pc-navigation-bc.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/common/pc-navigation/pc-navigation-bc.png'); ?>" alt="自然をモチーフにした木々と動物のイラスト" loading="lazy">
            </picture>
          </div>
        </div>
      </div>
      <!-- pc-navigation -->
      <div class="main-content">

        <header class="header">
          <div class="header__inner">
            <div class="header__left">
              <?php if (is_home() || is_front_page()): ?>
                <h1 class="header__logo">
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/header/header-logo.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/header/header-logo.png'); ?>" alt="アピタ長久手店のロゴ">
                    </picture>
                  </a>
                </h1>
              <?php else: ?>
                <p class="header__logo">
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/header/header-logo.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/header/header-logo.jpg'); ?>" alt="アピタ長久手店のロゴ">
                    </picture>
                  </a>
                </p>
              <?php endif; ?>
              <a href="<?php echo esc_url(home_url('/facility-information/')); ?>" class="header__eng">
                <div class="header__eng-image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/header/header-eng.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/header/header-eng.png'); ?>" alt="Englishアイコン">
                  </picture>
                </div>
                <p class="header__eng-text">English</p>
              </a>
            </div>

            <div class="header__right">
              <a href="<?php echo esc_url(home_url('/majica-ucs/')); ?>" class="header__payment">
                <div class="header__majica">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/majica.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/majica.png'); ?>" alt="majicaのアイコン" loading="eager">
                  </picture>
                </div>
                <div class="header__ucs">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/ucs.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/ucs.png'); ?>" alt="ucsのアイコン" loading="eager">
                  </picture>
                </div>
              </a>
              <button type="button" id="hamburger" class="hamburger js-hamburger" aria-expanded="false" aria-controls="headerDrawer" aria-label="メニューを開く">
                <span class="hamburger__line"></span>
                <span class="hamburger__line"></span>
                <span class="hamburger__line"></span>
                <span class="hamburger__menu">menu</span>
              </button>
            </div>

          </div>
        </header>

        <nav id="headerDrawer" class="headerDrawer js-drawer" aria-label="スマホ用メニュー" aria-hidden="true">
          <div class="headerDrawer__inner">
            <ul class="headerDrawer__list">
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__top">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-top.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-top.png'); ?>" alt="TOPアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">TOP</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/information/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-facility.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-facility.png'); ?>" alt="施設からのお知らせアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">施設からのお知らせ</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/event/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.png'); ?>" alt="イベント・キャンペーンアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">イベント・キャンペーン</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/shop-news/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.png'); ?>" alt="ショップニュースアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">ショップニュース</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/floor/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.png'); ?>" alt="フロアガイドアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">フロアガイド</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/shop-guide/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.png'); ?>" alt="ショップガイドアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">ショップガイド</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-recruit.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-recruit.png'); ?>" alt="求人情報アイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">求人情報</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__icon">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.png'); ?>" alt="施設情報アイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">施設情報</p>
                </a>
              </li>
              <li class="headerDrawer__item">
                <a href="<?php echo esc_url(home_url('/access/')); ?>" class="headerDrawer__link">
                  <div class="headerDrawer__car">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-car.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-car.png'); ?>" alt="交通アクセスアイコン" loading="lazy">
                    </picture>
                  </div>
                  <p class="headerDrawer__menu">交通アクセス</p>
                </a>
              </li>
            </ul>

            <ul class="headerDrawer__info">
              <li class="headerDrawer__info-item">
                <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>" class="headerDrawer__info-link">サイトの利用について</a>
              </li>
              <li class="headerDrawer__info-item">
                <a href="<?php echo esc_url(home_url('/site-map/')); ?>" class="headerDrawer__info-link">サイトマップ</a>
              </li>
              <li class="headerDrawer__info-item">
                <a href="https://www.uny.co.jp/privacy/" class="headerDrawer__info-link" target="_blank" rel="noopener">個人情報保護方針</a>
              </li>
              <li class="headerDrawer__info-item">
                <a href="<?php echo esc_url(home_url('/sdgs/')); ?>" class="headerDrawer__info-link">SDGs・地域連携</a>
              </li>
            </ul>
          </div>
        </nav>