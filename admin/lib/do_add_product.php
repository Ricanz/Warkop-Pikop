<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {
    $uploadedPath = null;
    $uploadedIconPath = null;
    if (isset($_FILES["poster"])) {
        $uploadedPath = uploadFoto($_FILES["poster"], $targetDirectory, $allowedExtensions, $maxFileSize);

        if ($uploadedPath) {
            echo "Path file yang diunggah: " . $uploadedPath;
        }
    }

    if (isset($_FILES["icon"])) {
        $uploadedIconPath = uploadFoto($_FILES["icon"], $targetDirectory, $allowedExtensions, $maxFileSize);

        if ($uploadedIconPath) {
            echo "Path file yang diunggah: " . $uploadedIconPath;
        }
    }

    $products['icon'] = $uploadedIconPath;
    $products['image'] = $uploadedPath;
    $products['title'] = $_POST['title'];
    $products['description'] = $_POST['description'];
    $products['status'] = "active";


    $save = global_insert('products', $products);
    if ($save) {
        redirectWithMessage('../products.php', 'Berhasil Tambah Franchise');
    } else {
        redirectWithMessage('../products.php', 'Gagal Tambah Franchise');
    }
}
