export const ScrollToTop = () => {
  const trigger = document.getElementById('scrollTopTrigger');

  if (!trigger) return;

  const px_change = 1;

  window.addEventListener('scroll', () => {
    // 変化するポイントまでスクロールしたらクラスを追加
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > px_change) {
      trigger.classList.add('isShow');
    } else {
      trigger.classList.remove('isShow');
    }
  });

  trigger.addEventListener('click', (e) => {
    e.preventDefault();

    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  });
};
