"use strict";

export function initializeContact() {
  document.addEventListener('DOMContentLoaded', function() {
    // 'radio-184' という name 属性を持つすべての input 要素を取得
    var radios = document.querySelectorAll('input[name="radio-184"]');
    radios.forEach(function(radio) {
        // input 要素にクラスを追加
        radio.classList.add('form__radio-button');

        // input 要素の親要素 (label) にクラスを追加
        var parentLabel = radio.closest('label');
        if (parentLabel) {
            parentLabel.classList.add('form__radio-label');
        }
    });
  });
}
