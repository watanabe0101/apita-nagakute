"use strict";

document.addEventListener("DOMContentLoaded", function () {
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

document.addEventListener("DOMContentLoaded", function () {
  // メインスライダー
  const splide = new Splide("#main-banner", {
    autoplay: true, // 自動再生
    interval: 5000, // 自動再生の間隔
    speed: 2000, // スライダーの移動時間
    type: "loop", // フェード
    rewind: true, // スライダーの終わりまで行ったら先頭に巻き戻す
    //  pagination: false, // ページネーション非表示
    arrows: true, // 矢印非表示
  });
  // サムネイル
  splide.mount();
});