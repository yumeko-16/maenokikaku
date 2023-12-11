"use strict";

/**
 * Toggle navigation menu
 */
export const ToggleNavigation = (() => {
  const BODY = document.body;
  const BURGER_BUTTON = document.querySelector("[data-burger-button]");

  BURGER_BUTTON.addEventListener("click", () => {
    BODY.classList.toggle("nav-open");
  });
})();
