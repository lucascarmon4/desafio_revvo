document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal-add-course");
    const form = document.getElementById("form-course");
    const titleEl = document.getElementById("modal-course-title");

    if (!modal || !form || !titleEl) return;

    const submitBtn = form.querySelector('button[type="submit"]');

    const openModal = () => modal.classList.add("is-open");
    const closeModal = () => modal.classList.remove("is-open");

    const resetForm = () => {
        form.reset();
        if (form.id) form.id.value = "";
        if (form.link) form.link.value = "#";
        if (form.cta) form.cta.value = "VER CURSO";
        if (form.image) form.image.value = "";
        if (form.new) form.new.checked = false;
    };

    const setModeCreate = () => {
        titleEl.textContent = "Adicionar curso";
        form.action = "/api/courses/create.php";
        if (submitBtn) submitBtn.textContent = "Salvar";
    };

    const setModeEdit = (payload) => {
        titleEl.textContent = "Editar curso";
        form.action = "/api/courses/update.php";
        if (submitBtn) submitBtn.textContent = "Salvar alterações";

        if (payload) {
            try {
                const c =
                    typeof payload === "string" ? JSON.parse(payload) : payload;
                if (form.id) form.id.value = c.id || "";
                if (form.title) form.title.value = c.title || "";
                if (form.description)
                    form.description.value = c.description || "";
                if (form.link) form.link.value = c.link || "#";
                if (form.cta) form.cta.value = c.cta || "VER CURSO";
                if (form.new) form.new.checked = !!c.new;
            } catch (e) {
                console.warn("Falha ao parsear data-course:", e);
            }
        }
    };

    document
        .querySelectorAll(
            '[data-modal-open="modal-course"], [data-modal-open="modal-edit-course"], [data-modal-open="modal-add-course"]'
        )
        .forEach((btn) => btn.setAttribute("data-modal-open", modal.id));

    document.addEventListener("click", (e) => {
        const trigger = e.target.closest(`[data-modal-open="${modal.id}"]`);
        if (!trigger) return;

        if (trigger.tagName === "A") e.preventDefault();

        const mode = trigger.getAttribute("data-mode") || "create";
        resetForm();

        if (mode === "edit") {
            setModeEdit(trigger.getAttribute("data-course"));
        } else {
            setModeCreate();
        }

        openModal();
    });

    document.addEventListener("click", (e) => {
        if (e.target.matches("[data-modal-close]")) {
            closeModal();
        }
        if (e.target === modal.querySelector(".modal__backdrop")) {
            closeModal();
        }
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && modal.classList.contains("is-open")) {
            closeModal();
        }
    });
});
