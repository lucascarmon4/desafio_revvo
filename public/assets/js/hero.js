(function () {
    const root = document.querySelector(".hero");
    if (!root) return;

    const slides = Array.from(root.querySelectorAll(".hero__slide"));
    const dots = Array.from(root.querySelectorAll(".hero__dot"));
    const prev = root.querySelector(".hero__arrow--left");
    const next = root.querySelector(".hero__arrow--right");

    if (slides.length === 0) return;

    let index = slides.findIndex((s) => s.classList.contains("is-active"));
    if (index < 0) index = 0;

    function setActive(i) {
        if (i < 0) i = slides.length - 1;
        if (i >= slides.length) i = 0;

        slides.forEach((s, k) => {
            s.classList.toggle("is-active", k === i);
        });
        dots.forEach((d, k) => {
            d.classList.toggle("is-active", k === i);
            d.setAttribute("aria-current", k === i ? "true" : "false");
        });

        index = i;
    }

    if (prev) prev.addEventListener("click", () => setActive(index - 1));
    if (next) next.addEventListener("click", () => setActive(index + 1));

    dots.forEach((d, k) => d.addEventListener("click", () => setActive(k)));

    // acessibilidade: setas do teclado
    root.addEventListener("keydown", (e) => {
        if (e.key === "ArrowLeft") setActive(index - 1);
        if (e.key === "ArrowRight") setActive(index + 1);
    });
    root.tabIndex = 0;

    let timer = setInterval(() => setActive(index + 1), 6000);
    root.addEventListener("mouseenter", () => clearInterval(timer));
    root.addEventListener("mouseleave", () => {
        clearInterval(timer);
        timer = setInterval(() => setActive(index + 1), 6000);
    });
})();
