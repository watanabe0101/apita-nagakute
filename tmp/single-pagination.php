<?php if (!defined('ABSPATH')) exit; ?>

<div class="single-pagination">
  <?php
  $next_post = get_next_post();
  if (!empty($next_post)) { ?>
    <div class="single-pagination__next">
      <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="custom-pagination__link custom-pagination__next-link">次の記事へ</a>
    </div>
  <?php } ?>

  <?php $slug = get_post_type_object(get_post_type())->name; ?>
  <div class="single-pagination__back">
    <a href="<?php echo home_url(); ?>/<?php echo $slug; ?>/" class="custom-pagination__link">一覧へ戻る</a>
  </div>

  <?php
  $previous_post = get_previous_post();
  if (!empty($previous_post)) { ?>
    <div class="single-pagination__prev">
      <a href="<?php echo get_permalink($previous_post->ID); ?>" class="custom-pagination__link custom-pagination__prev-link">前の記事へ</a>
    </div>
  <?php } ?>
</div>