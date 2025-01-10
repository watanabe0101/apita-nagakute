<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="singleEvent-header page-header">
    <div class="inner">
      <h1 class="page-header__title page-header__title">
        <span class="page-header__eng singleEvent-header__eng">Event・<span>Campaign</span></span>
        <span class="page-header__jp">イベント・キャンペーン情報</span>
      </h1>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- detail -->
  <div class="singleEvent-detail">
    <div class="singleEvent-detail__inner inner">

      <?php while (have_posts()) : the_post(); ?>
        <article>

          <div class="singleEvent-detail__header">
            <?php if ($terms = get_the_terms(get_the_ID(), 'genre')) {
              foreach ($terms as $term) {
                echo ('<p class="singleEvent-detail__genre">');
                echo esc_html($term->name);
                echo ('</p>');
              }
            } ?>
            <h2 class="singleEvent-detail__title"><?php the_title(); ?></h2>

            <!-- slider -->
            <div id="singleEvent-carousel" class="splide" aria-label="メインのスライダー">
              <div class="splide__track">
                <ul class="splide__list">
                  <li class="splide__slide">
                    <?php if (has_post_thumbnail()): ?>
                      <div class="singleEvent-detail__image"><?php the_post_thumbnail('full', array('alt' => get_the_title() . 'のサムネイル')); ?></div>
                    <?php elseif (!has_post_thumbnail()): ?>
                      <div class="singleEvent-detail__image singleEvent-detail__no-image">
                        <picture>
                          <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                          <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                        </picture>
                      </div>
                    <?php endif; ?>


                  </li>
                  <?php if (get_field('イベント画像1')): ?>
                    <li class="splide__slide">
                      <div class="singleEvent-detail__image">
                        <img src="<?php the_field('イベント画像1'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('イベント画像2')): ?>
                    <li class="splide__slide">
                      <div class="singleEvent-detail__image">
                        <img src="<?php the_field('イベント画像2'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('イベント画像3')): ?>
                    <li class="splide__slide">
                      <div class="singleEvent-detail__image">
                        <img src="<?php the_field('イベント画像3'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_field('イベント画像4')): ?>
                    <li class="splide__slide">
                      <div class="singleEvent-detail__image">
                        <img src="<?php the_field('イベント画像4'); ?>" alt="<? the_title() ?>のイメージ画像" loading="lazy">
                      </div>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
            <!-- end-slider -->

            <p class="singleEvent-detail__update-date">
              更新日：<?php the_modified_time('m/d'); ?>
            </p>
            <div class="singleEvent-detail__description"><?php the_content(); ?></div>
          </div>

          <table class="infoTable">
            <tbody class="infoTable__tbody">
              <tr class=" infoTable__row">
                <th class="infoTable__header">開催日</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('begins');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">開催時間</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('開催時間');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">開催場所</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('開催場所');
                  if ($custom_field) { ?>
                    <div class="singleEvent-detail__place">
                      <p class="infoTable__text singleEvent-detail-infoTable__text"><?php echo $custom_field; ?></p>
                      <?php
                      // フィールド名yearを取得
                      $place = get_field('開催場所リンク');
                      // Selectフィールドの値を取得
                      $placeValue = $place;
                      // Selectフィールドのラベルを取得
                      $placeLabel = $place;
                      ?>
                      <?php if ($placeValue === 'B1'): ?>
                        <a href="<?php echo esc_url(home_url('/floor/#b1')); ?>" class="infoTable__link">フロアガイドを見る</a>
                      <?php elseif ($placeValue === '1F'): ?>
                        <a href="<?php echo esc_url(home_url('/floor/#first')); ?>" class="infoTable__link">フロアガイドを見る</a>
                      <?php elseif ($placeValue === '2F'): ?>
                        <a href="<?php echo esc_url(home_url('/floor/#second')); ?>" class="infoTable__link">フロアガイドを見る</a>
                      <?php endif; ?>
                    </div>
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="singleEvent-detail__footer">
            <?php $custom_field = get_field('備考');
            if ($custom_field) { ?>
              <p class="singleEvent-detail__remarks"><?php echo $custom_field; ?></p>
            <?php } ?>
            <div class="singleEvent-detail__links">
              <?php $custom_field = get_field('詳しくはこちら');
              if ($custom_field) { ?>
                <a href="<?php the_field('詳しくはこちら'); ?>" class="singleEvent-detail__link">詳しくはこちら</a>
              <?php } ?>

              <?php $custom_field = get_field('公式サイトをチェック');
              if ($custom_field) { ?>
                <a href="<?php the_field('公式サイトをチェック'); ?>" class="singleEvent-detail__link">公式サイトをチェック</a>
              <?php } ?>
            </div>
          </div>

          <div class="singleEvent-detail__sns">
            <p class="singleEvent-detail__sns-text">このページをシェアする</p>
            <?php get_template_part('tmp/sns-share'); ?>
          </div>

          <ul class="genre-conditions__list">
            <?php
            $cat = get_queried_object();
            $cat_name = $cat->name;
            $genre_terms = get_terms('event_type', array('hide_empty' => false, 'orderby' => 'id', 'parent' => 0));
            foreach ($genre_terms as $genre_term) : ?>
              <li class="genre-conditions__item <?php if ($cat_name == esc_html($genre_term->name)) {
                                                  echo "is-active";
                                                } ?>">
                <a href="<?php echo esc_url(get_term_link($genre_term, 'event_type')); ?>" class="genre-conditions__link"><?php echo esc_html($genre_term->name); ?></a>
              </li>
            <?php endforeach; ?>
          </ul>

        </article>
      <?php endwhile; ?>


    </div>
  </div>

  <section class="singleEvent-other js-fadeIn">
    <div class="singleEvent-other__inner inner">
      <h2 class="event__title title">
        <span class="event__eng title__eng">Event・<span>Campaign</span></span>
        <span class="event__jp title__jp">その他のイベント・キャンペーン情報</span>
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
        <ul class="event-card">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="event-card__item">
              <?php keika_time(7); ?>
              <a href="<?php the_permalink(); ?>" class="event-card__link">
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
              </a>
              <div class="event-card__header">
                <?php if ($terms = get_the_terms(get_the_ID(), 'genre')) {
                  foreach ($terms as $term) {
                    // リンクを追加
                    echo ('<a href="' . esc_url(get_term_link($term)) . '" class="event-card__label">');
                    echo esc_html($term->name);
                    echo ('</a>');
                  }
                } ?>
                <p class="event-card__period">
                  <?php $custom_field = get_field('begins');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </p>
              </div>
              <a href="<?php the_permalink(); ?>" class="event-card__title limited-text"><?php the_title(); ?></a>
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

  <?php
  // フィールド名yearを取得
  $place = get_field('開催場所リンク');
  // Selectフィールドの値を取得
  $placeValue = $place;
  // Selectフィールドのラベルを取得
  $placeLabel = $place;
  ?>
  <?php if ($placeValue === 'B1'): ?>
    <a href="<?php echo esc_url(home_url('/floor/#b1')); ?>" class="infoTable__link">フロアガイドを見る</a>
  <?php elseif ($placeValue === '1F'): ?>
    <a href="<?php echo esc_url(home_url('/floor/#first')); ?>" class="infoTable__link">フロアガイドを見る</a>
  <?php elseif ($placeValue === '2F'): ?>
    <a href="<?php echo esc_url(home_url('/floor/#second')); ?>" class="infoTable__link">フロアガイドを見る</a>
  <?php endif; ?>

</main>

<?php get_footer(); ?>