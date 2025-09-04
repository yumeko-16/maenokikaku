import '../../../styles/ress.scss';
import '../../../styles/pages/expert/style.scss';

/* ========================================================
タブメニュー
=========================================================*/
const tabTriggers = document.querySelectorAll('.js-tab-trigger');
const tabTargets = document.querySelectorAll('.js-tab-target');

tabTriggers.forEach((trigger) => {
  trigger.addEventListener('click', (e) => {
    const currentMenu = e.currentTarget as HTMLElement | null;
    if (!currentMenu) return;

    const currentContent = currentMenu.dataset.id
      ? document.getElementById(currentMenu.dataset.id)
      : null;

    tabTriggers.forEach((t) => t.classList.remove('is-active'));
    currentMenu.classList.add('is-active');

    tabTargets.forEach((t) => t.classList.remove('is-active'));
    if (currentContent) {
      currentContent.classList.add('is-active');
    }
  });
});
