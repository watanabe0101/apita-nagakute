<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: TOP
*/
get_header(); ?>

<main class="main">
  <!-- fv -->
  <div class="fv">
    <div class="fv__inner">

      <div id="main-carousel" class="splide" aria-label="メインのスライダー">
        <div class="splide__track">
          <ul class="splide__list">
            <?php
            $args = array(
              'posts_per_page' => -1, // 表示する投稿数
              'paged' => $paged, //ページング
              'post_type' => 'fv', // 取得する投稿タイプのスラッグ
              'orderby' => 'date', //日付で並び替え
              'order' => 'DESC' // 降順 or 昇順
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="splide__slide">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full', array('alt' => 'ファーストビューの画像')); ?>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                    </picture>
                  <?php endif; ?>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <div id="thumbnail-carousel" class="splide" aria-label="サムネイルスライダー。各サムネイルをクリックすると、メインのスライダーが切り替わります">

        <div class="splide__arrows">
          <!-- ↓ないとデフォルトの矢印 -->
          <button class="splide__arrow splide__arrow--prev"></button>
          <button class="splide__arrow splide__arrow--next"></button>
          <!-- ↑ないとデフォルトの矢印 -->
        </div>

        <div class="splide__track splide-sub">
          <ul class="splide__list splide-sub__list">
            <?php
            $args = array(
              'posts_per_page' => -1, // 表示する投稿数
              'paged' => $paged, //ページング
              'post_type' => 'fv', // 取得する投稿タイプのスラッグ
              'orderby' => 'date', //日付で並び替え
              'order' => 'DESC' // 降順 or 昇順
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="splide__slide splide-sub__item">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="" loading="lazy">
                    </picture>
                  <?php endif; ?>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- menu -->
  <div class="menu">
    <div class="menu__inner inner">
      <ul class="menu__list">
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-restaurants.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-restaurants.png'); ?>" alt="レストランアイコン">
              </picture>
            </div>
            <div class="menu__text">GOURMET</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/floor/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-floor-guide.png'); ?>" alt="フロアガイドアイコン">
              </picture>
            </div>
            <div class="menu__text">FLOOR GUIDE</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/shop-guide/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-guide.png'); ?>" alt="ショップガイドアイコン">
              </picture>
            </div>
            <div class="menu__text">SHOP GUIDE</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-events.png'); ?>" alt="イベントアイコン">
              </picture>
            </div>
            <div class="menu__text">EVENTS</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-shop-news.png'); ?>" alt="ショップニュースアイコン">
              </picture>
            </div>
            <div class="menu__text">SHOP NEWS</div>
          </a>
        </li>
        <li class="menu__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="menu__link">
            <div class="menu__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/icon/icon-about.png'); ?>" alt="アバウトアイコン">
              </picture>
            </div>
            <div class="menu__text">ABOUT</div>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- banner -->
  <div class="banner">
    <div class="banner__inner inner">

      <div id="main-banner" class="splide" aria-label="バナー">
        <div class="splide__arrows">
          <!-- ↓ないとデフォルトの矢印 -->
          <button class="splide__arrow splide__arrow--prev"></button>
          <button class="splide__arrow splide__arrow--next"></button>
          <!-- ↑ないとデフォルトの矢印 -->
        </div>
        <div class="splide__track">
          <ul class="splide__list">
            <?php
            $args = array(
              'posts_per_page' => -1, // 表示する投稿数
              'paged' => $paged, //ページング
              'post_type' => 'banner', // 取得する投稿タイプのスラッグ
              'orderby' => 'date', //日付で並び替え
              'order' => 'DESC' // 降順 or 昇順
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="splide__slide">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full', array('alt' => get_the_title() . 'のサムネイル')); ?>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                      <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                    </picture>
                  <?php endif; ?>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- Special-recommend -->
  <?php
  $args = array(
    'posts_per_page' => -1, // 表示する投稿数
    'paged' => $paged, //ページング
    'post_type' => 'movie', // 取得する投稿タイプのスラッグ
    'orderby' => 'date', //日付で並び替え
    'order' => 'DESC' // 降順 or 昇順
  );
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : ?>
    <section class="special-recommend">
      <div class="special-recommend__inner inner">
        <h2 class="special-recommend__title title">
          <span class="special-recommend__eng title__eng">Special<span>Recommend</span></span>
          <span class="special-recommend__jp title__jp">おすすめ情報動画</span>
        </h2>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php if (get_field('youtube_url')) { ?>
            <div class="special-recommend__movie">
              <?php echo $embed_code = wp_oembed_get(get_field('youtube_url')); ?>
            </div>
          <?php } ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- information -->
  <section class="info">
    <div class="info__inner inner">
      <h2 class="info__title title">
        <span class="info__eng title__eng">Information</span>
        <span class="info__jp title__jp">施設からのお知らせ</span>
      </h2>
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
              <article>
                <a href="<?php the_permalink(); ?>" class="info-card__link">
                  <p class="info-card__date"><?php the_time('Y.m.d') ?></p>
                  <p class="info-card__title limited-text"><?php the_title(); ?></p>
                </a>
              </article>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <p class="info-card__text">ただいま公開中のお知らせはございません。</p>
      <?php endif; ?>
      <?php if ($the_query->have_posts()) : ?>
        <div class="info__button-wrapper">
          <a class="more" href="<?php echo esc_url(home_url('/information/')); ?>">more</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- event -->
  <section class="event">
    <div class="event__inner inner">
      <h2 class="event__title title">
        <span class="event__eng title__eng">Event・<span>Campaign</span></span>
        <span class="event__jp title__jp">イベント・キャンペーン情報</span>
      </h2>
      <?php $args = array(
        'posts_per_page' => 4,
        'paged' => $paged,
        'post_type' => 'event',
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) : ?>
        <ul class="event__card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="event-card__item">
              <article>
                <a href="<?php the_permalink(); ?>" class="event-card__link">
                  <?php keika_time(7); ?>
                  <?php if (has_post_thumbnail()): ?>
                    <div class="event-card__image"><?php the_post_thumbnail('full', array('alt' => get_the_title() . 'のサムネイル')); ?></div>
                  <?php elseif (!has_post_thumbnail()): ?>
                    <div class="shop-news-card__image">
                      <picture>
                        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                        <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                      </picture>
                    </div>
                  <?php endif; ?>
                  <div class="event-card__header">
                    <?php taxonomies_label_simple() ?>
                    <p class="event-card__period">
                      <?php $custom_field = get_field('begins');
                      if ($custom_field) { ?>
                        <?php echo $custom_field; ?>
                      <?php } ?>
                      <?php $custom_field = get_field('end');
                      if ($custom_field) { ?>
                        <?php echo $custom_field; ?>
                      <?php } ?>
                    </p>
                  </div>
                  <p class="event-card__title limited-text"><?php the_title(); ?></p>
                </a>
              </article>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else: ?>
        <p class="event-card__text">
          ただいま公開中の<br>
          イベント・キャンペーン情報はございません。
        </p>
      <?php endif; ?>
      <?php if ($the_query->have_posts()) : ?>
        <div class="event__button-wrapper">
          <a class="more" href="<?php echo esc_url(home_url('/event/')); ?>">more</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- shop-news -->
  <section class="shop-news">
    <div class="shop-news__inner inner">
      <h2 class="shop-news__title title">
        <span class="shop-news__eng title__eng">Shop<span>News</span></span>
        <span class="shop-news__jp title__jp">ショップニュース</span>
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
        <ul class="shop-news__card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="shop-news-card__item">
              <article>
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
              </article>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else : ?>
        <p class="shop-news-card__text">
          ただいま公開中のショップニュースはございません。
        </p>
      <?php endif; ?>

      <?php if ($the_query->have_posts()) : ?>
        <div class="shop-news__button-wrapper">
          <a class="more" href="<?php echo esc_url(home_url('/shop-news/')); ?>">more</a>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- recommend -->
  <?php
  $args = array(
    'posts_per_page' => -1, // 表示する投稿数
    'paged' => $paged, //ページング
    'post_type' => 'recommend', // 取得する投稿タイプのスラッグ
    'orderby' => 'date', //日付で並び替え
    'order' => 'DESC' // 降順 or 昇順
  );
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : ?>
    <section class="recommend">
      <div class="recommend__inner inner">
        <h2 class="recommend__title title">
          <span class="recommend__eng title__eng">Recommend</span>
          <span class="recommend__jp title__jp">おすすめ情報</span>
        </h2>
        <ul class="recommend__list">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="recommend__item">
              <?php if ($field = get_field("サムネイル付きpdf")) {
                $attr = array(
                  'id' => 'pdf_thum_test',
                  'alt' => 'ファイルのサムネイル画像です'
                );
                echo "<a href='{$field["url"]}' class='recommend__image' target='_blank'>" .
                  wp_get_attachment_image($field["id"], "full", 0, $attr) . "</a>";
              } ?>
              <?php $custom_field = get_field('開始日');
              if ($custom_field) { ?>
                <div class="recommend__period">
                  <?php echo $custom_field; ?>
                  <?php $custom_field = get_field('終了日');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </div>
              <?php } ?>
              <p class="recommend__name"><?php the_title(); ?></p>
              <?php if ($field = get_field("サムネイル付きpdf")) {
                echo "<a href='{$field["url"]}' class='recommend__link' target='_blank'>PDF</a>";
              } ?>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      </div>
    </section>
  <?php endif; ?>

  <!-- sns -->
  <section class="sns">
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
<!-- footer -->
<?php get_footer(); ?>