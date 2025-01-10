<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <div class="recruit-header">
    <div class="recruit-header__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri('/assets/images/recruit/recruit-fv.webp'); ?>" type="image/webp">
        <img src="<?php echo get_theme_file_uri('/assets/images/recruit/recruit-fv.jpg'); ?>" alt="" loading="lazy">
      </picture>
    </div>
    <div class="inner">
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </div>

  <!-- recruit-menu -->
  <div class="recruit-menu">
    <div class="recruit-menu__inner inner">
      <ul class="recruit-menu__list">
        <li class="recruit-menu__item">
          <a href="#employment-type" class="recruit-menu__link"><span class="recruit-menu__arrow arrow"></span>雇用形態で探す</a>
        </li>
        <li class="recruit-menu__item">
          <a href="#recruit-category" class="recruit-menu__link"><span class="recruit-menu__arrow arrow"></span>カテゴリで探す</a>
        </li>
        <li class="recruit-menu__item">
          <a href="#special-conditions" class="recruit-menu__link"><span class="recruit-menu__arrow arrow"></span>こだわり条件で探す</a>
        </li>
        <li class="recruit-menu__item">
          <a href="<?php echo esc_url(home_url('/recruitment_status/currently-recruiting/')); ?>" class="recruit-menu__link"><span class="recruit-menu__arrow arrow"></span>募集中の求人情報</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- 雇用形態で探す -->
  <section id="employment-type" class="recruit-employment-type">
    <div class="recruit-employment-type__inner inner">
      <h2 class="recruit-employment-type__title page-title">雇用形態で探す</h2>
      <ul class="genre-nav__list">
        <?php
        $cat = get_queried_object();
        $cat_name = $cat->name;
        $genre_terms = get_terms('employment_type', array('hide_empty' => false, 'orderby' => 'id', 'parent' => 0));
        foreach ($genre_terms as $genre_term) : ?>
          <li class="genre-nav__item <?php if ($cat_name == esc_html($genre_term->name)) {
                                        echo "is-active";
                                      } ?>">
            <a href="<?php echo esc_url(get_term_link($genre_term, 'employment_type')); ?>" class="genre-nav__link"><?php echo esc_html($genre_term->name); ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- カテゴリで探す -->
  <section id="recruit-category" class="recruit-category">
    <div class="recruit-category__inner inner">
      <h2 class="recruit-category__title page-title">カテゴリで探す</h2>
      <ul class="genre-nav__list">
        <?php
        $cat = get_queried_object();
        $cat_name = $cat->name;
        $genre_terms = get_terms('recruit_shop-genre', array('hide_empty' => false, 'orderby' => 'id', 'parent' => 0));
        foreach ($genre_terms as $genre_term) : ?>
          <li class="genre-nav__item <?php if ($cat_name == esc_html($genre_term->name)) {
                                        echo "is-active";
                                      } ?>">
            <a href="<?php echo esc_url(get_term_link($genre_term, 'recruit_shop-genre')); ?>" class="genre-nav__link"><?php echo esc_html($genre_term->name); ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>


  <!-- こだわり条件で探す -->
  <section id="special-conditions" class="recruit-special-conditions js-fadeIn">
    <div class="recruit-special-conditions__inner inner">
      <h2 class="recruit-special-conditions__title page-title">こだわり条件で探す</h2>
      <ul class="genre-conditions__list">
        <?php
        $cat = get_queried_object();
        $cat_name = $cat->name;
        $genre_terms = get_terms('special_conditions', array('hide_empty' => false, 'orderby' => 'id', 'parent' => 0));
        foreach ($genre_terms as $genre_term) : ?>
          <li class="genre-conditions__item <?php if ($cat_name == esc_html($genre_term->name)) {
                                              echo "is-active";
                                            } ?>">
            <a href="<?php echo esc_url(get_term_link($genre_term, 'special_conditions')); ?>" class="genre-conditions__link"><?php echo esc_html($genre_term->name); ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- recruit-benefit -->
  <section class="recruit-benefit js-fadeIn">
    <div class="recruit-benefit__inner inner">
      <h2 class="recruit-benefit__title page-title">
        アピタ長久手専門店街で<br>働くメリット
      </h2>
    </div>

    <div class="recruit-benefit__content">

      <div id="recruit-carousel" class="splide" aria-label="スライダー">
        <div class="splide__track">
          <ul class="recruit-benefit__card splide__list">
            <li class="recruit-benefit__item splide__slide">
              <div class="recruit-benefit__card-header">
                <span class="recruit-benefit__caption">お仕事ついでに</span>
                <span class="recruit-benefit__caption">お買い物ができる</span>
              </div>
              <div class="recruit-benefit__card-content">
                <div class="recruit-benefit__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/recruit/benefit-img1.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/recruit/benefit-img1.jpg'); ?>" alt="買い物を楽しむ主婦の様子" loading="lazy">
                  </picture>
                </div>
                <p class="recruit-benefit__description">
                  働く主婦に嬉しい！お仕事終わりににお買い物ができて従業員だけの割引でさらにお得に！
                </p>
              </div>
            </li>
            <li class="recruit-benefit__item splide__slide">
              <div class="recruit-benefit__card-header">
                <span class="recruit-benefit__caption">雨の日も安心！</span>
                <span class="recruit-benefit__caption">駅直結＆車通勤OK</span>
              </div>
              <div class="recruit-benefit__card-content">
                <div class="recruit-benefit__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/recruit/benefit-img2.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/recruit/benefit-img2.jpg'); ?>" alt="駅の画像" loading="lazy">
                  </picture>
                </div>
                <p class="recruit-benefit__description">
                  駅直結で雨の日も濡れる心配なし。車通勤も可能で、ライフスタイルに合わせて通勤可能！
                </p>
              </div>
            </li>
            <li class="recruit-benefit__item splide__slide">
              <div class="recruit-benefit__card-header">
                <span class="recruit-benefit__caption">自分らしく柔軟な</span>
                <span class="recruit-benefit__caption">働き方ができる！</span>
              </div>
              <div class="recruit-benefit__card-content">
                <div class="recruit-benefit__image">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('/assets/images/recruit/benefit-img3.webp'); ?>" type="image/webp">
                    <img src="<?php echo get_theme_file_uri('/assets/images/recruit/benefit-img3.jpg'); ?>" alt="笑顔でお客さんに商品を渡す女性の従業員" loading="lazy">
                  </picture>
                </div>
                <p class="recruit-benefit__description">
                  平日のみ・WワークOKなど、こだわり条件が豊富！服装や髪型も自由で自分らしく働けます。
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <div class="recruit-benefit__inner inner">
      <p class="recruit-benefit__text">※条件は求人によって異なります。</p>
    </div>
  </section>

  <!-- job-listing -->
  <section class="recruit-job-listing js-fadeIn">
    <div class="recruit-job-listing__inner inner">
      <h2 class="recruit-job-listing__title page-title">募集中の求人情報</h2>
      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'posts_per_page' => 4,
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

              <a href="<?php the_permalink(); ?>" class="recruit-card__link">
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
                        echo ('<p class="recruit-card__special-conditions">');
                        echo esc_html($term->name);
                        echo ('</p>');
                      }
                    } ?>
                  </div>

                </div>

                <?php if ($terms = get_the_terms(get_the_ID(), 'recruit_shop-genre')) {
                  foreach ($terms as $term) {
                    echo ('<p class="recruit-card__recruit-shop-genre">');
                    echo esc_html($term->name);
                    echo ('</p>');
                  }
                } ?>

                <?php
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
      <?php else : ?>
        <p class="recruit-card__not-text not-text">
          現在募集中の求人はありません
        </p>
      <?php endif; ?>

      <?php if ($the_query->have_posts()) : ?>
        <div class="recruit-job-listing__button-wrapper">
          <a class="more" href="<?php echo esc_url(home_url('/recruitment_status/currently-recruiting/')); ?>">more</a>
        </div>
      <?php endif; ?>
    </div>
  </section>



  <!-- sns -->
  <section class="recruit-sns js-fadeIn">
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