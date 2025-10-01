export const ScrollFadeIn = () => {
  const targets = document.querySelectorAll('.sa');
  if (targets.length === 0) return;

  const triggerMargin = 50;

  window.addEventListener('scroll', () => {
    targets.forEach((target) => {
      if (
        window.innerHeight >
        target.getBoundingClientRect().top + triggerMargin
      ) {
        target.classList.add('isShow');
      }
    });
  });
};
