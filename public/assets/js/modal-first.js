(function () {
    var modal = document.getElementById("firstVisitModal");
    if (!modal) return;

    var shouldShow = modal.getAttribute("data-show") === "1";
    if (!shouldShow) {
        return;
    }

    openModal();

    modal.addEventListener("click", function (e) {
        if (e.target.dataset.close === "1") closeModal();
    });
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closeModal();
    });

    function openModal() {
        modal.classList.add("is-open");
    }
    function closeModal() {
        modal.classList.remove("is-open");
    }
})();
