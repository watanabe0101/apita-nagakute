<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <section class="shopNews-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Shop<span>News</span></p>
        <h1 class="page-header__jp">ショップニュース</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>



  <!-- job-listing -->
  <section class="shopNews-listing taxShopNews-listing">
    <div class="shopNews-listing__inner inner">
      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $term_object = get_queried_object();
      $term_slug = $term_object->slug;
      $args = array(
        'post_type' => 'shop-news',
        'posts_per_page' => 2,
        'paged' => $paged,
        'taxonomy' => 'shop-news-genre',
        'term' => $term_slug
      );
      $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()): ?>
        <p class="shopNews-listing__term-title term-title">
          <span><?php single_term_title(); ?></span>のショップニュース
        </p>
        <ul class="shop-news-card">
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <!-- 繰り返し処理する内容 -->
            <li class="shop-news-card__item">
              <a href="<?php the_permalink(); ?>" class="shop-news-card__link">
                <?php keika_time(7); ?>
                <p class="shop-news-card__date"><?php the_time('Y.m.d'); ?></p>
                <?php $custom_field = get_field('description');
                if ($custom_field) { ?>
                  <p class="shop-news-card__description">
                    <?php echo $custom_field; ?>
                  </p>
                <?php } ?>

                <?php
                // 現在のshop-newsのスラッグを取得
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

                    <?php if (has_post_thumbnail()): ?>
                      <div class="shop-news-card__image"><?php the_post_thumbnail('full', array('alt' => get_the_title() . 'のサムネイル')); ?></div>
                    <?php elseif (!has_post_thumbnail()): ?>
                      <div class="shop-news-card__image">
                        <picture>
                          <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                          <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                        </picture>
                      </div>
                    <?php endif; ?>

                    <p class="shop-news-card__title"><?php the_title(); ?></p>

                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </a>
            </li>
            <!-- 繰り返し処理する内容 -->
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <p class="shop-news-card__text">
          ただいま公開中のショップニュースはございません。
        </p>
        <div class="topButton">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="topButton__btn">トップに戻る</a>
        </div>
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

      <?php if ($the_query->have_posts()) : ?>
        <!-- category -->
        <div class="shopNews-category">
          <div class="accordion">
            <details class="accordion__details js-details">
              <summary class="accordion__summary js-summary">
                タグ一覧
              </summary>
              <div class="accordion__content js-content">
                <div class="accordion__content-inner">

                  <ul class="genre-conditions__list">
                    <?php
                    $cat = get_queried_object();
                    $cat_name = $cat->name;
                    $genre_terms = get_terms('shop-news-genre', array('hide_empty' => false, 'orderby' => 'id', 'parent' => 0));
                    foreach ($genre_terms as $genre_term) : ?>
                      <li class="genre-conditions__item <?php if ($cat_name == esc_html($genre_term->name)) {
                                                          echo "is-active";
                                                        } ?>">
                        <a href="<?php echo esc_url(get_term_link($genre_term, 'shop-news-genre')); ?>" class="genre-conditions__link"><?php echo esc_html($genre_term->name); ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>

                </div>
              </div>
            </details>
          </div>
        </div>
      <?php endif; ?>

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