<?php
session_start();
// if (!isset($_SESSION['slideshow'])) {
    $_SESSION['slideshow'] = [
    [
      'file'  => '1.png',
      'title' => 'Teste Slide 1',
      'text'  => 'Aenean lacinia bibendum nulla sed consectetur...',
      'cta'   => 'VER CURSO',
      'link'  => '#'
    ],
    [
      'file'  => '2.jpg',
      'title' => 'Teste Slide 2',
      'text'  => 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet.',
      'cta'   => 'VER CURSO',
      'link'  => '#'
    ],
    [
      'file'  => '3.jpg',
      'title' => 'Teste Slide 3',
      'text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
      'cta'   => 'VER CURSO',
      'link'  => '#'
    ],
    [
      'file'  => '4.jpeg',
      'title' => 'Teste Slide 4',
      'text'  => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
      'cta'   => 'VER CURSO',
      'link'  => '#'
    ]

  ];
  // echo "<pre>";
  // print_r($_SESSION);
  // exit;
// }
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
