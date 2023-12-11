'use strict';

/**
 * Tab menu behavior
 */
export const TabMenu = (() => {

  const TABS = document.querySelectorAll('[data-tab-id]');
  const PANELS = document.querySelectorAll('[data-panel]');

  for (let i = 0, len = TABS.length; i < len; i++) {
    TABS[i].addEventListener('click', (e) => {
      const currentTab = e.currentTarget;
      const currentPanel = document.getElementById(currentTab.dataset.tabId);

      for (let i = 0, len = TABS.length; i < len; i++) {
        TABS[i].classList.remove('is-active');
      }
      currentTab.classList.add('is-active');

      for (let i = 0, len = PANELS.length; i < len; i++) {
        PANELS[i].classList.remove('is-active');
      }
      if (currentPanel !== null) {
        currentPanel.classList.add('is-active');
      }
    });
  }
})();
