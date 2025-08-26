<?php
$_SESSION = [];
session_start();

if (!isset($_SESSION['user_id'])) {
  // header('Location: /login.php');
  // exit;
  $_SESSION['user_id'] = 1;
}

require __DIR__ . '/data/users.php';
require __DIR__ . '/data/users_courses.php';
require __DIR__ . '/data/courses.php';
require __DIR__ . '/data/slideshow.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio Revvo</title>
  <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
  <a class="skip-link" href="#conteudo">Pular para o conteúdo</a>

  <?php include 'includes/header.php'; ?>
  
  <main id="conteudo">
    <?php include 'includes/hero.php'; ?>
    <?php include 'includes/courses.php'; ?>
  </main>

  <?php include 'includes/footer.php'; ?>

  <script src="./assets/js/hero.js"></script>
</body>
</html>
