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

    $berita['image'] = $uploadedPath;
    $berita['title'] = $_POST['title'];
    $berita['description'] = $_POST['description'];
    $short_desc = preg_replace('#<[^>]+>#', '', $berita['description']);
    $berita['short_description'] = $short_desc;
    $berita['status'] = "active";


    $save = global_insert('news', $berita);
    if ($save) {
        redirectWithMessage('../berita.php', 'Berhasil Tambah Berita');
    } else {
        redirectWithMessage('../berita.php', 'Gagal Tambah Berita');
    }
}
