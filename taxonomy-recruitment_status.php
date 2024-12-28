<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main recruitment-main">
  <section class="recruitment-header page-header">
    <div class="inner">
      <h1 class="page-header__title">
        <span class="page-header__eng">Recruit</span>
        <span class="page-header__jp">求人情報</span>
      </h1>
      <?php breadcrumb_recruitment_status('breadcrumb'); ?>
    </div>
  </section>

  <!-- job-listing -->
  <section class="recruit-job-listing">
    <div class="recruit-job-listing__inner inner">
      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
      <?php $args = array(
        'posts_per_page' => 2,
        'paged' => $paged,
        'post_type' => 'recruit',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
          array(
            'taxonomy' => 'recruitment_status', // タクソノミー（スラッグ）
            'field' => 'slug', // スラッグをキーにして投稿を取得する旨の指定
            'terms' => 'currently-recruiting', // ターム（スラッグ）
            'operator' => 'IN'
          ),
        )
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) : ?>
        <ul class="recruit-card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="recruit-card__item">

              <div class="recruit-card__content">
                <?php if ($terms = get_the_terms(get_the_ID(), 'employment_type')) {
                  foreach ($terms as $term) {
                    echo ('<p class="recruit-card__employment-type">');
                    echo esc_html($term->name);
                    echo ('</p>');
                  }
                } ?>
                <?php $custom_field = get_field('募集職種');
                if ($custom_field) { ?>
                  <p class="recruit-card__occupation">
                    <?php echo $custom_field; ?>
                  </p>
                <?php } ?>

                <div class="recruit-card__footer">
                  <?php if ($terms = get_the_terms(get_the_ID(), 'special_conditions')) {
                    foreach ($terms as $term) {
                      // リンクを追加
                      echo ('<a href="' . esc_url(get_term_link($term)) . '" class="recruit-card__special-conditions">');
                      echo esc_html($term->name);
                      echo ('</a>');
                    }
                  } ?>
                </div>

              </div>

              <a href="<?php the_permalink(); ?>" class="recruit-card__link">


                <?php if ($terms = get_the_terms(get_the_ID(), 'recruit_shop-genre')) {
                  foreach ($terms as $term) {
                    echo ('<p ');
                    echo 'class="recruit-card__recruit-shop-genre card__label-' . esc_attr($term->slug) . '">';
                    echo esc_html($term->name);
                    echo ('</p>');
                  }
                } ?>

                <?php
                // 現在のスラッグを取得
                $current_slug = get_post_field('post_name', get_the_ID());

                // shop-guideからスラッグが一致する投稿を取得
                $related_args = array(
                  'post_type' => 'shop-guide',
                  'name' => $current_slug,
                  'posts_per_page' => 1,
                );
                $related_query = new WP_Query($related_args);
                ?>

                <?php if ($related_query->have_posts()) : ?>
                  <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

                    <?php if (get_field('ロゴ画像')): ?>
                      <div class="recruit-card__image">
                        <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
                      </div>
                    <?php else: ?>
                      <div class="recruit-card__image recruit-card__no-image">
                        <picture>
                          <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                          <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                        </picture>
                      </div>
                    <?php endif; ?>

                    <p class="recruit-card__title"><?php the_title(); ?></p>

                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </a>
            </li>
          <?php endwhile; ?>

          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else : ?>
        <p class="recruit-card__not-text not-text">
          現在募集中の求人はありません
        </p>
      <?php endif; ?>

      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      echo '<div class="pagination">';
      if ($the_query->max_num_pages > 1) {
        $pagination_links = paginate_links(array(
          'base'      => get_pagenum_link(1) . '%_%',
          'format'    => 'page/%#%/',
          'current'   => max(1, $paged),
          'total'     => $the_query->max_num_pages,
          'end_size'  => '1',
          'mid_size'  => '2',
          'show_all'  => false,
          'prev_next' => false,
          'type'      => 'array',
        ));

        if (is_array($pagination_links)) {
          echo '<ul class="pagination__list">';
          foreach ($pagination_links as $link) {
            // dotsの場合
            if (strpos($link, 'page-numbers dots') !== false) {
              echo '<li class="pagination__item"><span class="page-numbers dots">・・・</span></li>';
              continue;
            }

            if (strpos($link, 'current') !== false) {
              // 現在のページの場合
              echo '<li class="pagination__item">';
              // DOMDocumentを使用してHTMLを解析
              libxml_use_internal_errors(true); // エラーを表示
              $dom = new DOMDocument();
              @$dom->loadHTML(mb_convert_encoding($link, 'HTML-ENTITIES', 'UTF-8'));

              if ($dom !== false) {
                $span = $dom->getElementsByTagName('span')->item(0);

                if ($span !== null) {
                  // 既存のクラスを取得
                  $existingClasses = $span->getAttribute('class');
                  // pagination__currentを追加
                  $newClasses = 'pagination__current ' . $existingClasses;

                  // 新しいHTMLを作成
                  $newSpan = sprintf(
                    '<span class="%s" aria-current="page">%s</span>',
                    $newClasses,
                    $span->nodeValue
                  );
                  echo $newSpan;
                } else {
                  // <span>タグがない場合はそのままリンクを表示
                  echo $link;
                }
              }
              echo '</li>';
            } else {
              // 通常のページリンクの場合
              echo '<li class="pagination__item">';
              echo preg_replace('/<a class="([^"]*)"/', '<a class="pagination__link $1"', $link);
              echo '</li>';
            }
          }
          echo '</ul>';
        }
      }
      echo '</div>';
      ?>

    </div>
  </section>

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