<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: TOP
*/
get_header(); ?>

<main class="main">
  <!-- fv -->
  <div class="fv">
    <div class="fv__inner">

      <div id="main-carousel" class="splide" aria-label="メインのスライダー">
        <div class="splide__track">
          <ul class="splide__list">
            <?php
            $args = array(
              'posts_per_page' => -1, // 表示する投稿数
              'paged' => $paged, //ページング
              'post_type' => 'fv', // 取得する投稿タイプのスラッグ
              'orderby' => 'date', //日付で並び替え
              'order' => 'DESC' // 降順 or 昇順
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="splide__slide">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="" loading="lazy">
                    </picture>
                  <?php endif; ?>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
        </div>
      </div>

      <div id="thumbnail-carousel" class="splide" aria-label="サムネイルスライダー。各サムネイルをクリックすると、メインのスライダーが切り替わります">

        <div class="splide__arrows">
          <!-- ↓ないとデフォルトの矢印 -->
          <button class="splide__arrow splide__arrow--prev"></button>
          <button class="splide__arrow splide__arrow--next"></button>
          <!-- ↑ないとデフォルトの矢印 -->
        </div>

        <div class="splide__track splide-sub">
          <ul class="splide__list splide-sub__list">
            <?php
            $args = array(
              'posts_per_page' => -1, // 表示する投稿数
              'paged' => $paged, //ページング
              'post_type' => 'fv', // 取得する投稿タイプのスラッグ
              'orderby' => 'date', //日付で並び替え
              'order' => 'DESC' // 降順 or 昇順
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="splide__slide splide-sub__item">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="" loading="lazy">
                    </picture>
                  <?php endif; ?>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- menu -->
  <div class="menu">
    <div class="menu__inner inner">
      <ul class="menu__list">
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-restaurants.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-restaurants.png'); ?>" alt="レストランアイコン">
              </picture>
            </div>
            <div class="menu__text">GOURMET</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.png'); ?>" alt="フロアガイドアイコン">
              </picture>
            </div>
            <div class="menu__text">FLOOR GUIDE</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.png'); ?>" alt="ショップガイドアイコン">
              </picture>
            </div>
            <div class="menu__text">SHOP GUIDE</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.png'); ?>" alt="イベントアイコン">
              </picture>
            </div>
            <div class="menu__text">EVENTS</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.png'); ?>" alt="ショップニュースアイコン">
              </picture>
            </div>
            <div class="menu__text">SHOP NEWS</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.png'); ?>" alt="アバウトアイコン">
              </picture>
            </div>
            <div class="menu__text">ABOUT</div>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- banner -->
  <div class="banner">
    <div class="banner__inner inner">

      <div id="main-banner" class="splide" aria-label="バナー">
        <div class="splide__arrows">
          <!-- ↓ないとデフォルトの矢印 -->
          <button class="splide__arrow splide__arrow--prev"></button>
          <button class="splide__arrow splide__arrow--next"></button>
          <!-- ↑ないとデフォルトの矢印 -->
        </div>
        <div class="splide__track">
          <ul class="splide__list">
            <?php
            $args = array(
              'posts_per_page' => -1, // 表示する投稿数
              'paged' => $paged, //ページング
              'post_type' => 'banner', // 取得する投稿タイプのスラッグ
              'orderby' => 'date', //日付で並び替え
              'order' => 'DESC' // 降順 or 昇順
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="splide__slide">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="" loading="lazy">
                    </picture>
                  <?php endif; ?>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- recommend -->
  <section class="recommend">
    <div class="recommend__inner inner">
      <h2 class="recommend__title title">
        <span class="recommend__eng title__eng">Special<span> Recommend</span></span>
        <span class="recommend__jp title__jp">おすすめ情報動画</span>
      </h2>
    </div>
    <div class="recommend__movie"></div>
  </section>
</main>

<!-- footer -->
<?php get_footer(); ?>