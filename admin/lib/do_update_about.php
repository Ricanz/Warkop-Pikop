<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {
    $about['title'] = $_POST['title'];
    $about['description'] = $_POST['description'];
    $about['id'] = $_POST['id'];
    $id = $_POST["id"];
    
    $save = global_update("about", $about, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../tentang.php', 'Berhasil Ubah Tentang Pikop');
    }
}
