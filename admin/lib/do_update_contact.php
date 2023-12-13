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
        $kontak['image'] = $uploadedPath;
    } 

    $id = $_POST['id'];
    $kontak['title'] = $_POST['title'];
    $kontak['phone_number'] = $_POST['phone_number'];
    $kontak['email'] = $_POST['email'];
    $kontak['website'] = $_POST['website'];
    $kontak['facebook'] = $_POST['facebook'];
    $kontak['twitter'] = $_POST['twitter'];
    $kontak['instagram'] = $_POST['instagram'];
    $kontak['address'] = $_POST['address'];
    
    $save = global_update("contact", $kontak, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../kontak.php', 'Berhasil Ubah Kontak');
    }
}
