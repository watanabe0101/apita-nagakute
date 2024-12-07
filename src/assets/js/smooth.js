"use strict";

/*=================================================
  スムーススクロール
===================================================*/
export function initializeSmoothScroll() {
  $(function () {
    var headerHeight = $("header").height();

    // ハッシュを含むすべてのリンクに対応するようセレクタを変更
    $('a[href*="#"]').click(function (e) {
      var href = $(this).attr("href");

      // 現在のページのURLと遷移先URLを比較
      var currentUrlBase =
        window.location.protocol +
        "//" +
        window.location.host +
        window.location.pathname;
      var clickedUrlBase = href.split("#")[0];

      // クリックされたURLのベース部分が空か現在のページと同じ場合のみスクロール処理を実行
      if (clickedUrlBase === "" || clickedUrlBase === currentUrlBase) {
        var targetId = href.split("#")[1]; // #以降の部分を取得
        var target = targetId ? $("#" + targetId) : $("html"); // ターゲットの特定

        if (target.length) {
          // ターゲットが存在する場合のみ処理
          e.preventDefault();
          var position = target.offset().top - headerHeight;

          // スクロール実行
          $.when(
            $("html, body").animate(
              {
                scrollTop: position,
              },
              400,
              "swing"
            )
          ).done(function () {
            var diff = target.offset().top - headerHeight;
            if (diff !== position) {
              $("html, body").animate(
                {
                  scrollTop: diff,
                },
                10,
                "swing"
              );
            }
          });
        }
      }
    });
  });

  const urlHash = location.hash;
  if (urlHash) {
    const target = jQuery(urlHash);
    if (target.length) {
      // ページトップから開始（ブラウザ差異を考慮して併用）
      history.replaceState(null, "", window.location.pathname);
      jQuery("html,body").stop().scrollTop(0);

      // ページが完全にロードされたときの処理
      jQuery(window).on("load", function () {
        const headerHeight = jQuery("header").outerHeight();
        let position = target.offset().top - headerHeight - 20;

        // 最初のスクロール
        jQuery("html, body").animate(
          { scrollTop: position },
          400,
          "swing",
          function () {
            // 微調整: 再計算してズレを修正
            position = target.offset().top - headerHeight - 20;
            jQuery("html, body").animate({ scrollTop: position }, 100, "swing");
          }
        );

        // ハッシュを再設定
        history.replaceState(null, "", window.location.pathname + urlHash);
      });

      // 遅延読み込みされた画像にも対応
      jQuery(window).on("lazyloaded", function () {
        const headerHeight = jQuery("header").outerHeight();
        const position = target.offset().top - headerHeight - 20;

        jQuery("html, body").animate({ scrollTop: position }, 300, "swing");
      });
    }
  }
}