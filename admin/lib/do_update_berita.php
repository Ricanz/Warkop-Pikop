<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {
    if (isset($_FILES["poster"])) {
        $input_poster = $_FILES["poster"];
        if (strlen($input_poster["name"]) > 0) {
            $uploadedPath = uploadFoto($_FILES["poster"], $targetDirectory, $allowedExtensions, $maxFileSize);
    
            if ($uploadedPath) {
                echo "Path file yang diunggah: " . $uploadedPath;
            }
        } else { 
            $uploadedPath = $_POST["def_poster"];
        }
            
        $berita['image'] = $uploadedPath;
    } 

    $id = $_POST['id'];
    $berita['title'] = $_POST['title'];
    $berita['status'] = $_POST['status'];
    $berita['description'] = $_POST['description'];
    $short_desc = preg_replace('#<[^>]+>#', '', $berita['description']);
    $berita['short_description'] = $short_desc;
    
    $save = global_update("news", $berita, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../berita.php', 'Berhasil Ubah Berita');
    }
}
