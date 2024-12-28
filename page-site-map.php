<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: site-map
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="siteMap-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Site<span>Map</span></p>
        <h1 class="page-header__jp">サイトマップ</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <div class="siteMap-content">
    <div class="siteMap-content__inner inner">
      <ul class="siteMap-content__list">
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__top">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-top.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-top.png'); ?>" alt="TOPアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">TOP</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/information/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-facility.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-facility.png'); ?>" alt="施設からのお知らせアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">施設からのお知らせ</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/event/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.png'); ?>" alt="イベント・キャンペーンアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">イベント・キャンペーン</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/shop-news/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.png'); ?>" alt="ショップニュースアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">ショップニュース</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/floor/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.png'); ?>" alt="フロアガイドアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">フロアガイド</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/shop-guide/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.png'); ?>" alt="ショップガイドアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">ショップガイド</p>
          </a>
          <ul class="siteMap-content__sub-list">
            <li class="siteMap-content__sub-item">
              <a href="<?php echo esc_url(home_url('/shop-genre/gourmet/')); ?>" class="siteMap-content__sub-link">グルメ</a>
            </li>
            <li class="siteMap-content__sub-item">
              <a href="<?php echo esc_url(home_url('/shop-genre/fashion/')); ?>" class="siteMap-content__sub-link">ファッション</a>
            </li>
            <li class="siteMap-content__sub-item">
              <a href="<?php echo esc_url(home_url('/shop-genre/goods/')); ?>" class="siteMap-content__sub-link">グッズ</a>
            </li>
            <li class="siteMap-content__sub-item">
              <a href="<?php echo esc_url(home_url('/shop-genre/service/')); ?>" class="siteMap-content__sub-link">サービス</a>
            </li>
          </ul>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-recruit.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-recruit.png'); ?>" alt="求人情報アイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">求人情報</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/about/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__icon">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.png'); ?>" alt="施設情報アイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">施設情報</p>
          </a>
        </li>
        <li class="siteMap-content__item">
          <a href="<?php echo esc_url(home_url('/access/')); ?>" class="siteMap-content__link">
            <div class="siteMap-content__car">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-car.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-car.png'); ?>" alt="交通アクセスアイコン" loading="lazy">
              </picture>
            </div>
            <p class="siteMap-content__menu">交通アクセス</p>
          </a>
        </li>
      </ul>

      <ul class="siteMap-content__info">
        <li class="siteMap-content__info-item">
          <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>" class="siteMap-content__info-link">サイトの利用について</a>
        </li>
        <li class="siteMap-content__info-item">
          <a href="<?php echo esc_url(home_url('/site-map/')); ?>" class="siteMap-content__info-link">サイトマップ</a>
        </li>
        <li class="siteMap-content__info-item">
          <a href="https://www.uny.co.jp/privacy/" class="siteMap-content__info-link" target="_blank" rel="noopener">個人情報保護方針</a>
        </li>
        <li class="siteMap-content__info-item">
          <a href="<?php echo esc_url(home_url('/sdgs/')); ?>" class="siteMap-content__info-link">SDGs・地域連携</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- sns -->
  <section class="sns">
    <div class="sns__inner inner">
      <h2 class="sns__title title">
        <span class="sns__eng title__eng">SNS</span>
        <span class="sns__jp title__jp">このページをシェアする</span>
      </h2>
      <div class="sns__content">
        <?php get_template_part('/tmp/sns-share'); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>