<div class="modal new_course" id="modal-add-course">
  <div class="modal__backdrop" data-modal-close></div>

  <div class="modal__dialog" role="dialog" aria-labelledby="modal-add-course-title" aria-modal="true">
    <button class="modal__close" aria-label="Fechar" data-modal-close>
      <span class="modal__close-icon">×</span>
    </button>

    <div class="modal__bg"></div>

    <div class="modal__content">
      <div class="modal__header">
        <h2 id="modal-course-title">Adicionar curso</h2>
      </div>

      <div class="modal__body">
        <form action="/api/courses/create.php" method="POST" enctype="multipart/form-data" id="form-course">
          <input type="hidden" name="id" value="">
          <label>Título*<br><input type="text" name="title" required></label>
          <label>Descrição*<br><textarea name="description" rows="4" required></textarea></label>
          <label>Imagem<br><input type="file" name="image"></label>
          <label>Link<br><input name="link" value="#"></label>
          <label>CTA<br><input type="text" name="cta" value="VER CURSO"></label>
          <label style="display:flex;gap:.5rem;align-items:center;">
            <input type="checkbox" name="new" value="1"> Marcar como "NOVO"
          </label>

          <div class="modal__footer">
            <button type="button" class="btn btn-secondary" data-modal-close>Cancelar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<script src="./assets/js/modal-courses.js"></script>