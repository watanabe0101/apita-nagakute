"use strict";

export function initializePageTop() {
  window.addEventListener("DOMContentLoaded", function () {
    var pageTopBtn = document.querySelector(".page-top");
    pageTopBtn.addEventListener("click", function (event) {
      event.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });

    window.addEventListener("scroll", function () {
      // window.pageYOffset 現在の位置を取得
      if (window.pageYOffset > 100) {
        pageTopBtn.classList.add("is-visible");
      } else {
        pageTopBtn.classList.remove("is-visible");
      }
    });
  });
}
