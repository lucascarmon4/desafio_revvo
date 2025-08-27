<?php
$courses = $_SESSION['courses'] ?? [];
?>

<section class="courses">
  <div class="container">
    <h2 class="courses__title">MEUS CURSOS</h2>
    <hr>

    <div class="courses__grid">
      <?php foreach ($courses as $course): ?>
        <article class="card" data-course-id="<?= (int)$course['id'] ?>">
          <div class="card__media" aria-label="Capa do curso">
            <?php if (!empty($course['image'])): ?>
              <img
                src="<?= htmlspecialchars('./assets/images/courses/' . $course['image']) ?>"
                alt="<?= htmlspecialchars($course['title']) ?>"
                loading="lazy"
              >
            <?php endif; ?>

            <?php if (!empty($course['new'])): ?>
              <span class="card__badge">NOVO</span>
            <?php endif; ?>
          </div>

          <div class="card__body">
            <h3 class="card__title"><?= htmlspecialchars(strtoupper($course['title'])) ?></h3>
            <p class="card__desc"><?= htmlspecialchars($course['description'] ?? '') ?></p>
          </div>

          <div class="card__footer card__footer--actions">
            <a href="<?= htmlspecialchars($course['link'] ?? '#') ?>" class="btn btn__ver-curso">
              <?= htmlspecialchars($course['cta'] ?? 'VER CURSO') ?>
            </a>

            <div class="card__actions">
              <button
                type="button"
                class="btn btn__edit"
                data-modal-open="modal-course"
                data-mode="edit"
                data-course='<?= json_encode($course)?>'
              >Editar</button>

              <form class="form-delete" action="/api/courses/delete.php" method="POST">
                <input type="hidden" name="id" value="<?= (int)$course['id'] ?>">
                <button type="submit" class="btn btn__delete" data-confirm="Tem certeza que deseja excluir este curso?">
                  Excluir
                </button>
              </form>
            </div>
          </div>
        </article>
      <?php endforeach; ?>

      <article class="card card__add-course">
        <button type="button" class="card__add-link" data-modal-open="modal-course" data-mode="create">
          <div class="card__media"><span class="card__plus">+</span></div>
          <div class="card__body"><h3 class="card__title">ADICIONAR<br>CURSO</h3></div>
        </button>
      </article>
    </div>
  </div>
</section>

<?php include 'modal-course.php'; ?>
