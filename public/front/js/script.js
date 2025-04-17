(function () {
    const nav = document.getElementById("mainNavbar");
    let lastScrollY = window.pageYOffset;

    window.addEventListener("scroll", () => {
        const currentScrollY = window.pageYOffset;

        if (currentScrollY > lastScrollY && currentScrollY > 0) {
            // scrolling down
            nav.classList.add("navbar--hidden");
        } else if (currentScrollY < lastScrollY && currentScrollY <= 0) {
            // scrolling up, but only when at the top
            nav.classList.remove("navbar--hidden");
        }

        lastScrollY = currentScrollY;
    });
})();

const slider = document.getElementById("imageSlider");
const divider = document.getElementById("dividerLine");
const afterImage = document.querySelector(".image-after");

slider.addEventListener("input", () => {
    const value = slider.value;
    divider.style.left = value + "%";
    afterImage.style.clipPath = `inset(0 0 0 ${value}%)`;
});

slider.addEventListener("dblclick", () => {
    slider.value = 50;
    divider.style.left = "50%";
    afterImage.style.clipPath = "inset(0 0 0 50%)";
});


