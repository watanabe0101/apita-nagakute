<?php get_header(); ?>

<main>
  <section>
    <?php while (have_posts()) : the_post(); ?>

      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('full'); ?>
      <?php else : ?>
        <picture>
          <source srcset="<?php echo get_theme_file_uri('./assets/images/common/other/no-image.webp'); ?>" type="image/webp">
          <img src="<?php echo get_theme_file_uri('./assets/images/common/other/no-image.jpg'); ?>" alt="No-Image" loading="lazy">
        </picture>
      <?php endif; ?>

      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <p>カテゴリー：<?php the_category(" / "); ?></p>
      <p><?php the_tags(); ?></p>
    <?php endwhile; ?>
  </section>
</main>

<?php get_footer(); ?>