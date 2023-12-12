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
            
        $film['image'] = $uploadedPath;
    } 

    $id = $_POST['id'];

    $film['title'] = $_POST['title'];
    $film['status'] = $_POST['status'];
    $film['description'] = $_POST['description'];
    
    $save = global_update("products", $film, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../products.php', 'Berhasil Ubah Franchise');
    }
}
