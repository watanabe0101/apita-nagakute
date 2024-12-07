"use strict";

/*----------------------------
  ■■ viewport設定 ■■
  ------------------------------*/
export function initializeViewport() {

!(function () {
  const viewport = document.querySelector('meta[name="viewport"]');
  function switchViewport() {
    const fixedWidth = 375;
    const value =
      window.innerWidth <= fixedWidth
        ? `width=${fixedWidth}`
        // ? `width=device-width, maximum-scale=1.0`
        : "width=device-width, initial-scale=1";

    if (viewport) {
      if (viewport.getAttribute("content") !== value) {
        viewport.setAttribute("content", value);
      }
    } else {
      // ビューポートメタタグが存在しない場合は作成
      const meta = document.createElement("meta");
      meta.name = "viewport";
      meta.content = value;
      document.head.appendChild(meta);
    }
  }

  // リサイズとページ読み込み時に実行
  window.addEventListener("resize", switchViewport, false);
  window.addEventListener("load", switchViewport, false);
  switchViewport(); // 即時実行
})();


function viewportSet() {
  const isIPhone = /iPhone/.test(navigator.userAgent) && !window.MSStream;

  $(document).ready(function () {
    if (isIPhone) {
      $("meta[name='viewport']").attr(
        "content",
        "width=device-width, user-scalable=no"
      );
    } else {
      $("meta[name='viewport']").attr("content", "width=device-width");
    }
  });
}

// 関数を呼び出す
viewportSet();

}