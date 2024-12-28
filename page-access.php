<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: access
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="access-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">Access</p>
        <h1 class="page-header__jp">交通アクセス</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- access-map -->
  <div class="access-map">
    <div class="access-map__inner inner">
      <div class="access-map__header">
        <h2 class="access-map__title page-title">アクセスマップ</h2>
      </div>
      <div class="access-map__content">
        <div class="access-map__map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.3604252273094!2d137.03568577690945!3d35.17256827275567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600365b8a52ecda5%3A0x6774bbf428669e0c!2z44CSNDgwLTExMjQg5oSb55-l55yM5oSb55-l6YOh6ZW35LmF5omL5biC5oi455Sw6LC377yZ77yQ77yR4oiS77yR!5e0!3m2!1sja!2sjp!4v1735000975619!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">所在地</th>
              <td class="infoTable__cell">
                〒 480- 1124<br>
                愛知県長久手市戸田谷901番地1
              </td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">電話番号</th>
              <td class="infoTable__cell">
                <a href="tel:0570009396" class="infoTable__link">0570-009396</a>（ナビダイヤル）
              </td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">駐車場</th>
              <td class="infoTable__cell">
                1,800台<br>
                ※立体駐車場の高さ制限は2.3mとなっております。ご利用の際はあらかじめご了承ください。
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- access-train -->
  <div class="access-train js-fadeIn">
    <div class="access-train__inner inner">
      <h2 class="access-train__title page-title">電車ご利用の場合</h2>
      <p class="access-train__description">
        東部丘陵線（リニモ）『杁ヶ池公園駅』と直結。連絡通路から雨天の際も雨に濡れずにご来店いただけます。
      </p>
      <div class="access-train__button">
        <a href="https://www.linimo.jp/" class="access-train__button-btn topButton__btn" target="_blank" rel="noopener">リニモWEBサイト</a>
      </div>
      <div class="access-train__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri('/assets/images/access/access.webp'); ?>" type="image/webp">
          <img src="<?php echo get_theme_file_uri('/assets/images/access/access.jpg'); ?>" alt="東部丘陵線（リニモ）の『杁ヶ池公園駅』の写真" loading="lazy">
        </picture>
      </div>
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