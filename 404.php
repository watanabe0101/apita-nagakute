<?php get_header(); ?>
<div class="main">
  <main>
    <div class="error-404">
      <div class="error-404__inner inner">
        <h1 class="error-404__title">
          404 NOT FOUND
        </h1>
        <p class="error-404__text">
          お探しのページはありませんでした。
        </p>
        <div class="topButton">
          <a class="topButton__btn" href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る</a>
        </div>
      </div>
    </div>
  </main>
<!-- 黒い背景の閉じタグ -->
</div>  
<?php get_footer(); ?>