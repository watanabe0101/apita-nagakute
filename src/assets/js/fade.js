"use strict";


export function initializeFade() {
/*================================================
  フワッとアニメーション（下から/上から）
=================================================*/
  if (
    document.querySelector(".js-fadeIn") ||
    document.querySelector(".js-fadeUp") ||
    document.querySelector(".js-fadeDown") ||
    document.querySelector(".js-fadeLeft") ||
    document.querySelector(".js-fadeRight") ||
    document.querySelector(".js-fadeIn-sp") ||
    document.querySelector(".js-fadeUp-sp") ||
    document.querySelector(".js-fadeDown-sp") ||
    document.querySelector(".js-fadeLeft-sp") ||
    document.querySelector(".js-fadeRight-sp")
  ) {
    scrollAnimation();
  }

  function scrollAnimation() {
    window.addEventListener("scroll", function () {
      const windowWidth = window.innerWidth;
      const offsetValue = windowWidth <= 767 ? 0 : 200;

      const elements = document.querySelectorAll(
        ".js-fadeUp, .js-fadeDown, .js-fadeLeft, .js-fadeRight, .js-fadeIn, .js-fadeUp-sp, .js-fadeDown-sp, .js-fadeLeft-sp, .js-fadeRight-sp, .js-fadeIn-sp"
      );

      elements.forEach(function (element) {
        const position =
          element.getBoundingClientRect().top + window.pageYOffset;
        const scroll = window.pageYOffset;
        const windowHeight = window.innerHeight;

        if (scroll > position - windowHeight + offsetValue) {
          element.classList.add("js-show");
        }
      });
    });
  }

/*================================================
  フワッとアニメーション（時間差）
=================================================*/
  document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
      const wHeight = window.innerHeight;
      const wScroll = window.pageYOffset;
      const wWidth = window.innerWidth;

      const offsetValue = wWidth <= 767 ? 0 : 200;

      const delayElements = document.querySelectorAll(".js-delay");

      delayElements.forEach(function (element) {
        const bPosition =
          element.getBoundingClientRect().top + window.pageYOffset;

        if (wScroll > bPosition - wHeight + offsetValue) {
          const animationsPC = ["fadeIn", "fadeLeft", "fadeUp", "fadeRight"];
          const animationsSP = [
            "fadeIn-sp",
            "fadeLeft-sp",
            "fadeUp-sp",
            "fadeRight-sp",
          ];
          const delays = ["0ms", "300ms", "600ms", "900ms"];

          // PCの場合のアニメーション
          if (wWidth > 767) {
            animationsPC.forEach(function (animation) {
              delays.forEach(function (delay) {
                const elements = element.querySelectorAll(
                  `.js-${animation}${delay}`
                );
                elements.forEach(function (el) {
                  el.classList.add("js-show");
                });
              });
            });
          } else {
            // スマホの場合のアニメーション
            animationsSP.forEach(function (animation) {
              delays.forEach(function (delay) {
                const elements = element.querySelectorAll(
                  `.js-${animation}${delay}`
                );
                elements.forEach(function (el) {
                  el.classList.add("js-show");
                });
              });
            });
          }
        }
      });
    });
  });
}