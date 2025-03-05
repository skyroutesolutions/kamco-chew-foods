let lastScrollTop = 0;
const header = document.getElementById("header-container");
header.style.transform = "translateY(0)";
header.style.opacity = "1";

window.addEventListener("scroll", function () {
    let currentScroll = window.scrollY || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        header.style.transform = "translateY(-100%)";
        header.style.opacity = "0";
    } else {
        header.style.transform = "translateY(0)";
        header.style.opacity = "1";
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});
