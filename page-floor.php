<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: floor
*/
get_header(); ?>

<main class="main">
  <section class="floor-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Floor <span>Guide</span></p>
        <h1 class="page-header__jp">フロアガイド</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- floor-menu -->
  <div class="floor-menu">
    <div class="floor-menu__inner inner">
      <ul class="floor-menu__list">
        <li class="floor-menu__item">
          <a href="#b1" class="floor-menu__link">B1階</a>
        </li>
        <li class="floor-menu__item">
          <a href="#first" class="floor-menu__link">1階</a>
        </li>
        <li class="floor-menu__item">
          <a href="#second" class="floor-menu__link">2階</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- floor-basement -->
  <section id="b1" class="floor-map floor-basement">
    <div class="floor-map__inner inner">
      <h2 class="floor-map__title page-title">B1階</h2>
      <div class="floor-map__image">
        <?php if (get_field('b1マップ')): ?>
          <img src="<?php the_field('b1マップ'); ?>" alt="B1のフロアマップ" loading="lazy">
        <?php else: ?>
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="" loading="lazy">
          </picture>
        <?php endif; ?>
      </div>
      <?php if (get_field('b1マップpdf')): ?>
        <a href="<?php the_field('b1マップpdf'); ?>" class="floor-map__pdf" target="_blank" rel="noopener">マップPDF</a>
      <?php endif; ?>

      <div class="accordion">
        <details class="accordion__details js-details">
          <summary class="accordion__summary js-summary">
            B1階のショップ一覧
          </summary>
          <div class="accordion__content js-content">
            <div class="accordion__content-inner">

              <?php
              $term_object = get_queried_object();
              $term_slug = $term_object->slug;
              $args = array(
                'post_type' => 'shop-guide',
                'posts_per_page' => -1,
                'taxonomy' => 'floor', // ここを変更
                'term' => 'basement' // ここを変更
              );
              $the_query = new WP_Query($args);
              ?>
              <?php if ($the_query->have_posts()): ?>
                <ul class="shop-guide-card">
                  <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <li class="shop-guide-card__item">
                      <a href="<?php the_permalink(); ?>" class="shop-guide-card__link">
                        <?php if (get_field('ロゴ画像')): ?>
                          <div class="shop-guide-card__image">
                            <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
                          </div>
                        <?php else: ?>
                          <div class="shop-guide-card__image shop-guide-card__no-image">
                            <picture>
                              <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                              <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                            </picture>
                          </div>
                        <?php endif; ?>
                        <p class="shop-guide-card__title"><?php the_title(); ?></p>
                        <div class="shop-guide-card__content">
                          <?php $custom_field = get_field('業種');
                          if ($custom_field) { ?>
                            <p class="shop-guide-card__industry">
                              <?php echo $custom_field; ?>
                            </p>
                          <?php } ?>
                        </div>
                      </a>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php else: ?>
                <p class="shop-guide-card__not-text not-text">ただいま公開中のショップはございません。</p>
              <?php endif; ?>

            </div>
          </div>
        </details>
      </div>

    </div>
  </section>

  <!-- floor-first -->
  <section id="first" class="floor-map floor-first js-fadeIn">
    <div class="floor-map__inner inner">
      <h2 class="floor-map__title page-title">1階</h2>
      <div class="floor-map__image">
        <?php if (get_field('1fマップ')): ?>
          <img src="<?php the_field('1fマップ'); ?>" alt="1階のフロアマップ" loading="lazy">
        <?php else: ?>
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
          </picture>
        <?php endif; ?>
      </div>
      <?php if (get_field('1fマップpdf')): ?>
        <a href="<?php the_field('1fマップpdf'); ?>" class="floor-map__pdf" target="_blank" rel="noopener">マップPDF</a>
      <?php endif; ?>

      <div class="accordion">
        <details class="accordion__details js-details">
          <summary class="accordion__summary js-summary">
            1階のショップ一覧
          </summary>
          <div class="accordion__content js-content">
            <div class="accordion__content-inner">

              <?php
              $term_object = get_queried_object();
              $term_slug = $term_object->slug;
              $args = array(
                'post_type' => 'shop-guide',
                'posts_per_page' => -1,
                'taxonomy' => 'floor', // ここを変更
                'term' => 'first' // ここを変更
              );
              $the_query = new WP_Query($args);
              ?>
              <?php if ($the_query->have_posts()): ?>
                <ul class="shop-guide-card">
                  <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <li class="shop-guide-card__item">
                      <a href="<?php the_permalink(); ?>" class="shop-guide-card__link">
                        <?php if (get_field('ロゴ画像')): ?>
                          <div class="shop-guide-card__image">
                            <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
                          </div>
                        <?php else: ?>
                          <div class="shop-guide-card__image shop-guide-card__no-image">
                            <picture>
                              <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                              <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                            </picture>
                          </div>
                        <?php endif; ?>
                        <p class="shop-guide-card__title"><?php the_title(); ?></p>
                        <div class="shop-guide-card__content">
                          <?php $custom_field = get_field('業種');
                          if ($custom_field) { ?>
                            <p class="shop-guide-card__industry">
                              <?php echo $custom_field; ?>
                            </p>
                          <?php } ?>
                        </div>
                      </a>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php else: ?>
                <p class="shop-guide-card__not-text not-text">ただいま公開中のショップはございません。</p>
              <?php endif; ?>

            </div>
          </div>
        </details>
      </div>

    </div>
  </section>

  <!-- floor-second -->
  <section id="second" class="floor-map floor-second js-fadeIn">
    <div class="floor-map__inner inner">
      <h2 class="floor-map__title page-title">2階</h2>
      <div class="floor-map__image">
        <?php if (get_field('2fマップ')): ?>
          <img src="<?php the_field('2fマップ'); ?>" alt="2階のフロアマップ" loading="lazy">
        <?php else: ?>
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
          </picture>
        <?php endif; ?>
      </div>
      <?php if (get_field('2fマップpdf')): ?>
        <a href="<?php the_field('2fマップpdf'); ?>" class="floor-map__pdf" target="_blank" rel="noopener">マップPDF</a>
      <?php endif; ?>

      <div class="accordion">
        <details class="accordion__details js-details">
          <summary class="accordion__summary js-summary">
            2階のショップ一覧
          </summary>
          <div class="accordion__content js-content">
            <div class="accordion__content-inner">

              <?php
              $term_object = get_queried_object();
              $term_slug = $term_object->slug;
              $args = array(
                'post_type' => 'shop-guide',
                'posts_per_page' => -1,
                'taxonomy' => 'floor', // ここを変更
                'term' => 'second' // ここを変更
              );
              $the_query = new WP_Query($args);
              ?>
              <?php if ($the_query->have_posts()): ?>
                <ul class="shop-guide-card">
                  <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <li class="shop-guide-card__item">
                      <a href="<?php the_permalink(); ?>" class="shop-guide-card__link">
                        <?php if (get_field('ロゴ画像')): ?>
                          <div class="shop-guide-card__image">
                            <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
                          </div>
                        <?php else: ?>
                          <div class="shop-guide-card__image shop-guide-card__no-image">
                            <picture>
                              <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                              <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                            </picture>
                          </div>
                        <?php endif; ?>
                        <p class="shop-guide-card__title"><?php the_title(); ?></p>
                        <div class="shop-guide-card__content">
                          <?php $custom_field = get_field('業種');
                          if ($custom_field) { ?>
                            <p class="shop-guide-card__industry">
                              <?php echo $custom_field; ?>
                            </p>
                          <?php } ?>
                        </div>
                      </a>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php else: ?>
                <p class="shop-guide-card__not-text not-text">ただいま公開中のショップはございません。</p>
              <?php endif; ?>

            </div>
          </div>
        </details>
      </div>

    </div>
  </section>

  <!-- sns -->
  <section class="sns floor-sns js-fadeIn">
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
<!-- footer -->
<?php get_footer(); ?>