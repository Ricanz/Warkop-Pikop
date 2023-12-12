<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {
    if (isset($_FILES["poster"])) {
        $uploadedPath = uploadFoto($_FILES["poster"], $targetDirectory, $allowedExtensions, $maxFileSize);

        if ($uploadedPath) {
            echo "Path file yang diunggah: " . $uploadedPath;
        }
    }

    $banner['image'] = $uploadedPath;
    $banner['title'] = $_POST['title'];
    $banner['status'] = "active";
    

    $save = global_insert('banners', $banner);

    if ($save) {
        redirectWithMessage('../banner.php', 'Berhasil Tambah Banner');
    } else {
        redirectWithMessage('../banner.php', 'Gagal Tambah Banner');
    }
}
