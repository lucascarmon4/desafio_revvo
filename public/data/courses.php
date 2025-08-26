<?php
if (!isset($_SESSION['courses'])) {
  $_SESSION['courses'] = [
    [
      'id' => 1,
      'image' => '1.png',
      'title' => 'Teste Curso 1',
      'description' => 'Aenean lacinia bibendum nulla sed consectetur...',
      'cta' => 'VER CURSO',
      'link' => '#',
      'new' => true
    ],
    [
      'id' => 2,
      'image' => '2.jpg',
      'title' => 'Teste Curso 2',
      'description' => 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet.',
      'cta' => 'VER CURSO',
      'link' => '#',
      'new' => false
    ],
    [
      'id' => 3,
      'image' => '3.jpg',
      'title' => 'Teste Curso 3',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
      'cta' => 'VER CURSO',
      'link' => '#',
      'new' => true
    ],
    [
      'id' => 4,
      'image' => '4.jpeg',
      'title' => 'Teste Curso 4',
      'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
      'cta' => 'VER CURSO',
      'link' => '#',
      'new' => false
    ],
  ];
}
