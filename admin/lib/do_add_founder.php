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

    $founder['image'] = $uploadedPath;
    $founder['name'] = $_POST['title'];
    $founder['type'] = $_POST['type'];
    $founder['status'] = "active";
    

    $save = global_insert('founders', $founder);

    if ($save) {
        redirectWithMessage('../founder.php', 'Berhasil Tambah Founder');
    } else {
        redirectWithMessage('../founder.php', 'Gagal Tambah Founder');
    }
}
