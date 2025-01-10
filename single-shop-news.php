<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="singleShopNews-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Shop<span>News</span></p>
        <h1 class="page-header__jp">ショップニュース</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <div class="singleShopNews-info">
    <div class="singleShopNews-info__inner inner">

      <div class="singleShopNews-info__header">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <p class="singleShopNews-info__caption"><?php the_title(); ?></p>
            <!-- slider -->
            <div id="singleShopNews-carousel" class="splide" aria-label="メインのスライダー">
              <div class="splide__track">
                <ul class="splide__list">
                  <li class="splide__slide">
                    <?php if (has_post_thumbnail()): ?>
                      <div class="singleShopNews-info__image"><?php the_post_thumbnail('full', array('alt' => get_the_title() . 'のサムネイル')); ?></div>
                    <?php elseif (!has_post_thumbnail()): ?>
                      <div class="singleShopNews-info__image singleShopNews-info__no-image">
                        <picture>
                          <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                          <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                        </picture>
                      </div>
                    <?php endif; ?>
                  </li>
                  <?php if (get_field('スライダー2')): ?>
                    <li class="splide__slide">
                      <div class="singleShopNews-info__image">
                        <img src="<?php the_field('スライダー2'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('スライダー3')): ?>
                    <li class="splide__slide">
                      <div class="singleShopNews-info__image">
                        <img src="<?php the_field('スライダー3'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('スライダー4')): ?>
                    <li class="splide__slide">
                      <div class="singleShopNews-info__image">
                        <img src="<?php the_field('スライダー4'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('スライダー5')): ?>
                    <li class="splide__slide">
                      <div class="singleShopNews-info__image">
                        <img src="<?php the_field('スライダー5'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
            <!-- end-slider -->
            <?php
            $current_post_id = get_the_ID();

            // 現在の投稿に関連付けられているタクソノミー "shop" のタームを取得
            $terms = wp_get_post_terms($current_post_id, 'shop'); // shopはタクソノミー名

            if (!empty($terms) && !is_wp_error($terms)) {
              // 最初のタームのスラッグを取得
              $term_slugs = wp_list_pluck($terms, 'slug'); // タームのスラッグを配列で取得

              // shop-news の記事を取得
              $related_posts = new WP_Query([
                'post_type' => 'shop-guide', // 取得したい投稿タイプ
                'posts_per_page' => -1, // 全ての関連投稿を取得
                'tax_query' => [
                  [
                    'taxonomy' => 'shop', // 共通のタクソノミー
                    'field' => 'slug', // スラッグで検索
                    'terms' => $term_slugs, // 関連付けるタームのスラッグ
                  ],
                ],
              ]);

              // 関連する記事がある場合
              if ($related_posts->have_posts()) : ?>

                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                  <h2 class="singleShopNews-info__title"><?php the_title(); ?></h2>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            <?php } ?>
        <?php endwhile;
        endif; ?>
      </div>

      <?php rewind_posts(); ?>
      <?php while (have_posts()) : the_post(); ?>

        <div class="singleShopNews-info__content">
          <p class="singleShopNews-info__update-date">
            更新日：<?php the_modified_time('m/d'); ?>
          </p>
          <?php $custom_field = get_field('備考');
          if ($custom_field) { ?>
            <p class="singleShopNews-info__remarks"><?php echo $custom_field; ?></p>
          <?php } ?>
        </div>
      <?php endwhile; ?>

    </div>
  </div>

  <!-- Special Recommend -->
  <?php rewind_posts(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php
      $current_post_id = get_the_ID();

      // 現在の投稿に関連付けられているタクソノミー "shop" のタームを取得
      $terms = wp_get_post_terms($current_post_id, 'shop'); // shopはタクソノミー名

      if (!empty($terms) && !is_wp_error($terms)) {
        // 最初のタームのスラッグを取得
        $term_slugs = wp_list_pluck($terms, 'slug'); // タームのスラッグを配列で取得

        // shop-news の記事を取得
        $related_posts = new WP_Query([
          'post_type' => 'shop-guide', // 取得したい投稿タイプ
          'posts_per_page' => -1, // 全ての関連投稿を取得
          'tax_query' => [
            [
              'taxonomy' => 'shop', // 共通のタクソノミー
              'field' => 'slug', // スラッグで検索
              'terms' => $term_slugs, // 関連付けるタームのスラッグ
            ],
          ],
        ]);

        if ($related_posts->have_posts()) : ?>

          <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
            <?php if (get_field('動画埋め込み1') or get_field('動画埋め込み2') or get_field('動画埋め込み3')) { ?>
              <section class="single-specialRecommend singleShopNews-recommend js-fadeIn">
                <div class="single-specialRecommend__inner inner">
                  <h2 class="single-specialRecommend__title title">
                    <span class="single-specialRecommend__eng title__eng">Special<span>Recommend</span></span>
                    <span class="single-specialRecommend__jp title__jp">おすすめ情報動画</span>
                  </h2>
                  <div class="single-specialRecommend__movies">
                    <?php $custom_field = get_field('動画上のテキスト1');
                    if ($custom_field) { ?>
                      <p class="single-specialRecommend__text">
                        <?php echo $custom_field; ?>
                      </p>
                    <?php } ?>
                    <div class="single-specialRecommend__movie">
                      <?php
                      $embed_code = wp_oembed_get(get_field('動画埋め込み1'));
                      $embed_code = str_replace('<iframe', '<iframe loading="lazy"', $embed_code);
                      echo $embed_code;
                      ?>
                    </div>
                    <?php $custom_field = get_field('動画上のテキスト2');
                    if ($custom_field) { ?>
                      <p class="single-specialRecommend__text">
                        <?php echo $custom_field; ?>
                      </p>
                    <?php } ?>
                    <div class="single-specialRecommend__movie">
                      <?php
                      $embed_code = wp_oembed_get(get_field('動画埋め込み2'));
                      $embed_code = str_replace('<iframe', '<iframe loading="lazy"', $embed_code);
                      echo $embed_code;
                      ?>
                    </div>
                    <?php $custom_field = get_field('動画上のテキスト3');
                    if ($custom_field) { ?>
                      <p class="single-specialRecommend__text">
                        <?php echo $custom_field; ?>
                      </p>
                    <?php } ?>
                    <div class="single-specialRecommend__movie">
                      <?php
                      $embed_code = wp_oembed_get(get_field('動画埋め込み3'));
                      $embed_code = str_replace('<iframe', '<iframe loading="lazy"', $embed_code);
                      echo $embed_code;
                      ?>
                    </div>
                  </div>

                </div>
              </section>
            <?php } ?>
          <?php endwhile; ?>

          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      <?php } ?>
  <?php endwhile;
  endif; ?>

  <div class="singleShopNews-single-sns js-fadeIn">
    <div class="singleShopNews-single-sns__inner inner">
      <div class="singleShopNews-single-sns__content">
        <p class="singleShopNews-single-sns__text">このページをシェアする</p>
        <?php get_template_part('tmp/sns-share'); ?>
      </div>
    </div>
  </div>

  <div class="singleShopNews-genre-conditions js-fadeIn">
    <div class="singleShopNews-genre-conditions__inner inner">
      <?php rewind_posts(); ?>
      <?php while (have_posts()) : the_post(); ?>
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
      <?php endwhile; ?>
    </div>
  </div>

  <!-- ショップ情報 -->
  <div class="singleShopNews-store-info js-fadeIn">
    <div class="singleShopNews-store-info__inner inner">
      <h2 class="title">
        <span class="title__eng">Shop<span>Info</span></span>
        <span class="title__jp">ショップ情報</span>
      </h2>

      <?php rewind_posts(); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <!-- 関連付けられた shop-news を表示 -->
          <?php
          $current_post_id = get_the_ID();

          // 現在の投稿に関連付けられているタクソノミー "shop" のタームを取得
          $terms = wp_get_post_terms($current_post_id, 'shop'); // shopはタクソノミー名

          if (!empty($terms) && !is_wp_error($terms)) {
            // 最初のタームのスラッグを取得
            $term_slugs = wp_list_pluck($terms, 'slug'); // タームのスラッグを配列で取得

            // shop-news の記事を取得
            $related_posts = new WP_Query([
              'post_type' => 'shop-guide', // 取得したい投稿タイプ
              'posts_per_page' => -1, // 全ての関連投稿を取得
              'tax_query' => [
                [
                  'taxonomy' => 'shop', // 共通のタクソノミー
                  'field' => 'slug', // スラッグで検索
                  'terms' => $term_slugs, // 関連付けるタームのスラッグ
                ],
              ],
            ]);

            // 関連する記事がある場合
            if ($related_posts->have_posts()) : ?>

              <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>

                <?php if (get_field('ロゴ画像')): ?>
                  <div class="single-store-info__logo">
                    <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
                  </div>
                <?php else: ?>
                  <div class="single-store-info__logo singleShopNews-store-info__no-image">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                    </picture>
                  </div>
                <?php endif; ?>

                <p class="single-store-info__store-name"><?php the_title(); ?></p>

                <table class="infoTable">
                  <tbody class="infoTable__tbody">
                    <tr class=" infoTable__row">
                      <th class="infoTable__header">業種</th>
                      <td class="infoTable__cell">
                        <?php $custom_field = get_field('業種');
                        if ($custom_field) { ?>
                          <?php echo $custom_field; ?>
                        <?php } ?>
                      </td>
                    </tr>
                    <tr class=" infoTable__row">
                      <th class="infoTable__header">フロア</th>
                      <td class="infoTable__cell">
                        <?php if ($terms = get_the_terms(get_the_ID(), 'floor')) {
                          foreach ($terms as $term) {
                            echo ('<span class="card__label">');
                            echo esc_html($term->name);
                            echo ('</span>');
                          }
                        } ?>
                        <?php if ($terms = get_the_terms(get_the_ID(), 'floor')) {
                          foreach ($terms as $term) { ?>
                            <?php if ($term->slug === 'basement'): ?>
                              <a href="<?php echo esc_url(home_url('/floor/#b1')); ?>" class="infoTable__link">フロアガイドを見る</a>
                            <?php elseif ($term->slug === 'first'): ?>
                              <a href="<?php echo esc_url(home_url('/floor/#first')); ?>" class="infoTable__link">フロアガイドを見る</a>
                            <?php elseif ($term->slug === 'second'): ?>
                              <a href="<?php echo esc_url(home_url('/floor/#second')); ?>" class="infoTable__link">フロアガイドを見る</a>
                            <?php endif; ?>
                          <?php } ?>
                        <?php } ?>
                      </td>
                    </tr>
                    <tr class=" infoTable__row">
                      <th class="infoTable__header">営業時間</th>
                      <td class="infoTable__cell">
                        <?php $custom_field = get_field('営業開始時間');
                        if ($custom_field) { ?>
                          <?php echo $custom_field; ?>
                        <?php } ?>
                        <?php $custom_field = get_field('営業終了時間');
                        if ($custom_field) { ?>
                          <?php echo $custom_field; ?>
                        <?php } ?>
                      </td>
                    </tr>
                    <tr class=" infoTable__row">
                      <th class="infoTable__header">電話番号</th>
                      <td class="infoTable__cell">
                        <a href="tel:<?php
                                      $変数 = get_field('電話番号');
                                      $変数 = str_replace(array('-', 'ー', '−', '―', '‐', '(', ')', '（', '）', ' ', '　'), '', $変数);
                                      echo $変数;
                                      ?>" class="infoTable__link"><?php echo post_custom('電話番号'); ?>
                        </a>
                      </td>
                    </tr>
                    <tr class=" infoTable__row">
                      <th class="infoTable__header">URL</th>
                      <td class="infoTable__cell">
                        <a href="<?php the_field('ショップurl'); ?>" class="infoTable__link" target="_blank" rel="noopener"><?php the_field('ショップurl'); ?></a>
                      </td>
                    </tr>
                  </tbody>
                </table>

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

                <div class="info__button-wrapper singleShopNews-store-info__button-wrapper">
                  <a class="more" href="<?php the_permalink(); ?>">more</a>
                </div>

              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          <?php } ?>
      <?php endwhile;
      endif; ?>
    </div>
  </div>

  <!-- その他のショップニュース -->
  <section class="shop-news singleShopNews-other-news js-fadeIn">
    <div class="shop-news__inner inner">
      <h2 class="title">
        <span class="title__eng">Shop<span>News</span></span>
        <span class="title__jp">その他のショップニュース</span>
      </h2>
      <?php $args = array(
        'posts_per_page' => 4,
        'paged' => $paged,
        'post_type' => 'shop-news',
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) : ?>
        <ul class="shop-news-card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="shop-news-card__item">
              <a href="<?php the_permalink(); ?>" class="shop-news-card__link">
                <?php keika_time(7); ?>
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
                <p class="shop-news-card__date"><?php the_time('Y.m.d'); ?></p>
                <p class="shop-news-card__description"><?php the_title(); ?></p>

                <?php
                // 現在の shop-news に関連付けられたタームを取得
                $terms = wp_get_post_terms(get_the_ID(), 'shop');

                if (!empty($terms) && !is_wp_error($terms)) {
                  $term_slugs = wp_list_pluck($terms, 'slug'); // タームスラッグを取得

                  // shop-guide を取得
                  $related_guides = new WP_Query([
                    'post_type' => 'shop-guide',
                    'posts_per_page' => 1, // 最初の一致のみ取得
                    'tax_query' => [
                      [
                        'taxonomy' => 'shop',
                        'field' => 'slug',
                        'terms' => $term_slugs,
                      ],
                    ],
                  ]);

                  // 一致する shop-guide があればタイトルを表示
                  if ($related_guides->have_posts()) :
                    while ($related_guides->have_posts()) : $related_guides->the_post(); ?>

                      <p class="shop-news-card__title"><?php the_title(); ?></p>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif;
                }
                ?>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
        <div class="shop-news__button-wrapper">
          <a class="more" href="<?php echo esc_url(home_url('/shop-news/')); ?>">more</a>
        </div>
      <?php else : ?>
        <p class="shop-news-card__text">
          ただいま公開中のショップニュースはございません。
        </p>
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