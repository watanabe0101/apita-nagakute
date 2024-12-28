<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: terms-of-service
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="termsOfService-header page-header">
    <div class="termsOfService-header__inner inner">
      <h1 class="termsOfService-header__title">サイトの利用について</h1>
      <?php breadcrumb('breadcrumb'); ?>
      <p class="termsOfService-header__description">ウェブサイトを快適かつ適切にご利用いただくため、下記内容のご一読、ならびにご了承くださいますようお願いいたします。</p>
    </div>
  </section>

  <!-- 著作権について -->
  <section class="termsOfService-aboutCopyright">
    <div class="termsOfService-aboutCopyright__inner inner">
      <h2 class="termsOfService-aboutCopyright__title page-title">著作権について</h2>
      <div class="termsOfService-aboutCopyright__content">
        <p class="termsOfService-aboutCopyright__text">本ウェブサイト上に掲載の個々の 情報・文章・資料・ロゴマーク・商標・画像・絵・音声・映像などに関する著作権その他の権利は、当社またはその他の権利者が有しています。</p>
        <p class="termsOfService-aboutCopyright__text">利用者は、それらの権利者からあらかじめ承諾を得るか、または本ウェブサイト上に明示的に許諾されている場合を除き、 無許可の複製、転用、販売などの二次利用をすることはできません。</p>
        <p class="termsOfService-aboutCopyright__text">また、コンテンツの内容を変形・改変・加筆修正することも禁止いたします。</p>
      </div>
    </div>
  </section>

  <!-- リンクについて -->
  <section class="termsOfService-link">
    <div class="termsOfService-link__inner inner">
      <h2 class="termsOfService-link__title page-title">リンクについて</h2>
      <div class="termsOfService-link__content">
        <p class="termsOfService-link__text">本ウェブサイトへリンクする際のご連絡は不要です。 ただし、下記の注意事項を必ずご遵守ください。</p>
        <p class="termsOfService-link__text">なお、トップページ以外の各個別ページへのリンクをご希望される場合、コンテンツやURLは予告なしに変更、中止または削除されることがありますので、あらかじめご了承ください。</p>
        <p class="termsOfService-link__text">各ウェブサイトから本ウェブサイトへのリンクについてのみを許可するものです。従って、各ウェブサイトに記載されている内容について保証するものではなくまた一切の責任も負いかねます。</p>
        <p class="termsOfService-link__text">次に該当するウェブサイトからのリンクは固くお断りいたします。</p>
        <ul class="termsOfService-link__list">
          <li class="termsOfService-link__item">当社、または他社(者)・他団体を誹謗中傷したり、信用失墜を意図する内容を含んでいる。</li>
          <li class="termsOfService-link__item">公序良俗に反する内容を含んでいる。</li>
          <li class="termsOfService-link__item">違法・または違法な可能性を有するコンテンツや、その可能性を有する活動に関わっている。</li>
          <li class="termsOfService-link__item">フレーム内でアピタ長久手店専門店街ウェブサイトが展開されるなど、当社コンテンツであることが不明確となり、第三者に誤解を与える可能性がある。</li>
        </ul>
        <p class="termsOfService-link__footer-text">本ウェブサイトに記載されている注意事項に従っていただけない場合には、リンクを行わないでください。また、当社からリンク削除の申し入れをした場合は必ず従ってください。</p>
      </div>
    </div>
  </section>

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

<?php get_footer(); ?>