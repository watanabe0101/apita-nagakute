<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: Facility-Information
*/
get_header(); ?>

<main class="main">
  <!-- title -->
  <section class="facilityInformation-header page-header">
    <div class="inner">
      <h1 class="facilityInformation-header__title">Facility <span>Information</span></h1>
      <?php breadcrumb('breadcrumb'); ?>
    </div>
  </section>

  <!-- Basic Information -->
  <section class="facilityInformation-basicInformation">
    <div class="facilityInformation-basicInformation__inner inner">
      <h2 class="facilityInformation-basicInformation__title page-title">Basic Information</h2>
      <div class="facilityInformation-basicInformation__content">
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">Address</th>
              <td class="infoTable__cell">901-1 Todagai, Nagakute Shi, <br class="facilityInformation-basicInformation__br">Aichi-Ken</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">TEL</th>
              <td class="infoTable__cell"><a href="tel:057000939" class="infoTable__link">0570-009396</a> (Navi Dial) </td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">Parking</th>
              <td class="infoTable__cell">1800 Spaces</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Opening Times -->
  <section class="facilityInformation-openingTimes">
    <div class="facilityInformation-openingTimes__inner inner">
      <h2 class="facilityInformation-openingTimes__title page-title">Opening Times</h2>
      <div class="facilityInformation-openingTimes__content">
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">Apita Nagakute</th>
              <td class="infoTable__cell">9:00~21:30 </td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">Apita Nagakute</th>
              <td class="infoTable__cell">10:00~21:30</td>
            </tr>
          </tbody>
        </table>
        <p class="facilityInformation-openingTimes__text">*Some specialty stores have different opening hours.
          *Opening hours may differ during the New Year holidays.</p>
      </div>
    </div>
  </section>

  <!-- Access -->
  <section class="facilityInformation-access js-fadeIn">
    <div class="facilityInformation-access__inner inner">
      <h2 class="facilityInformation-access__title page-title">Access</h2>
      <div class="facilityInformation-access__content">
        <div class="facilityInformation-access__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/access/access.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/access/access.jpg'); ?>" alt="IRIGAIKE PARK STATION on the Tobu Kyuryo Line" loading="lazy">
          </picture>
        </div>
        <p class="facilityInformation-openingTimes__text">
          Directly connected to IRIGAIKE PARK STATION on the Tobu Kyuryo Line (linear motor).<br>
          If you come through the connecting passage, you can visit our store without getting wet even in rainy weather.
        </p>
        <div class="linerButton">
          <a href="https://www.linimo.jp/" class="linerButton-btn topButton__btn" target="_blank" rel="noopener">Click here for the Linear Motor website</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Floor Guide -->
  <section class="facilityInformation-floorGuide js-fadeIn">
    <div class="facilityInformation-floorGuide__inner inner">
      <h2 class="facilityInformation-floorGuide__title page-title">Floor Guide</h2>
      <ul class="facilityInformation-floorGuide__list">
        <li class="facilityInformation-floorGuide__item">
          <p class="facilityInformation-floorGuide__floor">B1F</p>
          <div class="facilityInformation-floorGuide__image">
            <?php if (get_field('b1英語マップ', 285)): ?>
              <img src="<?php the_field('b1英語マップ', 285); ?>" alt="1st floor floor map" loading="lazy">
            <?php else: ?>
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
              </picture>
            <?php endif; ?>
          </div>
          <a href="<?php the_field('b1英語マップpdf', 285); ?>" class="facilityInformation-floorGuide__pdf">PDF</a>
        </li>
        <li class="facilityInformation-floorGuide__item">
          <p class="facilityInformation-floorGuide__floor">1F</p>
          <div class="facilityInformation-floorGuide__image">
            <?php if (get_field('1f英語マップ', 285)): ?>
              <img src="<?php the_field('1f英語マップ', 285); ?>" alt="1st floor floor map" loading="lazy">
            <?php else: ?>
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
              </picture>
            <?php endif; ?>
          </div>
          <a href="<?php the_field('b1英語マップpdf', 285); ?>" class="facilityInformation-floorGuide__pdf">PDF</a>
        </li>
        <li class="facilityInformation-floorGuide__item">
          <p class="facilityInformation-floorGuide__floor">2F</p>
          <div class="facilityInformation-floorGuide__image">
            <?php if (get_field('2f英語マップ', 285)): ?>
              <img src="<?php the_field('2f英語マップ', 285); ?>" alt="1st floor floor map" loading="lazy">
            <?php else: ?>
              <picture>
                <source srcset="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.webp'); ?>" type="image/webp">
                <img src="<?php echo get_theme_file_uri('/assets/images/common/other/no-image.jpeg'); ?>" alt="ダミー画像" loading="lazy">
              </picture>
            <?php endif; ?>
          </div>
          <a href="<?php the_field('b1英語マップpdf', 285); ?>" class="facilityInformation-floorGuide__pdf">PDF</a>
        </li>
      </ul>
    </div>
  </section>

  <!-- N-pia -->
  <section class="facilityInformation-npia js-fadeIn">
    <div class="facilityInformation-npia__inner inner">
      <h2 class="facilityInformation-npia__title page-title">
        Nagakute City<br>
        Service Corner N-Pier
      </h2>
      <div class="facilityInformation-npia__content">
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">Service</th>
              <td class="infoTable__cell">City Hall Branch Office</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">Floor</th>
              <td class="infoTable__cell">B1F</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">Opening Times </th>
              <td class="infoTable__cell">10:00~19:30</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">TEL</th>
              <td class="infoTable__cell"><a href="tel:0561639200" class="infoTable__link">0561-63-9200</a></td>
            </tr>
          </tbody>
        </table>
        <div class="websiteButton">
          <a href="https://www.city.nagakute.lg.jp/soshiki/somubu/shiminka/1/1/15592.html" class="websiteButton-btn topButton__btn" target="_blank" rel="noopener">Official Website</a>
        </div>
        <p class="facilityInformation-npia__text">
          Even on days when City Hall is closed, resident registration certificates, seal registration certificates, and extracts from family registers will be issued, and city publications are available.
        </p>
      </div>
    </div>
  </section>

  <!-- Don Quijote -->
  <section class="facilityInformation-donQuijote js-fadeIn">
    <div class="facilityInformation-donQuijote__inner inner">
      <h2 class="facilityInformation-donQuijote__title page-title">Don Quijote</h2>
      <div class="facilityInformation-donQuijote__content">
        <table class="infoTable">
          <tbody class="infoTable__tbody">
            <tr class=" infoTable__row">
              <th class="infoTable__header">Service</th>
              <td class="infoTable__cell">Discount Store</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">Floor</th>
              <td class="infoTable__cell">2F</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">Opening Times </th>
              <td class="infoTable__cell">9:00~21:30</td>
            </tr>
            <tr class=" infoTable__row">
              <th class="infoTable__header">TEL</th>
              <td class="infoTable__cell"><a href="tel:0570011135" class="infoTable__link">0570-011-135</a></td>
            </tr>
          </tbody>
        </table>
        <div class="websiteButton">
          <a href="https://www.donki.com/store/shop_list.php?pref=24&pre=ss" class="websiteButton-btn topButton__btn" target="_blank" rel="noopener">Official Website</a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>