<?php
include('../../config/function_library.php');
session_start();

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    
    $delete = global_delete_single('banners', $id);
    if ($delete) {
        redirectWithMessage('../banner.php', 'Berhasil Hapus Banner');
    }
}
