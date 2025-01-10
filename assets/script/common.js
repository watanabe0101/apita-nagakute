"use strict";


/* ===============================================
# ハンバーガーメニュー
=============================================== */
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


  /*=================================================
  スムーススクロール
===================================================*/
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

/* ===============================================
# TOPに戻る追従ボタン
=============================================== */
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


  /* ===============================================
  # アコーディオン
  =============================================== */
document.addEventListener("DOMContentLoaded", () => {
  setUpAccordion();
});

/**
 * ブラウザの標準機能(Web Animations API)を使ってアコーディオンのアニメーションを制御します
 */
const setUpAccordion = () => {
  const details = document.querySelectorAll(".js-details");
  const RUNNING_VALUE = "running"; // アニメーション実行中のときに付与する予定のカスタムデータ属性の値
  const IS_OPENED_CLASS = "is-opened"; // アイコン操作用のクラス名

  details.forEach((element) => {
    const summary = element.querySelector(".js-summary");
    const content = element.querySelector(".js-content");

    summary.addEventListener("click", (event) => {
      // デフォルトの挙動を無効化
      event.preventDefault();

      // 連打防止用。アニメーション中だったらクリックイベントを受け付けないでリターンする
      if (element.dataset.animStatus === RUNNING_VALUE) {
        return;
      }

      // 他のアコーディオンを閉じる
      details.forEach((otherElement) => {
        if (otherElement !== element && otherElement.open) {
          closeAccordion(otherElement);
        }
      });

      // detailsのopen属性を判定
      if (element.open) {
        closeAccordion(element);
      } else {
        openAccordion(element);
      }
    });
  });

  const closeAccordion = (element) => {
    const content = element.querySelector(".js-content");
    element.classList.remove(IS_OPENED_CLASS); // .is-openedクラスを削除
    const closingAnim = content.animate(
      closingAnimKeyframes(content),
      animTiming
    );
    element.dataset.animStatus = RUNNING_VALUE;
    closingAnim.onfinish = () => {
      element.removeAttribute("open");
      element.dataset.animStatus = "";
    };
  };

  const openAccordion = (element) => {
    const content = element.querySelector(".js-content");
    element.setAttribute("open", "true");
    if (!element.classList.contains(IS_OPENED_CLASS)) {
      element.classList.add(IS_OPENED_CLASS); // .is-openedクラスを追加
    }
    const openingAnim = content.animate(
      openingAnimKeyframes(content),
      animTiming
    );
    element.dataset.animStatus = RUNNING_VALUE;
    openingAnim.onfinish = () => {
      element.dataset.animStatus = "";
    };
  };
};

/**
 * アニメーションの時間とイージング
 */
const animTiming = {
  duration: 400,
  easing: "ease-out",
};

/**
 * アコーディオンを閉じるときのキーフレーム
 */
const closingAnimKeyframes = (content) => [
  {
    height: content.offsetHeight + "px", // height: "auto"だとうまく計算されないため要素の高さを指定する
    opacity: 1,
  },
  {
    height: 0,
    opacity: 0,
  },
];

/**
 * アコーディオンを開くときのキーフレーム
 */
const openingAnimKeyframes = (content) => [
  {
    height: 0,
    opacity: 0,
  },
  {
    height: content.offsetHeight + "px",
    opacity: 1,
  },
];


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


  // document.addEventListener("DOMContentLoaded", function () {
  //   const elements = document.querySelectorAll('[aria-hidden="true"]');
  //   elements.forEach((element) => {
  //     if (element.querySelector(":focus")) {
  //       element.removeAttribute("aria-hidden");
  //     }
  //   });
  // });
  
