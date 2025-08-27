<?php
session_start();
require __DIR__ . '/../../data/courses.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método não permitido";
    exit;
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
    $_SESSION['flash'] = ['ok' => false, 'message' => 'ID inválido.'];
    header('Location: /cursos.php');
    exit;
}

$destDir = __DIR__ . '/../../assets/images/courses';
$found   = false;
$image   = '';

foreach ($_SESSION['courses'] as $key => $course) {
    if ((int)$course['id'] === $id) {
        $image = $course['image'] ?? '';
        unset($_SESSION['courses'][$key]);
        $found = true;
        break;
    }
}

if ($found) {
    $_SESSION['courses'] = array_values($_SESSION['courses']);

    // Remove a imagem **apenas** se for um arquivo gerado para este id (ex: "12.png")
    if ($image && preg_match('/^' . $id . '\.[a-z0-9]+$/i', $image)) {
        $path = $destDir . '/' . $image;
        if (is_file($path)) {
            @unlink($path);
        }
    }

    $_SESSION['flash'] = ['ok' => true, 'message' => 'Curso removido com sucesso.'];
} else {
    $_SESSION['flash'] = ['ok' => false, 'message' => 'Curso não encontrado.'];
}

header('Location: /');
exit;