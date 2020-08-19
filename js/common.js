const tabTriggers = document.querySelectorAll(".js-tab-trigger");
const tabTargets = document.querySelectorAll(".js-tab-target");

for (let i = 0; i < tabTriggers.length; i++) {
  tabTriggers[i].addEventListener("click", (e) => {
    let currentMenu = e.currentTarget;
    let currentContent = document.getElementById(currentMenu.dataset.id);

    for (let i = 0; i < tabTriggers.length; i++) {
      tabTriggers[i].classList.remove("is-active");
    }

    currentMenu.classList.add("is-active");

    for (let i = 0; i < tabTargets.length; i++) {
      tabTargets[i].classList.remove("is-active");
    }

    if (currentContent !== null) {
      currentContent.classList.add("is-active");
    }
  });
}

/* ========================================================
スクロールでトップに戻るボタンを表示
=========================================================*/
// スクロールして何ピクセルでアニメーションさせるか
var px_change = 1;
// スクロールのイベントハンドラを登録
window.addEventListener('scroll', (e) => {
  // 変化するポイントまでスクロールしたらクラスを追加
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  if ( scrollTop > px_change ) {
    document.querySelector( "#js-pagetop" ).classList.add( "fadein" );
    // 変化するポイント以前であればクラスを削除
  } else {
    document.querySelector( "#js-pagetop" ).classList.remove( "fadein" );
  }
});

/* ========================================================
トップに戻るボタンのスムーズスクロール
=========================================================*/
document.querySelector( "#js-pagetop" ).addEventListener('click', (e) => {
  anime.remove("html, body");
  anime({
    targets: "html, body",
    scrollTop: 0,
    dulation: 600,
    easing: 'easeOutCubic',
  });
  return false;
});
