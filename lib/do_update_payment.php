<?php
include('../config/function_library.php');
session_start();

$targetDirectory = "../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = '';

if (isset($_POST['submit'])) {

    if (isset($_FILES["buktiTransfer"])) {
        $uploadedPath = uploadFoto($_FILES["buktiTransfer"], $targetDirectory, $allowedExtensions, $maxFileSize);

        if ($uploadedPath) {
            echo "Path file yang diunggah: " . $uploadedPath;
        }
    }

    
    $id = $_POST["id"];
    $selectedSeats = explode(",", $seats);

    $tr['bukti_transfer'] = $uploadedPath;
    $tr['status'] = 'process';
    $tr['created_at'] = date("Y-m-d H:i:s");
    

    $save = global_update('transactions', $tr, "id=$id");
    
    if ($save) {
        redirect("../order.php");
    }
    
}
