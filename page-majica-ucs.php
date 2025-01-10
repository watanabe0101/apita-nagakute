<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: majica-ucs
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <div class="majicaUcs-header">
    <div class="majicaUcs-header__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/majica-ucs/majica-ucs-header.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/majica-ucs/majica-ucs-header.jpg'); ?>" alt="majica/UCSカード利⽤可能店舗一覧【このマークが目印です】" loading="lazy">
      </picture>
    </div>
    <div class="inner">
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </div>

  <div class="majicaUcs-content">
    <div class="majicaUcs-content__inner inner">
      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
      <?php $args = array(
        'posts_per_page' => -1, // 表示する投稿数
        'paged' => $paged, //ページング
        'post_type' => 'shop-guide', // 取得する投稿タイプのスラッグ
        'orderby' => 'date', //日付で並び替え
        'order' => 'DESC', // 降順 or 昇順
        'tax_query' => array(
          array(
            'taxonomy' => 'payment', // タクソノミー（スラッグ）
            'field' => 'slug', // スラッグをキーにして投稿を取得する旨の指定
            'terms' => array('majica', 'ucs'), // ターム（スラッグ）
            'operator' => 'IN'
          ),
        ),
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) : ?>
        <ul class="shop-guide-card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
                  <?php if ($terms = get_the_terms(get_the_ID(), 'floor')) {
                    foreach ($terms as $term) {
                      echo ('<p class="card__label">');
                      echo esc_html($term->name);
                      echo ('</p>');
                    }
                  } ?>
                  <?php $custom_field = get_field('業種');
                  if ($custom_field) { ?>
                    <p class="shop-guide-card__industry">
                      <?php echo $custom_field; ?>
                    </p>
                  <?php } ?>
                </div>

                <div class="single-store-info__payment">
                  <?php if (is_object_in_term($post->ID, 'payment', 'majica')): ?>
                    <div class="single-store-info__majica">
                      <picture>
                        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/majica.webp'); ?>" type="image/webp">
                        <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/majica.png'); ?>" alt="majicaのアイコン" loading="lazy">
                      </picture>
                    </div>
                  <?php endif; ?>
                  <?php if (is_object_in_term($post->ID, 'payment', 'ucs')): ?>
                    <div class="single-store-info__ucs">
                      <picture>
                        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/ucs.webp'); ?>" type="image/webp">
                        <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/ucs.png'); ?>" alt="ucsのアイコン" loading="lazy">
                      </picture>
                    </div>
                  <?php endif; ?>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <div class="majicaUcs-content__not">
          <p class="shop-guide-card__not-text not-text">現在、majica/UCSカード利⽤可能店舗はございません。</p>
        </div>
      <?php endif; ?>

      <div class="majicaUcs-content__footer">
        <a href="https://www.ucscard.co.jp/campaign/PCMS_H0012280.html" class="majicaUcs-content__banner" target="_blank" rel="noopener">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/majica-ucs/majica-ucs-banner.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/majica-ucs/majica-ucs-banner.png'); ?>" alt="majica/UCSカードのキャンペーンバナー" loading="lazy">
          </picture>
        </a>
        <p class="majicaUcs-content__note">※企画によって対象店舗は異なります。</p>
        <div class="majicaUcs-content__button">
          <a href="https://www.ucscard.co.jp/u_point/majica/index.html" class="majicaUcs-content__button-btn topButton__btn" target="_blank" rel="noopener">majica/UCSカードの詳細はこちら</a>
        </div>
      </div>
    </div>
  </div>

  <!-- sns -->
  <section class="sns js-fadeIn">
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