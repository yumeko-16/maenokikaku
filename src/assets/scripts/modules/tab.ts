export const TabNav = () => {
  const tabNav = document.querySelector<HTMLElement>('[data-tab-nav]');

  if (tabNav) {
    const tabTriggers =
      document.querySelectorAll<HTMLElement>('[data-tab-btn]');
    const tabTargets =
      document.querySelectorAll<HTMLElement>('[data-tab-panel]');

    tabNav.addEventListener('click', (e: Event) => {
      const trigger = (e.target as HTMLElement).closest<HTMLElement>(
        '[data-tab-btn]',
      );
      if (!trigger) return;

      const targetId = trigger.dataset.tabBtn ?? '';
      const targetPanel = document.getElementById(targetId);

      tabTriggers.forEach((btn) =>
        btn.classList.toggle('isActive', btn === trigger),
      );

      tabTargets.forEach((panel) =>
        panel.classList.toggle('isActive', panel === targetPanel),
      );
    });
  }
};
