<?php

session_start();

require __DIR__ . '/../../data/courses.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método não permitido";
    exit;
}

$title       = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$cta         = trim($_POST['cta'] ?? 'VER CURSO');
$link        = trim($_POST['link'] ?? '#');
$new         = isset($_POST['new']) ? true : false;

if ($title === '' || $description === '') {
    $_SESSION['flash'] = ['ok' => false, 'message' => 'Preencha os campos obrigatórios.'];
    header('Location: /');
    exit;
}

$lastId = 0;
if (!empty($_SESSION['courses'])) {
    $ids = array_column($_SESSION['courses'], 'id');
    $lastId = max($ids);
}
$id = $lastId + 1;

$imageName = '1.png';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['image']['tmp_name'];
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = $id . '.' . strtolower($ext);

    $destDir = __DIR__ . '/../../assets/images/courses';
    if (!is_dir($destDir)) {
        mkdir($destDir, 0775, true);
    }
    move_uploaded_file($tmpName, $destDir . '/' . $imageName);
}

$_SESSION['courses'][] = [
    'id'          => $id,
    'image'       => $imageName,
    'title'       => $title,
    'description' => $description,
    'cta'         => $cta,
    'link'        => $link,
    'new'         => $new
];

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    header('Content-Type: application/json');
    echo json_encode([
        'ok' => true,
        'message' => 'Curso criado com sucesso!',
        'data' => end($_SESSION['courses'])
    ]);
} else {
    $_SESSION['flash'] = ['ok' => true, 'message' => 'Curso criado com sucesso!'];
    header('Location: /');
}
exit;
