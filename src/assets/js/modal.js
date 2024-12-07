"use strict";

export function initializeModal() {
    var trigger = $('.js-modal__trigger'),
        wrapper = $('.modal__wrapper'),
        layer = $('.modal__layer'),
        container = $('.modal__container'),
        close = $('.modal__close'),
        content = $('.modal__content'),
        prevButton = $('.modal__prev'),
        nextButton = $('.modal__next');

    var currentIndex = 0;

    // トリガーをクリックした際の処理
    $(trigger).click(function(event) {
        event.preventDefault();
        currentIndex = $(trigger).index(this); // 現在のインデックスを設定
        openModal(currentIndex);
    });

    // モーダルを開く処理
    function openModal(index) {
        var imgElement = $(trigger).eq(index).find('img').prop('outerHTML');
        $(content).html(imgElement);
        $(wrapper).fadeIn(400);
        $(container).scrollTop(0);
        $('html, body').css('overflow', 'hidden');
        trapFocus(wrapper);
    }

    // モーダルを閉じる処理
    function closeModal() {
        $(wrapper).fadeOut(400);
        $('html, body').removeAttr('style');
    }

    // 前の画像を表示する処理
    function showPrevImage() {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : $(trigger).length - 1;
        openModal(currentIndex);
        prevButton.focus(); // フォーカスを前のボタンに移動
    }

    // 次の画像を表示する処理
    function showNextImage() {
        currentIndex = (currentIndex < $(trigger).length - 1) ? currentIndex + 1 : 0;
        openModal(currentIndex);
        nextButton.focus(); // フォーカスを次のボタンに移動
    }

    // イベントリスナーの設定
    $(layer).add(close).click(closeModal);
    $(close).keydown(function(event) {
        if (event.key === "Enter" || event.key === " ") {
            event.preventDefault();
            closeModal();
        }
    });
    $(prevButton).click(showPrevImage);
    $(nextButton).click(showNextImage);

    // キーボード操作による画像切り替え
    $(document).keydown(function(event) {
        if (event.key === "ArrowLeft") {
            showPrevImage();
        } else if (event.key === "ArrowRight") {
            showNextImage();
        }
    });

    // フォーカストラップの設定
    function trapFocus(element) {
        var focusableEls = element.find('a, button, textarea, input, select, [tabindex]:not([tabindex="-1"])');
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];

        element.on('keydown', function(event) {
            var isTabPressed = (event.key === 'Tab' || event.keyCode === 9);

            if (!isTabPressed) {
                return;
            }

            if (event.shiftKey) { // Shift + Tab
                if (document.activeElement === firstFocusableEl) {
                    event.preventDefault();
                    lastFocusableEl.focus();
                }
            } else { // Tab
                if (document.activeElement === lastFocusableEl) {
                    event.preventDefault();
                    firstFocusableEl.focus();
                }
            }
        });

        // 初期フォーカスをモーダルの最初のフォーカス可能な要素に設定
        if (firstFocusableEl) {
            firstFocusableEl.focus();
        }
    }
}
