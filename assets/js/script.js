document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".uc-header");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            header.style.background = "rgba(255, 255, 255, 0.2)"; // Glassmorphism effect
            header.style.backdropFilter = "blur(10px)";
            header.style.webkitBackdropFilter = "blur(10px)";
            header.style.boxShadow = "0 4px 10px rgba(0, 0, 0, 0.1)"; // Optional shadow for depth
        } else {
            header.style.background = "#E31E23"; // Original solid color
            header.style.backdropFilter = "none";
            header.style.webkitBackdropFilter = "none";
            header.style.boxShadow = "none";
        }
    });
});

const dropdownToggle = document.querySelector(".dropdown-toggle");
            const dropdownMenu = document.querySelector(".dropdown-menu");

            dropdownToggle.addEventListener("click", function (e) {
                e.preventDefault();
                dropdownMenu.classList.toggle("show");
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function (e) {
                if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });