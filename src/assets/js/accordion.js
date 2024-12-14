"use strict";

export function initializeAccordion() {
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
}
