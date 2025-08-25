<?php
// Carregar catálogo completo de cursos
$courses   = require __DIR__ . '/../data/courses.php';
// Carregar apenas os IDs do slideshow
$sliderIds = require __DIR__ . '/../data/slideshow.php';

// Criar índice de cursos por ID
$byId = [];
foreach ($courses as $c) { $byId[$c['id']] = $c; }

// Montar os slides na ordem dos IDs
$slides = [];
foreach ($sliderIds as $id) {
  if (isset($byId[$id])) $slides[] = $byId[$id];
}

if (!$slides) { return; }
?>
<section class="hero">
  <?php foreach ($slides as $i => $s): ?>
    <div
      class="hero__slide<?= $i === 0 ? ' is-active' : '' ?>"
      style="background-image:url('./assets/images/hero/<?= htmlspecialchars($s['image']) ?>')"
    >
      <div class="hero__content">
        <div class="hero__title"><?= htmlspecialchars($s['title']) ?></div>
        <p class="hero__text"><?= htmlspecialchars($s['description']) ?></p>
        <?php if (!empty($s['cta'])): ?>
          <div class="hero__actions">
            <a href="<?= htmlspecialchars($s['link'] ?? '#') ?>" class="btn">
              <?= htmlspecialchars($s['cta']) ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Setas -->
  <button class="hero__arrow hero__arrow--left" aria-label="Slide anterior" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 18l-6-6 6-6" />
    </svg>
  </button>
  <button class="hero__arrow hero__arrow--right" aria-label="Próximo slide" type="button">
    <svg style="transform: rotate(180deg);" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 18l-6-6 6-6" />
    </svg>
  </button>

  <!-- Dots -->
  <div class="hero__dots">
    <?php foreach ($slides as $i => $_): ?>
      <span class="hero__dot<?= $i === 0 ? ' is-active' : '' ?>" data-index="<?= $i ?>"></span>
    <?php endforeach; ?>
  </div>
</section>

