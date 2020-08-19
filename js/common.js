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
