<?php
$userId = $_SESSION['user_id'];
$userCourseIds = $_SESSION['user_courses'][$userId] ?? [];
$userCourses = array_values(array_intersect_key($byId, array_flip($userCourseIds)));

?>

<section class="courses">
  <div class="container">
    <h2 class="courses__title">MEUS CURSOS</h2>
    <hr>

    <?php if (empty($userCourses)): ?>
      <p class="courses__empty">Você ainda não possui cursos. <a href="/cursos.php">Ver catálogo completo</a>.</p>
    <?php else: ?>
      <div class="courses__grid">
        <?php foreach ($userCourses as $course): ?>
          <article class="card">
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
            <div class="card__footer">
              <a href="<?= htmlspecialchars($course['link'] ?? '#') ?>" class="btn btn-success">
                <?= htmlspecialchars($course['cta'] ?? 'VER CURSO') ?>
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
