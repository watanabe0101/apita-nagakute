<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="singleShopGuide-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <h1 class="page-header__eng">information</h1>
        <p class="page-header__jp">施設からのお知らせ</p>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <div class="information-content">
    <div class="information-content__inner inner">
      <?php $args = array(
        'posts_per_page' => 2, // 表示する投稿数
        'paged' => $paged, //ページング
        'post_type' => 'information', // 取得する投稿タイプのスラッグ
        'orderby' => 'date', //日付で並び替え
        'order' => 'DESC' // 降順 or 昇順
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) : ?>
        <ul class="info-card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="info-card__item">
              <a href="<?php the_permalink(); ?>" class="info-card__link">
                <p class="info-card__date"><?php the_time('Y.m.d') ?></p>
                <p class="info-card__title limited-text"><?php the_title(); ?></p>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <p class="info-card__text">ただいま公開中のお知らせはございません。</p>
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
    </div>
  </div>

  <!-- sns -->
  <section class="sns singleShopGuide-sns">
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