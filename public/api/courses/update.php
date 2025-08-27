<?php

session_start();
require __DIR__ . '/../../data/courses.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
  http_response_code(405);
  echo "Método não permitido";
  exit;
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'ID inválido.'];
  header('Location: /');
  exit;
}

$title       = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$link        = trim($_POST['link'] ?? '#');
$cta         = trim($_POST['cta'] ?? 'VER CURSO');
$new         = isset($_POST['new']);

if ($title === '' || $description === '') {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'Preencha os campos obrigatórios.'];
  header('Location: /cursos.php');
  exit;
}

$index = null;
foreach ($_SESSION['courses'] as $k => $c) {
  if ((int)$c['id'] === $id) { $index = $k; break; }
}
if ($index === null) {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'Curso não encontrado.'];
  header('Location: /cursos.php');
  exit;
}

$course = $_SESSION['courses'][$index];

$course['title'] = $title;
$course['description'] = $description;
$course['link'] = $link ?: '#';
$course['cta']  = $cta ?: 'VER CURSO';
$course['new']  = $new;

$destDir = __DIR__ . '/../../assets/images/courses';
if (!is_dir($destDir)) {
  mkdir($destDir, 0775, true);
}

if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $oldImage = $course['image'] ?? '';
    $tmpName  = $_FILES['image']['tmp_name'];
    $ext      = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $newName  = $id . '.' . $ext;

    if ($oldImage && preg_match('/^' . $id . '\.[a-z0-9]+$/i', $oldImage)) {
      $oldPath = $destDir . '/' . $oldImage;
      if (is_file($oldPath)) { @unlink($oldPath); }
    }

    move_uploaded_file($tmpName, $destDir . '/' . $newName);
    $course['image'] = $newName;
}

$_SESSION['courses'][$index] = $course;

$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
if ($isXHR) {
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode(['ok' => true, 'message' => 'Curso atualizado.', 'data' => $course], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} else {
  $_SESSION['flash'] = ['ok' => true, 'message' => 'Curso atualizado com sucesso!'];
  header('Location: /');
}
exit;