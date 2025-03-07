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

gsap.registerPlugin(ScrollTrigger);

document.querySelectorAll('.counter-container span').forEach(counter => {
    let target = counter.getAttribute('data-count');

    gsap.fromTo(counter, 
        { innerHTML: 0 }, 
        { 
            innerHTML: target, 
            duration: 4, 
            ease: "power1.out",
            snap: { innerHTML: 1 }, 
            scrollTrigger: {
                trigger: counter,
                start: "top 80%",
                once: true
            }
        }
    );
});