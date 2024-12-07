<?php get_header(); ?>
<div class="main__bg">
  <main>
    <div class="error-404">
      <!-- サムネイルとパンくず -->
      <div class="error-404__thumb-page thumb-page">
        <picture class="error-404__picture picture">
          <source srcset="<?php  echo get_theme_file_uri( 'images/404/404-img-sp.webp' ); ?>" class="error-404__img img-page" media="(max-width: 768px)">
          <img src="<?php  echo get_theme_file_uri( 'images/404/404-img.webp' ); ?>" class="error-404__img img-page" alt="机の上でWebデザインをしている">
        </picture>
      </div>
      <div class="error-404__inner inner">
        <h1 class="error-404__title">
          404 NOT FOUND
        </h1>
        <div class="error-404__outer outer">
          <p class="error-404__text">
            お探しのページはありませんでした。
          </p>
        </div>
        <div class="complete__button button-noAnime">
          <a class="complete__arrow arrow-noAnime" href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る</a>
        </div>
      </div>
    </div>
  </main>
<!-- 黒い背景の閉じタグ -->
</div>  
<?php get_footer(); ?>