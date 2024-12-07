"use strict";

export function initializeHeaderFixed() {
  (function () {
    const fh = document.querySelector(".js-fixed");
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 300) {
        fh.classList.add("js-show");
      } else {
        fh.classList.remove("js-show");
      }
    });
  })();
}
