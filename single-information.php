<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="singleShopGuide-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">information</p>
        <h1 class="page-header__jp">施設からのお知らせ</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- singleInformation-content -->
  <div class="singleInformation-content">
    <div class="singleInformation-content__inner inner">
      <?php if (have_posts()): while (have_posts()): the_post() ?>

          <div class="singleInformation-content__header">
            <p class="singleInformation-content__title"><?php the_title(); ?></p>
            <p class="singleInformation-content__update">更新日：<?php the_modified_time('m/d'); ?></p>
          </div>

          <div class="singleInformation-content__main">
            <div class="singleInformation-content__text"><?php the_content(); ?></div>
            <?php if (has_post_thumbnail()): ?>
              <div class="singleInformation-content__image"><?php the_post_thumbnail('full', array('alt' => get_the_title() . 'のサムネイル')); ?></div>
            <?php elseif (!has_post_thumbnail()): ?>
              <div class="singleInformation-content__image">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
                </picture>
              </div>
            <?php endif; ?>
          </div>
          <?php $custom_field = get_field('画像下のテキスト');
          if ($custom_field) { ?>
            <p class="singleInformation-content__remarks"><?php echo $custom_field; ?></p>
          <?php } ?>

          <div class="singleInformation-content__footer">
            <a href="<?php the_field('詳しくはこちらurl'); ?>" class="singleInformation-content__link">詳しくはこちら</a>
            <a href="<?php the_field('公式サイトをチェックurl'); ?>" class="singleInformation-content__link">公式サイトをチェック</a>
          </div>

          <div class="singleInformation-content__button-wrapper">
            <a href="<?php echo esc_url(home_url('/information/')); ?>" class="topButton__btn">お知らせ一覧</a>
          </div>

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