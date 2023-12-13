<?php

$baseUrl = 'http://localhost/warkoppikop/';

function formatDate($date, $format)
{
    $timestamp = strtotime($date);
    $formattedDate = date($format, $timestamp);
    return $formattedDate;
}

function redirectWithMessage($url, $message)
{
    // Append the success message as a URL parameter
    $redirectUrl = $url . '?success=' . urlencode($message);

    // Perform the redirect
    header("Location: " . $redirectUrl);
    exit();
}

function redirect($url)
{
    // Append the success message as a URL parameter
    $redirectUrl = $url;

    // Perform the redirect
    header("Location: " . $redirectUrl);
    exit();
}

function uploadFoto($file, $targetDirectory, $allowedExtensions, $maxFileSize)
{
    $uploadOk = true;
    $uploadPath = null;

    // Memeriksa apakah file adalah gambar
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Hanya file gambar yang diizinkan.";
        $uploadOk = false;
    }

    // Memeriksa ukuran file
    if ($file['size'] > $maxFileSize) {
        echo "Ukuran file terlalu besar.";
        $uploadOk = false;
    }

    // Memeriksa apakah $uploadOk adalah true sebelum mengunggah
    if ($uploadOk) {
        $extension = get_file_extension($file['name']);
        // Memindahkan file ke direktori target
        $unique = 'pikop-'.time() .'-'. uniqid(). '.'.$extension;
        $targetFile = $targetDirectory . $unique;
        $pathFile = 'uploads/' . $unique;
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "File berhasil diunggah.";
            $uploadPath = $pathFile;
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    }

    return $uploadPath;
}

function get_file_extension($filename) {
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}


function ubahFormatTanggal($tanggalInput)
{
    // Membuat objek DateTime dari string input
    $dateTime = new DateTime($tanggalInput);

    // Array dengan nama hari dalam Bahasa Indonesia
    $namaHari = [
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    ];

    // Array dengan nama bulan dalam Bahasa Indonesia
    $namaBulan = [
        '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Mendapatkan nama hari dan bulan
    $hari = $namaHari[$dateTime->format('w')];
    $bulan = $namaBulan[$dateTime->format('n')];

    // Format tanggal yang diinginkan
    $tanggalHasil = $hari . ', ' . $dateTime->format('d') . ' ' . $bulan . ' ' . $dateTime->format('Y') . ' Jam ' . $dateTime->format('H:i');

    return $tanggalHasil;
}
