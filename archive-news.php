<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main>
  <section class="news-header">
    <div class="news-header__inner">
      <h1 class="news-header__title">
        <span class="news-header__sub-title">News</span>
        <span class="news-header__main-title">お知らせ</span>
      </h1>
    </div>
  </section>

  <div class="news-content">
    <div class="news-content__inner inner">
      <ul class="news-card">
        <?php
        $args = array(
          'posts_per_page' => 3, // 表示する投稿数
          'paged' => $paged, //ページング
          'post_type' => 'news', // 取得する投稿タイプのスラッグ
          'orderby' => 'date', //日付で並び替え
          'order' => 'DESC' // 降順 or 昇順
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="news-card__item">
              <article>
                <p class="news-card__date"><?php the_time('Y.m.d') ?></p>
                <p class="news-card__title"><?php the_title(); ?></p>
                <div class="news-card__content"><?php the_content(); ?></div>
                <?php taxonomies_label() ?>
                <?php display_urgent_label(); ?>
              </article>
            </li>
        <?php endwhile;
        endif; ?>
      </ul>
      <?php custom_paginate_links($the_query, $paged); ?>
    </div>
  </div>

  <?php
  if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
      'base'      => get_pagenum_link(1) . '%_%',
      'format'    => 'page/%#%/',
      'current'   => max(1, $paged),
      'total'     => $the_query->max_num_pages,
      'end_size'  => '2', // ページ番号リストの両端に表示するページ数
      'mid_size'  => '0', // 現在ページの左右に表示するページ番号の数
      'show_all'  => false,
      'prev_next' => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
      'prev_text' =>  '新しい記事',  // 「前へ」の文言変更
      'next_text' =>  '過去の記事',  // 「次へ」の文言変更
      'type'      => 'list' // 戻り値の指定 (plain/list)
    ));
  }
  ?>
  <?php wp_reset_postdata(); ?>
</main>


<?php get_footer(); ?>