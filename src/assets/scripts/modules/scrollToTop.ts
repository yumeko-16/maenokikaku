export const ScrollToTop = (): void => {
  const trigger = document.getElementById(
    'scrollTopTrigger',
  ) as HTMLAnchorElement | null;
  if (!trigger) return;

  const pxChange = 1;

  const handleScroll = (): void => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    trigger.classList.toggle('isShow', scrollTop > pxChange);
  };

  const handleClick = (e: MouseEvent): void => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  };

  window.removeEventListener('scroll', handleScroll);
  window.addEventListener('scroll', handleScroll);

  trigger.removeEventListener('click', handleClick);
  trigger.addEventListener('click', handleClick);
};
