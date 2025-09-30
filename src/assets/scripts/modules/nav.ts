export const Nav = () => {
  const body = document.body;
  const btn = document.getElementById('navBtn');

  if (!btn) return;

  btn.addEventListener('click', () => {
    body.classList.toggle('isOpen');
  });
};
