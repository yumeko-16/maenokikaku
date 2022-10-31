'use strict';

/**
 * Behavior to fade in when scrolling
 */
export const ScrollFadeIn = (() => {

  const FADE_IN_ELEMENTS = document.querySelectorAll('.js-fade-in');
  const scrollFadeIn = () => {
    for (let i = 0, len = FADE_IN_ELEMENTS.length; i < len; i++) {
      const TRIGER_MARGIN = 10;
      if (window.innerHeight > FADE_IN_ELEMENTS[i].getBoundingClientRect().top + TRIGER_MARGIN) {
        FADE_IN_ELEMENTS[i].classList.add('is-show');
      }
    }
  }
  window.addEventListener('load', scrollFadeIn);
  window.addEventListener('scroll', scrollFadeIn);

})();
