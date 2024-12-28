<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: about
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="access-header page-header">
    <div class="inner">
      <hgroup class="page-header__title">
        <p class="page-header__eng">About</p>
        <h1 class="page-header__jp">施設情報</h1>
      </hgroup>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- about-menu -->
  <div class="about-menu">
    <div class="about-menu__inner inner">
      <ul class="about-menu__list">
        <li class="about-menu__item"><a href="#" class="about-menu__link">営業時間</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">サービスカウンター</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">ポスタルカウンター</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">ATMキャッシュコーナー</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">ナチュラル純粋サービス</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">リサイクルステーション</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">AED（自動体外式除細動器）の設置</a></li>
        <li class="about-menu__item"><a href="#" class="about-menu__link">長久手サービスコーナーNピア </a></li>
      </ul>
    </div>
  </div>

  <!-- about-businessHours -->
  <section class="about-businessHours">
    <div class="about-businessHours__inner inner">
      <h2 class="about-businessHours__title page-title">営業時間</h2>
      <div class="about-businessHours__content">
        <table class="about-businessHours__table">
          <tbody class="about-businessHours__table__tbody">
            <tr class=" about-businessHours__table__row">
              <th class="about-businessHours__table__header">アピタ長久手店</th>
              <td class="about-businessHours__table__cell">9:00~21:30</td>
            </tr>
            <tr class=" about-businessHours__table__row">
              <th class="about-businessHours__table__header">アピタ長久手店 専門店街</th>
              <td class="about-businessHours__table__cell">10:00~21:30</td>
            </tr>
          </tbody>
        </table>
        <p class="about-businessHours__note">
          ※一部専門店は営業時間が異なります。<br>
          ※年末・年始は営業時間が異なる場合がございます。
        </p>
      </div>
    </div>
  </section>

  <!-- about-serviceCounter -->
  <section class="about-serviceCounter js-fadeIn">
    <div class="about-serviceCounter__inner inner">
      <p class="about-serviceCounter__title page-title">サービスカウンター</p>
      <div class="about-serviceCounter__content">
        <div class="about-serviceCounter__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/about/service-counter.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/about/service-counter.jpg'); ?>" alt="サービスカウンターの画像" loading="lazy">
          </picture>
        </div>
        <p class="about-serviceCounter__location">B1階 南側エスカレーター横</p>
        <ul class="about-serviceCounter__list">
          <li class="about-serviceCounter__item">インフォメーション</li>
          <li class="about-serviceCounter__item">お客様のお呼び出し</li>
          <li class="about-serviceCounter__item">お迷子さんご案内</li>
          <li class="about-serviceCounter__item">拾得物・遺失物の承り</li>
          <li class="about-serviceCounter__item">進物包装</li>
          <li class="about-serviceCounter__item">UCSカードのご案内</li>
          <li class="about-serviceCounter__item">コピーサービス</li>
          <li class="about-serviceCounter__item">ユニー商品券の販売</li>
          <li class="about-serviceCounter__item">エコバスケット販売</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- about-postalCounter -->
  <section class="about-postalCounter js-fadeIn">
    <div class="about-postalCounter__inner inner">
      <h2 class="about-postalCounter__title page-title">ポスタルカウンター</h2>
      <div class="about-postalCounter__content">
        <p class="about-postalCounter__location">B1階 サービスカウンター併設</p>
        <ul class="about-postalCounter__list">
          <li class="about-postalCounter__item">「郵便切手」「郵便ハガキ」「収入印紙」「レターパック」の販売</li>
          <li class="about-postalCounter__item">店内ポストの設置</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- about-atm -->
  <section class="about-atm js-fadeIn">
    <div class="about-atm__inner inner">
      <h2 class="about-atm__title page-title">ATMキャッシュコーナー</h2>
      <div class="about-atm__content">
        <p class="about-atm__location">2階 東側エレベーター横</p>
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">三菱UFJ</th>
              <td class="infoTable__cell">9:00〜21:30</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">愛知銀行</th>
              <td class="infoTable__cell">9:00〜21:30</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">瀬戸信用金庫</th>
              <td class="infoTable__cell">9:00〜21:00</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">ゆうちょ銀行</th>
              <td class="infoTable__cell">9:00〜21:00</td>
            </tr>
          </tbody>
        </table>
        <p class="about-atm__location">B1階 ベーカリーモンタボー横</p>
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">三菱UFJ</th>
              <td class="infoTable__cell">9:00〜21:30</td>
            </tr>
          </tbody>
        </table>
        <p class="about-atm__note">
          ※都合により営業時間が変更となる場合がございます<br>
          ※ATMにかかる利用料、手数料は各銀行ウェブサイトにてご確認ください
        </p>
      </div>
    </div>
  </section>

  <!-- naturalPureWater -->
  <section class="about-naturalPureWater js-fadeIn">
    <div class="about-naturalPureWater__inner inner">
      <h2 class="about-naturalPureWater__title page-title">ナチュラル純水サービス</h2>
      <div class="about-naturalPureWater__content">
        <div class="about-naturalPureWater__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/about/naturalPureWater.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/about/naturalPureWater.jpg'); ?>" alt="ナチュラル純水サービス" loading="lazy">
          </picture>
        </div>
        <p class="about-naturalPureWater__location">地下1階 南・北エスカレーター横</p>
        <p class="about-naturalPureWater__description">
          飲料水サービス（ナチュラル純水）を設けました。
          ナチュラル純水は、専用ボトルを購入し、ご利用いただけます。
        </p>
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">
                専用ボトル<br>
                UCSカード会員様
              </th>
              <td class="infoTable__cell">400円（税込）</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">
                専用ボトル<br>
                一般のお客様
              </th>
              <td class="infoTable__cell">500円（税込）</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">
                ナチュラル純水<br>
                UCSカード会員様
              </th>
              <td class="infoTable__cell">無料</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">
                ナチュラル純水<br>
                一般のお客様
              </th>
              <td class="infoTable__cell">1回30円（税込）</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- aed -->
  <section class="about-aed js-fadeIn">
    <div class="about-aed__inner inner">
      <h2 class="about-aed__title page-title">AED（自動体外式除細動器）の設置</h2>
      <div class="about-aed__content">
        <div class="about-aed__imag">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/about/aed.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/about/aed.jpg'); ?>" alt="AEDの画像" loading="lazy">
          </picture>
        </div>
        <p class="about-aed__location">1階 中央通路</p>
        <p class="about-aed__description">AEDとは突然の心停止（心臓突然死）から命を救うための装置です。音声ガイダンスにより高度な専門知識を必要とせず、安心して簡単に操作することができます。</p>
      </div>
    </div>
  </section>

  <!-- recycling-station -->
  <div class="about-recyclingStation js-fadeIn">
    <div class="about-recyclingStation__inner inner">
      <h2 class="about-recyclingStation__title page-title">リサイクルステーション</h2>
      <div class="about-recyclingStation__content">
        <div class="about-recyclingStation__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/about/recycling-station.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/about/recycling-station.jpg'); ?>" alt="リサイクルステーションの画像" loading="lazy">
          </picture>
        </div>
        <p class="about-recyclingStation__location">B1階 北口駐輪場横</p>
        <p class="about-recyclingStation__description">牛乳パックをはじめ、アルミ缶、トレー、ペットボトル等お客様がお買い上げ後にゴミになるものを回収し、リサイクルしています。</p>
      </div>
    </div>
  </div>

  <!-- Nピア -->
  <section class="about-npia js-fadeIn">
    <div class="about-npia__inner inner">
      <h2 class="about-npia__title page-title">
        長久手サービスコーナー<br>
        Nピア
      </h2>
      <div class="about-npia__content">
        <div class="about-npia__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/about/npia.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/about/npia.jpg'); ?>" alt="Nピアの画像" loading="lazy">
          </picture>
        </div>
        <p class="about-npia__location">地下1階 北エスカレーター横</p>
        <p class="about-npia__description">市役所閉庁日でも住民票の写しや印鑑登録証明書、戸籍謄抄本などの交付のほか、市刊行物などの販売・配布を行います。</p>
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">営業時間</th>
              <td class="infoTable__cell">10:00〜19:00</td>
            </tr>
          </tbody>
        </table>
      </div>
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