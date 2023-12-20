<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {
    $career['title'] = $_POST['title'];
    $career['link'] = $_POST['link'];
    $career['description'] = $_POST['description'];
    $career['status'] = "active";


    $save = global_insert('careers', $career);
    if ($save) {
        redirectWithMessage('../karir.php', 'Berhasil Tambah Karir');
    } else {
        redirectWithMessage('../karir.php', 'Gagal Tambah Karir');
    }
}
