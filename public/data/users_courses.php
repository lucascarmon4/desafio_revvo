<?php
if(!isset($_SESSION['user_courses'])) {
  $_SESSION['user_courses'] = [
    1 => [2, 3],   // usuário 1 tem cursos 2 e 3
    2 => [1, 4],   // usuário 2 tem cursos 1 e 4
  ];
}
