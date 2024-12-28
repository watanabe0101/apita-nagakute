<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <section class="shop-guide-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Shop<span>Guide</span></p>
        <h1 class="page-header__jp">ショップガイド</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- genre-nav -->
  <div class="shop-guide-genre-nav genre-nav">
    <div class="inner">
      <ul class="genre-nav__list">
        <?php
        $cat = get_queried_object();
        $cat_name = $cat->name;
        $genre_terms = get_terms('shop-genre', array('hide_empty' => false, 'orderby' => 'id', 'parent' => 0));
        foreach ($genre_terms as $genre_term) : ?>
          <li class="genre-nav__item <?php if ($cat_name == esc_html($genre_term->name)) {
                                        echo "is-active";
                                      } ?>">
            <a href="<?php echo esc_url(get_term_link($genre_term, 'shop-genre')); ?>" class="works__genre-nav-link genre-nav__link"><?php echo esc_html($genre_term->name); ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
      <a href="<?php echo esc_url(get_post_type_archive_link('shop-guide')); ?>" class="genre-nav__all">全てのショップを表示</a>
    </div>
  </div>
  <!-- genre-nav -->

  <!-- shop-guide-content -->
  <div class="shop-guide-content">
    <div class="shop-guide-content__inner inner">
      <div class="shop-guide-content__term-title">
        <?php single_term_title(); ?>のショップを表示しています。
      </div>
      <?php
      $term_object = get_queried_object();
      $term_slug = $term_object->slug;
      $args = array(
        'post_type' => 'shop-guide',
        'posts_per_page' => -1,
        'taxonomy' => 'shop-genre',
        'term' => $term_slug
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

  <!-- sns -->
  <section class="shop-guide-sns js-fadeIn">
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