"use strict";

//ハンバーガーボタンをクリックしたらスマホメニューを表示
/*==================================================*/
//
// hamburger.jsファイル
export function initializeHamburger() {
  $(document).on("click", function (e) {
    if (!$(e.target).closest(".js-hamburger").length) {
      if ($(".js-hamburger").hasClass("active")) {
        $(".js-hamburger").removeClass("active");
        $(".js-drawer").removeClass("panelactive");
        $("body").removeClass("js-ScrollAllowed");
        $(".js-drawer").attr("aria-hidden", "true");
        $(".js-hamburger").attr("aria-expanded", "false");
        $(".js-hamburger").attr("aria-label", "メニュー");
      }
    } else {
      if ($(".js-hamburger").hasClass("active")) {
        $(".js-hamburger").removeClass("active");
        $(".js-drawer").removeClass("panelactive");
        $("body").removeClass("js-ScrollAllowed");
        $(".js-hamburger").attr("aria-expanded", "false");
        $(".js-drawer").attr("aria-hidden", "true");
        $(".js-hamburger").attr("aria-label", "メニュー");
      } else {
        $(".js-hamburger").addClass("active");
        $(".js-drawer").addClass("panelactive");
        $("body").addClass("js-ScrollAllowed");
        $(".js-hamburger").attr("aria-expanded", "true");
        $(".js-drawer").attr("aria-hidden", "false");
        $(".js-hamburger").attr("aria-label", "閉じる");
      }
    }
  });
}