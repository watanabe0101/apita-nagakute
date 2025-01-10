<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <section class="recruitment-header page-header">
    <div class="inner">
      <h1 class="page-header__title">
        <span class="page-header__eng">Recruit</span>
        <span class="page-header__jp">求人情報</span>
      </h1>
      <div class="breadcrumb">
        <ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
          <li class="breadcrumb__item breadcrumb__home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?php echo esc_url(home_url()); ?>" class="breadcrumb__link">
              <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
            <span class="breadcrumb__arrow" aria-hidden="true"></span>
          </li>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
            <span class="breadcrumb__arrow" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name">募集中の仕事</span>
            <meta itemprop="position" content="3">
            <span class="breadcrumb__arrow" aria-hidden="true"></span>
          </li>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php single_post_title(); ?></span>
            <meta itemprop="position" content="4">
          </li>
        </ol>
      </div>
    </div>
  </section>

  <!-- singleRecruit-job-listing -->
  <div class="singleRecruit-job-listing">
    <div class="singleRecruit-job-listing__inner inner">
      <div class="singleRecruit-job-listing__header">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php $custom_field = get_field('募集職種');
            if ($custom_field) { ?>
              <p class="singleRecruit-job-listing__occupation">
                <?php echo $custom_field; ?>
              </p>
            <?php } ?>
            <div class="singleRecruit-job-listing__intro"><?php the_content(); ?></div>

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

                  <p class="singleRecruit-job-listing__shop-name"><? the_title(); ?></p>
                  <?php if (get_field('ロゴ画像')): ?>
                    <div class="singleRecruit-store-info__logo single-store-info__logo">
                      <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像">
                    </div>
                  <?php else: ?>
                    <div class="singleRecruit-store-info__logo single-store-info__logo">
                      <picture>
                        <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                        <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像">
                      </picture>
                    </div>
                  <?php endif; ?>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            <?php } ?>

        <?php endwhile;
        endif; ?>
      </div>

      <div class="singleRecruit-job-listing__details">
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <?php rewind_posts(); ?>
            <?php while (have_posts()) : the_post(); ?>

              <!-- ここに投稿の情報 -->
              <tr class=" infoTable__row">
                <th class="infoTable__header">募集職種</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('募集職種');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">雇用形態</th>
                <td class="infoTable__cell">
                  <?php if ($terms = get_the_terms(get_the_ID(), 'employment_type')) {
                    foreach ($terms as $term) {
                      echo ('<p>');
                      echo esc_html($term->name);
                      echo ('</p>');
                    }
                  } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">仕事内容</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('仕事内容');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">給与</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('給与');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">時間・勤務日</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('募集職種');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">休日・休暇</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('休日・休暇');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">待遇</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('待遇');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">アピール<br>ポイント</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('アピールポイント');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>
              <tr class=" infoTable__row">
                <th class="infoTable__header">担当者名</th>
                <td class="infoTable__cell">
                  <?php $custom_field = get_field('担当者名');
                  if ($custom_field) { ?>
                    <?php echo $custom_field; ?>
                  <?php } ?>
                </td>
              </tr>

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

                  <?php endwhile; ?>

                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              <?php } ?>
            <?php endwhile; ?>

            <?php rewind_posts(); ?>
            <?php if (have_posts()): while (have_posts()): the_post() ?>
                <tr class=" infoTable__row">
                  <th class="infoTable__header">応募方法</th>
                  <td class="infoTable__cell">
                    <?php $custom_field = get_field('応募方法');
                    if ($custom_field) { ?>
                      <?php echo $custom_field; ?>
                    <?php } ?>
                  </td>
                </tr>
            <?php endwhile;
            endif ?>
          </tbody>
        </table>
      </div>

      <div class="singleRecruit-conditions js-fadeIn">
        <h2 class="singleRecruit-conditions__title page-title">このお仕事のこだわり条件</h2>
        <?php rewind_posts(); ?>
        <?php if (have_posts()): while (have_posts()): the_post() ?>

            <div class="genre-conditions__list">
              <?php if ($terms = get_the_terms(get_the_ID(), 'special_conditions')) {
                foreach ($terms as $term) {
                  // リンクを追加
                  echo ('<a href="' . esc_url(get_term_link($term)) . '" class="genre-conditions__link">');
                  echo esc_html($term->name);
                  echo ('</a>');
                }
              } ?>
            </div>

        <?php endwhile;
        endif ?>
      </div>
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
      <?php if (have_posts()): while (have_posts()): the_post() ?>

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
                  <div class="single-store-info__logo singleRecruit-store-info__logo">
                    <img src="<?php the_field('ロゴ画像'); ?>" alt="<? the_title() ?>のロゴ画像" loading="lazy">
                  </div>
                <?php else: ?>
                  <div class="single-store-info__logo singleRecruit-store-info__logo">
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

                <div class="button-wrapper singleShopNews-store-info__button-wrapper">
                  <a class="more" href="<?php the_permalink(); ?>">more</a>
                </div>

                <div class="topButton returnButton">
                  <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="topButton__btn returnButton__btn">もどる</a>
                </div>

              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          <?php } ?>

      <?php endwhile;
      endif ?>
    </div>
  </div>

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