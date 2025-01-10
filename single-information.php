<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="singleShopGuide-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Information</p>
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
          </div>

          <div class="singleInformation-content__button">
            <a href="<?php echo esc_url(home_url('/information/')); ?>" class="singleInformation-content__button-btn topButton__btn">お知らせ一覧</a>
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