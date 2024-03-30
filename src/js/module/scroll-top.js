"use strict";

/**
 * Behavior when scroll to top button is clicked
 */
export const ScrollToTop = (() => {
  const SCROLL_TO_TOP_BUTTON = document.querySelector(
    "[data-scroll-to-top-button]",
  );

  SCROLL_TO_TOP_BUTTON.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
})();

/**
 * Show Smooth scroll button
 */
export const ShowScrollToTopButton = (() => {
  const SCROLL_TO_TOP_BUTTON = document.querySelector(
    "[data-scroll-to-top-button]",
  );

  const TARGET = document.querySelector("[data-target-for-show-button]");

  const OBSERVER = new IntersectionObserver((entries) => {
    for (const e of entries) {
      if (e.isIntersecting) {
        SCROLL_TO_TOP_BUTTON.classList.remove("is-show");
      } else {
        SCROLL_TO_TOP_BUTTON.classList.add("is-show");
      }
    }
  });

  OBSERVER.observe(TARGET);
})();
