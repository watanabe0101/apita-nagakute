<?php if (!defined('ABSPATH')) exit; ?>

<footer id="footer" class="footer">
  <a href="#" class="page-top"><span class="page-top__line"></span></a>
  <div class="footer__inner inner">
    <div class="footer__top">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
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
      </a>
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
  </div>
  <div class="footer__bottom">
    <small class="footer__copyright">Copyright &copy; apita nagakute. All Right Reserved.</small>
  </div>
</footer>
<?php wp_footer(); ?>

</div>
<!-- main-content -->
</div>
<!-- pc-background -->
<?php
if (is_front_page()) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // メインスライダー
      const main = new Splide("#main-carousel", {
        autoplay: true, // 自動再生
        interval: 5000, // 自動再生の間隔
        speed: 2000, // スライダーの移動時間
        type: "fade", // フェード
        rewind: true, // スライダーの終わりまで行ったら先頭に巻き戻す
        pagination: false, // ページネーション非表示
        arrows: false, // 矢印非表示
      });
      // サムネイル
      const thumbnails = new Splide("#thumbnail-carousel", {
        type: "loop", // ループさせる
        perPage: 3, // サムネイル3枚表示
        pagination: false, // ページネーション非表示
        isNavigation: true, // 他のスライダーのナビゲーションとしてそれぞれのスライドをクリック可能にする
        fixedWidth: 60, // サムネイルの幅
        breakpoints: {
          767: {
            // 幅400px未満の設定
            fixedWidth: 120, // サムネイルの幅
          },
          500: {
            // 幅400px未満の設定
            fixedWidth: 60, // サムネイルの幅
          },
        },
      });
      main.sync(thumbnails);
      main.mount();
      thumbnails.mount();
    });

    document.addEventListener("DOMContentLoaded", function() {
      // メインスライダー
      const splide = new Splide("#main-banner", {
        autoplay: true, // 自動再生
        interval: 5000, // 自動再生の間隔
        speed: 2000, // スライダーの移動時間
        type: "loop", // フェード
        rewind: true, // スライダーの終わりまで行ったら先頭に巻き戻す
        pagination: false, // ページネーション非表示
        arrows: true, // 矢印非表示
      });
      // サムネイル
      splide.mount();
    });
  </script>
<?php } ?>

<?php
if (is_post_type_archive('recruit')) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // メインスライダー
      const splide = new Splide("#recruit-carousel", {
        autoplay: true, // 自動再生
        interval: 5000, // 自動再生の間隔
        speed: 2000, // スライダーの移動時間
        type: "loop", // フェード
        rewind: true, // スライダーの終わりまで行ったら先頭に巻き戻す
        pagination: true, // ページネーション非表示
        arrows: false, // 矢印非表示
        padding: "17.8%", // スライダーの左右の余白
        gap: 36, // スライド間の余白
      });
      // サムネイル
      splide.mount();
    });
  </script>
<?php } ?>

<?php
if (is_singular('shop-guide')) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // メインスライダー
      const splide = new Splide("#singleShopGuide-carousel", {
        autoplay: true, // 自動再生
        interval: 5000, // 自動再生の間隔
        speed: 2000, // スライダーの移動時間
        type: "loop", // フェード
        rewind: true, // スライダーの終わりまで行ったら先頭に巻き戻す
        pagination: true, // ページネーション非表示
        arrows: false, // 矢印非表示
      });
      // サムネイル
      splide.mount();
    });
  </script>
<?php } ?>
</body>

</html>