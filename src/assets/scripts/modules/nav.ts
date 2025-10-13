export const Nav = (): void => {
  const btn = document.getElementById('navBtn') as HTMLButtonElement | null;
  if (!btn) return;

  const toggleMenu = (): void => {
    document.body.classList.toggle('isOpen');
  };

  btn.removeEventListener('click', toggleMenu);
  btn.addEventListener('click', toggleMenu);
};
