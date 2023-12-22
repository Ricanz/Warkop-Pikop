<?php
include('../../config/function_library.php');
session_start();

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    
    $delete = global_delete_single('careers', $id);
    if ($delete) {
        redirectWithMessage('../karir.php', 'Berhasil Hapus Karir');
    }
}
