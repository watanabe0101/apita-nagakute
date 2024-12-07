"use strict";

/* ===============================================
# 改行が必要なplaceholderの処理
=============================================== */
export function initializePlaceholder() {
  $(document).ready(function () {
    $("textarea").each(function () {
      const placeholder = $(this).siblings(".placeholder");
      if ($(this).val().length > 0) {
        placeholder.addClass("hidden"); // 値がある場合、プレースホルダーを隠す
      }
    });

    $("input[type='text']").each(function () {
      const placeholder = $(this).siblings(".placeholder");
      if ($(this).val().length > 0) {
        placeholder.addClass("hidden"); // 値がある場合、プレースホルダーを隠す
      }
    });
  });

  // textareaの入力イベント
  $("textarea").on("input", function () {
    const placeholder = $(this).siblings(".placeholder");
    if ($(this).val().length > 0) {
      placeholder.addClass("hidden"); // 入力がある場合、対象のプレースホルダーを隠す
    } else {
      placeholder.removeClass("hidden"); // 入力がない場合、対象のプレースホルダーを表示
    }
  });

  // input[type='text']の入力イベント
  $("input[type='text']").on("input", function () {
    const placeholder = $(this).siblings(".placeholder");
    if ($(this).val().length > 0) {
      placeholder.addClass("hidden"); // 入力がある場合、対象のプレースホルダーを隠す
    } else {
      placeholder.removeClass("hidden"); // 入力がない場合、対象のプレースホルダーを表示
    }
  });
}
