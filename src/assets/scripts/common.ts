import { Nav } from './modules/nav';

Nav();

/* ========================================================
スクロールでトップに戻るボタンを表示
=========================================================*/
// スクロールして何ピクセルでアニメーションさせるか
const px_change = 1;

// スクロールのイベントハンドラを登録
window.addEventListener('scroll', () => {
  // 変化するポイントまでスクロールしたらクラスを追加
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  const pageTop = document.getElementById('jsPageTop');

  if (!pageTop) return;

  if (scrollTop > px_change) {
    pageTop.classList.add('fadeIn');
    // 変化するポイント以前であればクラスを削除
  } else {
    pageTop.classList.remove('fadeIn');
  }
});

/* ========================================================
トップに戻るボタンのスムーズスクロール
=========================================================*/
const pageTop = document.getElementById('jsPageTop');

if (pageTop) {
  pageTop.addEventListener('click', (e) => {
    e.preventDefault();

    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  });
}

/* ========================================================
スクロールフェードイン
=========================================================*/
const scrollAnimationElm = document.querySelectorAll('.sa');
const scrollAnimationFunc = () => {
  for (let i = 0; i < scrollAnimationElm.length; i++) {
    const triggerMargin = 50;
    if (
      window.innerHeight >
      scrollAnimationElm[i].getBoundingClientRect().top + triggerMargin
    ) {
      scrollAnimationElm[i].classList.add('show');
    }
  }
};

scrollAnimationFunc();
window.addEventListener('scroll', scrollAnimationFunc);
