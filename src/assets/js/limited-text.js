/* ===============================================
# 文字数制限
=============================================== */
export function initializeLimitedText() {
  document.addEventListener("DOMContentLoaded", () => {
    const textLimit = document.querySelectorAll(".limited-text");
    textLimit.forEach((text) => {
      const textContent = text.textContent;
      const textLength = textContent.length;
      if (textLength > 35) {
        text.textContent = text.textContent.slice(0, 35) + "...";
      }
    });
  });
}
