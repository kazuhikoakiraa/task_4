<?php
session_start(); // Memulai sesi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $bio = $_POST['bio'];
    $browserInfo = $_SERVER['HTTP_USER_AGENT'];

    // Validasi file upload
    $file = $_FILES['file'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileType = mime_content_type($file['tmp_name']);
        $fileSize = $file['size'];
        
        if ($fileType === 'text/plain' && $fileSize <= 1048576) {
            $fileContent = file($file['tmp_name'], FILE_IGNORE_NEW_LINES);
        } else {
            die('File tidak valid atau terlalu besar.');
        }
    } else {
        die('Terjadi kesalahan saat mengunggah file.');
    }

    // Simpan data ke sesi
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'bio' => $bio,
        'browserInfo' => $browserInfo,
        'fileContent' => $fileContent,
    ];

    // Redirect ke result.php
    header('Location: result.php');
    exit;
}