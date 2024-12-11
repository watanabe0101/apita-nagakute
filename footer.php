<?php if (!defined('ABSPATH')) exit; ?>

<footer id="footer" class="footer">
  <a href="#" class="page-top"><span class="page-top__line"></span></a>
  <div class="footer__inner inner">
    <div class="footer__top">
      <div class="footer__logo">
        <div class="footer__image1">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/footer/apita_mark.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/footer/apita_mark.png'); ?>" alt="アピタ長久手店のロゴ" loading="lazy">
          </picture>
        </div>
        <div class="footer__image2">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/header/header-logo.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/header/header-logo.png'); ?>" alt="アピタ長久手店のロゴ" loading="lazy">
          </picture>
        </div>
      </div>
      <p class="footer__title">アピタ長久手店専門店街</p>
    </div>
    <ul class="footer__list">
      <li class="footer__item">
        <p class="footer__label">所在地</p>
        <p class="footer__text">
          〒 480- 1124<br>
          愛知県長久手市戸田谷901番地1
        </p>
      </li>
      <li class="footer__item">
        <p class="footer__label">電話番号</p>
        <p class="footer__text"><a href="tel:0570009396" class="footer__tel">0570-009396</a>（ナビダイヤル）</p>
      </li>
      <li class="footer__item">
        <p class="footer__label">営業時間</p>
        <div class="footer__wrap">
          <p class="footer__text">
            アピタ長久手店<br>
            9:00～21:30
          </p>
          <p class="footer__text">
            アピタ長久手専門店街<br>
            10:00~21:30
          </p>
          <p class="footer__text">
            ※一部専門店は営業時間が異なります。<br>
            ※年末・年始は営業時間が異なる場合がございます。
          </p>
        </div>
      </li>
    </ul>
    <ul class="footer__links">
      <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer__link">サイトの利用について</a></li>
      <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer__link">サイトマップ</a></li>
      <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer__link">個人情報保護方針</a></li>
      <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer__link">SDGs・地域連携</a></li>
    </ul>
    <div class="footer__bottom">
      <small class="footer__copyright">Copyright &copy; apita nagakute. All Right Reserved.</small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

</div>
<!-- main-content -->
</div>
<!-- pc-background -->
</body>

</html>