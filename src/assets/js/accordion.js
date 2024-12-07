"use strict";

export function initializeAccordion() {
  // クリックまたはキーボード操作でのアコーディオンの動作
  $('.accordion__header').on('click keydown', function(event) {
    // クリックまたはEnterキーが押された場合の処理
    if (event.type === 'click' || (event.type === 'keydown' && (event.key === 'Enter' || event.key === ' '))) {
      event.preventDefault(); // デフォルトの動作を無効にする

      // クリックされた要素の親要素を取得
      var parentPanel = $(this).closest('.accordion__panel');
      var findElm = parentPanel.find('.accordion__main');

      if (parentPanel.hasClass('is-open')) { // .is-openクラスがついている場合
        parentPanel.removeClass('is-open'); // .is-openクラスを除去
        $(this).attr('aria-expanded', 'false'); // aria-expanded属性をfalseに設定
        findElm.attr('aria-hidden', 'true'); // aria-hidden属性をtrueに設定
        findElm.slideUp(500); // .accordion__mainを閉じる
      } else { // .is-openクラスがついていない場合
        $('.accordion__panel.is-open').removeClass('is-open'); // .is-openクラスを持つ要素から除去
        $('.accordion__main').attr('aria-hidden', 'true').slideUp(300); // すべての.accordion__mainを閉じる
        $('.accordion__header').attr('aria-expanded', 'false'); // すべての.accordion__headerのaria-expanded属性をfalseに設定

        parentPanel.addClass('is-open'); // クリックされた要素に.is-openクラスを追加
        $(this).attr('aria-expanded', 'true'); // aria-expanded属性をtrueに設定
        findElm.attr('aria-hidden', 'false'); // aria-hidden属性をfalseに設定
        findElm.slideDown(500); // クリックされた要素の.accordion__mainを開く
      }
    }
  });
}
