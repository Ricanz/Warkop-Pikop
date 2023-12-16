<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $career['title'] = $_POST['title'];
    $career['status'] = $_POST['status'];
    $career['description'] = $_POST['description'];
    $short_desc = preg_replace('#<[^>]+>#', '', $career['description']);
    $career['short_description'] = $short_desc;
    
    $save = global_update("careers", $career, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../karir.php', 'Berhasil Ubah Karir');
    }
}
