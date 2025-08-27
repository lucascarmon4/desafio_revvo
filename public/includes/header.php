<?php
$currentUser = [
  "name" => "John Doe",
  "photo" => "user.jpg"
];
?>

<header class="header">
  <div class="container header__inner">
    <a href="#" class="header__logo" aria-label="LEO">
      <img src="./assets/images/logo-leo.png" alt="LEO">
    </a>

    <div class="header__search-container">
      <div class="header__search">
        <input id="search" type="search" placeholder="Pesquisar cursos...">
        <img class="header__icon" src="./assets/images/search.svg" alt="" aria-hidden="true">
      </div>
      <hr />
      <div class="header__user">
        <img class="header__avatar" src="./assets/images/<?php echo $currentUser['photo'] ?>" alt="Usuário <?php echo $currentUser['name']; ?>">
        <div class="header__user-info">
          <span>Seja bem-vindo</span>
          <strong><?php echo $currentUser['name']; ?></strong>
        </div>
        <img class="header__caret" src="./assets/images/caret-down.svg" alt="" aria-hidden="true">
      </div>
    </div>
  </div>
</header>
