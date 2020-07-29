const burger = document.getElementById("bar");
const closeBtn = document.getElementById("close");
const nav = document.querySelector(".mobile-nav");

burger.addEventListener("click", () => {
    nav.classList.add("open");
});


closeBtn.addEventListener("click", () => {
    nav.classList.remove("open");
});

function closeSideBar() {
    nav.classList.remove("open");
}

