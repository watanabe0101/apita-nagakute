<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: SDGs
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="sdgs-header page-header">
    <div class="sdgs-header__inner inner">
      <h1 class="sdgs-header__title">
        地域と未来をつなぐ<br>
        アピタ長久手専門店街<br>
        の取り組み
      </h1>
      <?php breadcrumb('breadcrumb'); ?>
      <p class="sdgs-header__description">アピタ長久手専門店街では、「地域とのつながり」と「環境への配慮」を大切にした取り組みを進めています。地域の大学生や住民の皆さまと共に創る企画や、環境に優しい商品・活動を通じて、持続可能な社会の実現を目指しています。このページでは、私たちが地域社会と環境のために行っているこれまでの取り組みをご紹介します。</p>
    </div>
  </section>

  <!-- sustainagakute -->
  <section class="sdgs-sustainagakute">
    <div class="sdgs-sustainagakute__inner inner">
      <h2 class="sdgs-sustainagakute__title page-title">サステナガクテ</h2>
      <div class="sdgs-sustainagakute__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch1.webp'); ?>" type="image/webp">
          <img src="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch1.jpg'); ?>" alt="サステナガクテのイメージ画像" loading="lazy">
        </picture>
      </div>
      <p class="sdgs-sustainagakute__text">未来の地球のために「サステナブル」な選択を応援しています。各テナントが提案する、環境に配慮した商品や取り組みを一堂に集めました。あなたの日々の買い物が地球を守る第一歩に。暮らしの中で、サステナブルな選択を一緒に始めませんか？</p>
      <div class="detailButton">
        <a href="" class="detailButton-btn topButton__btn">詳しくはこちら</a>
      </div>
    </div>
  </section>

  <!-- gakuwqari -->
  <section class="sdgs-gakuwari js-fadeIn">
    <div class="sdgs-gakuwari__inner inner">
      <h2 class="sdgs-gakuwari__title page-title">ナガクテ学割</h2>
      <div class="sdgs-gakuwari__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch2.webp'); ?>" type="image/webp">
          <img src="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch2.jpg'); ?>" alt="ナガクテ学割のバナー" loading="lazy">
        </picture>
      </div>
      <p class="sdgs-gakuwari__text">近隣の大学生を全力で応援！学生証を提示するだけで、対象店舗で特別割引やおトクなサービスが受けられる「ナガクテ学割」をご用意しました。勉強やサークル、アルバイトで忙しい毎日をちょっとだけ贅沢に、楽しく過ごしてみませんか？ぜひこの機会に、ナガクテでの学生生活を満喫してください！</p>
      <div class="detailButton">
        <a href="" class="detailButton-btn topButton__btn">詳しくはこちら</a>
      </div>
    </div>
  </section>

  <!-- リサイクルステーション -->
  <section class="sdgs-recyclingStation js-fadeIn">
    <div class="sdgs-recyclingStation__inner inner">
      <h2 class="sdgs-recyclingStation__title page-title">リサイクルステーション</h2>
      <div class="sdgs-recyclingStation__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch3.webp'); ?>" type="image/webp">
          <img src="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch3.jpg'); ?>" alt="リサイクルステーションの画像" loading="lazy">
        </picture>
      </div>
      <p class="sdgs-recyclingStation__location">B1階 北口駐輪場横</p>
      <p class="sdgs-recyclingStation__text">牛乳パックをはじめ、アルミ缶、トレー、ペットボトル等お客様がお買い上げ後にゴミになるものを回収し、リサイクルしています。</p>
      <div class="detailButton">
        <a href="" class="detailButton-btn topButton__btn">詳しくはこちら</a>
      </div>
    </div>
  </section>

  <!-- 食品エコバスケット -->
  <section class="sdgs-foodEcoBasket js-fadeIn">
    <div class="sdgs-foodEcoBasket__inner inner">
      <h2 class="sdgs-foodEcoBasket__title page-title">食品エコバスケット</h2>
      <div class="sdgs-foodEcoBasket__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch4.webp'); ?>" type="image/webp">
          <img src="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch4.jpg'); ?>" alt="食品エコバスケットのバナー" loading="lazy">
        </picture>
      </div>
      <div class="sdgs-foodEcoBasket__content">
        <p class="sdgs-foodEcoBasket__text">環境負荷の大きな廃棄物の排出抑制のために、アピタ長久手店はお客様と一緒に「レジ袋を使わないお買い物」を推進しています。</p>
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">1個</th>
              <td class="infoTable__cell">315円（税込）</td>
            </tr>
          </tbody>
        </table>
        <p class="sdgs-foodEcoBasket__note">万一エコバスケットが不要となった場合はお引取り・返金できます。</p>
        <div class="detailButton">
          <a href="" class="detailButton-btn topButton__btn">詳しくはこちら</a>
        </div>
      </div>
    </div>
  </section>

  <!-- これまでの取り組み実績 -->
  <section class="sdgs-achievements">
    <div class="sdgs-achievements__inner inner">
      <h2 class="sdgs-achievements__title js-fadeIn">これまでの取り組み実績</h2>

      <section class="sdgs-ethicalConsumption js-fadeIn">
        <h3 class="sdgs-ethicalConsumption__title page-title">エシカル消費をはじめよう！</h3>
        <div class="sdgs-ethicalConsumption__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch5.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch5.jpg'); ?>" alt="エシカル消費をはじめよう！のバナー" loading="lazy">
          </picture>
        </div>
        <p class="sdgs-ethicalConsumption__text">各専門店が取り扱う環境に配慮した商品を紹介するポスターを館内に掲出し、来店者にエシカル消費の大切さを訴求しました。持続可能な社会の実現を目指し、地域とともに環境への意識向上に取り組んでいます。</p>
        <div class="detailButton">
          <a href="" class="detailButton-btn topButton__btn">詳しくはこちら</a>
        </div>
      </section>

      <section class="sdgs-SpecialMenu js-fadeIn">
        <h3 class="sdgs-SpecialMenu__title page-title">
          学生たち考案！<br>
          スペシャルコラボメニュー
        </h3>
        <div class="sdgs-SpecialMenu__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch6.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/sdgs/eye-catch6.jpg'); ?>" alt="学生たち考案！
スペシャルコラボメニューの画像" loading="lazy">
          </picture>
        </div>
        <div class="sdgs-SpecialMenu__content">
          <p class="sdgs-SpecialMenu__text">近隣の大学生と連携し、地域を盛り上げる企画として「スペシャルコラボメニュー」を展開しました。学生たちの斬新なアイデアと店舗のプロの技が融合し、ここでしか味わえない特別な料理が誕生。若い感性が光るメニューを通じて、大学との新たなつながりを創出する取り組みを実施しました。。</p>
          <p class="sdgs-SpecialMenu__note">
            ※掲載内容は予告なく変更・中止となる場合がございます。<br>
            ※過去に実施された取り組みも含まれます。現在は終了しておりますので、最新の情報は別途ご確認ください。
          </p>
        </div>
      </section>
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