"use strict";

export function initializeMobile() {
/* ===============================================
# スマホの場合にbodyにクラスを付与
=============================================== */
  if (navigator.userAgent.indexOf("iPhone") > 0) {
    let body = document.getElementsByTagName("body")[0];
    body.classList.add("iPhone");
  }

  if (navigator.userAgent.indexOf("iPad") > 0) {
    let body = document.getElementsByTagName("body")[0];
    body.classList.add("iPad");
  }

  if (navigator.userAgent.indexOf("Android") > 0) {
    let body = document.getElementsByTagName("body")[0];
    body.classList.add("Android");
  }
}
