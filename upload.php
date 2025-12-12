<?php
if (empty($_POST['file_name'])) {
    header('Location: index.html');
    exit;
}

if (!isset($_FILES['content']) || $_FILES['content']['error'] != UPLOAD_ERR_OK) {
    header('Location: index.html');
    exit;
}

$upload_dir = 'upload/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

$file_name = basename($_POST['file_name']);
$target_path = $upload_dir . $file_name;

if (move_uploaded_file($_FILES['content']['tmp_name'], $target_path)) {
    echo 'Файл сохранен: ' . realpath($target_path) . '<br>';
    echo 'Размер файла: ' . filesize($target_path) . ' байт';
} else {
    echo 'Ошибка при сохранении файла';
}
