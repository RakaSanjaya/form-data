const buttonNav = document.querySelector("#buttonNav");
const footer = document.querySelector("#footer");

const openNav = () => {
  if (buttonNav.getAttribute("src") === "./public/icon/menu-open.svg") {
    buttonNav.setAttribute("src", "./public/icon/menu-close.svg");
    footer.style.bottom = "-62px";
    footer.style.transition = "500ms ease-in";
  } else {
    buttonNav.setAttribute("src", "./public/icon/menu-open.svg");
    footer.style.bottom = "0";
    footer.style.transition = "500ms ease-in-out";
  }
};
