<?php
include('../../config/function_library.php');
session_start();

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    
    $delete = global_delete_single('movies', $id);
    if ($delete) {
        redirectWithMessage('../film.php', 'Berhasil Hapus Film');
    }
}
