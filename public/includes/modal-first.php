<?php if (!isset($showModal)) return; ?>

<div
    id="firstVisitModal"
    class="modal"
    data-show="<?= $showModal ? 1 : 0 ?>"
    aria-hidden="true"
    role="dialog"
    aria-modal="true"
    aria-labelledby="firstVisitTitle"
    aria-describedby="firstVisitDesc"
>
    <div class="modal__backdrop" data-close="1"></div>

    <div class="modal__dialog" role="document">
        <button class="modal__close" aria-label="Fechar" data-close="1">
            <span class="modal__close-icon" data-close="1">×</span>
        </button>

        <div class="modal__bg"></div>

        <div class="modal__content">
            <div class="modal__header">
                <h2 id="firstVisitTitle">EGESTAS TORTOR VULPUTATE</h2>
            </div>

            <div class="modal__body" id="firstVisitDesc">
                <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. 
            Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Cras</p>
            </div>

            <div class="modal__footer">
                <a href="/cursos.php" class="btn btn-primary">INSCREVA-SE</a>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/modal.js"></script>
