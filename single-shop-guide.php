<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="singleShopGuide-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Shop<span>Info</span></p>
        <h1 class="page-header__jp">ショップ情報</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- store-info -->
  <div class="singleShopGuide-store-info">
    <div class="singleShopGuide-store-info__inner inner">

      <?php while (have_posts()) : the_post(); ?>
        <article>

          <div class="singleShopGuide-store-info__header">
            <h2 class="singleShopGuide-store-info__title"><?php the_title(); ?></h2>

            <!-- slider -->
            <div id="singleShopGuide-carousel" class="splide" aria-label="メインのスライダー">
              <div class="splide__track">
                <ul class="splide__list">
                  <li class="splide__slide">
                    <?php if (get_field('スライダー画像1')): ?>
                      <div class="singleShopGuide-store-info__image">
                        <img src="<?php the_field('スライダー画像1'); ?>" alt="<? the_title() ?>のイメージ画像">
                      </div>
                    <?php else: ?>
                      <div class="singleShopGuide-store-info__image singleShopGuide-store-info__no-image">
                        <picture>
                          <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                          <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像">
                        </picture>
                      </div>
                    <?php endif; ?>
                  </li>
                  <?php if (get_field('スライダー画像2')): ?>
                    <li class="splide__slide">
                      <div class="singleShopGuide-store-info__image">
                        <img src="<?php the_field('スライダー画像2'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('スライダー画像3')): ?>
                    <li class="splide__slide">
                      <div class="singleShopGuide-store-info__image">
                        <img src="<?php the_field('スライダー画像3'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('スライダー画像4')): ?>
                    <li class="splide__slide">
                      <div class="singleShopGuide-store-info__image">
                        <img src="<?php the_field('スライダー画像4'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('スライダー画像5')): ?>
                    <li class="splide__slide">
                      <div class="singleShopGuide-store-info__image">
                        <img src="<?php the_field('スライダー画像5'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
            <!-- end-slider -->

            <?php if (get_field('ロゴ画像')): ?>
              <div class="single-store-info__logo singleShopGuide-store-info__logo">
                <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
              </div>
            <?php else: ?>
              <div class="singleShopGuide-store-info__logo singleShopGuide-store-info__no-image">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                </picture>
              </div>
            <?php endif; ?>
            <div class="singleShopGuide-store-info__description"><?php the_content(); ?></div>
          </div>

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
                        <a href="<?php echo esc_url(home_url('/floor/#b1')); ?>" class="singleShopGuide-store-info__link">フロアガイドを見る</a>
                      <?php elseif ($term->slug === 'first'): ?>
                        <a href="<?php echo esc_url(home_url('/floor/#first')); ?>" class="singleShopGuide-store-info__link">フロアガイドを見る</a>
                      <?php elseif ($term->slug === 'second'): ?>
                        <a href="<?php echo esc_url(home_url('/floor/#second')); ?>" class="singleShopGuide-store-info__link">フロアガイドを見る</a>
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
                                ?>" class="singleShopGuide-store-info__link"><?php echo post_custom('電話番号'); ?>
                  </a>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">URL</th>
                <td class="infoTable__cell">
                  <a href="<?php the_field('ショップurl'); ?>" class="singleShopGuide-store-info__link" target="_blank" rel="noopener"><?php the_field('ショップurl'); ?></a>
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


        </article>
      <?php endwhile; ?>

    </div>
  </div>

  <!-- Special Recommend -->
  <?php rewind_posts(); ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php if (get_field('動画埋め込み1') or get_field('動画埋め込み2') or get_field('動画埋め込み3')) { ?>
      <section class="single-specialRecommend singleShopGuide-recommend js-fadeIn">
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

  <!-- Shop News -->
  <section class="singleShopGuide-news js-fadeIn">
    <div class="singleShopGuide-news__inner inner">
      <h2 class="singleShopGuide-news__title title">
        <span class="singleShopGuide-news__eng title__eng">Shop<span>News</span></span>
        <span class="singleShopGuide-news__jp title__jp">ショップニュース</span>
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
              'post_type' => 'shop-news', // 取得したい投稿タイプ
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

              <ul class="shop-news-card">
                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                  <li class="shop-news-card__item">
                    <a href="<?php the_permalink(); ?>" class="shop-news-card__link">
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
                      <?php keika_time(7); ?>
                      <p class="shop-news-card__date"><?php the_time('Y.m.d'); ?></p>
                      <?php $custom_field = get_field('description');
                      if ($custom_field) { ?>
                        <p class="shop-news-card__description">
                          <?php echo $custom_field; ?>
                        </p>
                      <?php } ?>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>

              <div class="singleShopGuide-news__button-wrapper">
                <a class="more" href="<?php echo esc_url(home_url('/shop-news/')); ?>">more</a>
              </div>

              <?php wp_reset_postdata(); ?>
            <?php else: ?>
              <p class="shop-news-card__text">ただいま公開中のショップニュースはございません。</p>
            <?php endif; ?>
          <?php } ?>
      <?php endwhile;
      endif; ?>
    </div>
  </section>

  <!-- singleShopGuide-recruit -->
  <section class="singleShopGuide-recruit js-fadeIn">
    <div class="singleShopGuide-recruit__inner inner">
      <h2 class="singleShopGuide-recruit__title title">
        <span class="singleShopGuide-recruit__eng title__eng">Recruit</span>
        <span class="singleShopGuide-recruit__jp title__jp">求人情報</span>
      </h2>
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
              'post_type' => 'recruit', // 取得したい投稿タイプ
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

              <ul class="singleShopGuide-recruit__card">
                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                  <li class="singleShopGuide-recruit-card__item">
                    <a href="<?php the_permalink(); ?>" class="singleShopGuide-recruit-card__link">

                      <div class="singleShopGuide-recruit__content">
                        <?php $custom_field = get_field('募集職種');
                        if ($custom_field) { ?>
                          <p class="singleShopGuide-recruit__occupation">
                            <?php echo $custom_field; ?>
                          </p>
                        <?php } ?>

                        <div class="singleShopGuide-recruit__details">
                          <p class="singleShopGuide-recruit__text">雇用形態</p>
                          <div class="singleShopGuide-recruit__employment">
                            <?php if ($terms = get_the_terms(get_the_ID(), 'employment_type')) {
                              foreach ($terms as $term) {
                                echo ('<p class="singleShopGuide-recruit__employment-type">');
                                echo esc_html($term->name);
                                echo ('</p>');
                              }
                            } ?>
                          </div>
                        </div>

                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>

              <?php wp_reset_postdata(); ?>
            <?php else: ?>
              <p class="singleShopGuide-recruit-card__not-text not-text">現在募集中の求人情報はございません。</p>
            <?php endif; ?>
          <?php } ?>
      <?php endwhile;
      endif; ?>
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