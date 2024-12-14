<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">

  <div class="news-content">
    <div class="news-content__inner inner">
      <?php while (have_posts()) : the_post(); ?>
        <article>
          <?php
          // 現在の shop-news の投稿データを取得
          $current_post_id = get_the_ID();
          $current_slug = get_post_field('post_name', $current_post_id);

          // shop-guide から同じスラッグを持つ投稿を取得
          $related_args = array(
            'post_type' => 'shop-guide',
            'name' => $current_slug,
            'posts_per_page' => 1,
          );
          $related_query = new WP_Query($related_args);

          if ($related_query->have_posts()) :
            $related_query->the_post(); // shop-guide のデータをセット
          ?>
            <div class="related-shop-guide">
              <?php if (has_post_thumbnail()) : ?>
                <div class="shop-news-card__image"><?php the_post_thumbnail('full'); ?></div>
              <?php else : ?>
                <div class="shop-news-card__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="" loading="lazy">
                  </picture>
                </div>
              <?php endif; ?>
              <p class="shop-guide-title"><?php the_title(); ?></p>
              <p class="shop-news__date"><?php the_time('Y.m.d'); ?></p>
            </div>
          <?php
            wp_reset_postdata(); // shop-guide のループをリセット
          else :
            echo '<p>No related shop-guide found.</p>';
          endif;
          ?>

          <!-- shop-news のタイトルと日付 -->
          <p class="shop-news__title"><?php the_title(); ?></p>
          <p class="shop-news__date"><?php the_time('Y.m.d'); ?></p>

          <!-- shop-news のコンテンツ（カスタムフィールドなど） -->
          <?php $custom_field = get_field('description'); ?>
          <?php if ($custom_field) : ?>
            <p class="shop-news-card__content">
              <?php echo $custom_field; ?>
            </p>
          <?php endif; ?>
        </article>
      <?php endwhile; ?>
      <!-- single-pagination -->
      <?php get_template_part('tmp/single-news-pagination'); ?>
      <!-- single-pagination -->
    </div>
  </div>
  <?php wp_reset_postdata(); ?>

</main>

<?php get_footer(); ?>



<div class="news-content">
  <div class="news-content__inner inner">
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h2 class="news-card__date"><?php the_time('Y.m.d') ?></h2>
        <p class="news-card__title"><?php the_title(); ?></p>
        <div class="news-card__content"><?php the_content(); ?></div>
      </article>
    <?php endwhile; ?>
    <!-- single-pagination -->
    <?php get_template_part('tmp/single-news-pagination'); ?>
    <!-- single-pagination -->
  </div>
</div>
<?php wp_reset_postdata(); ?>