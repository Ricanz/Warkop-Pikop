<?php
include('../../config/function_library.php');
session_start();

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    
    $delete = global_delete_single('playings', $id);
    if ($delete) {
        redirectWithMessage('../playing.php', 'Berhasil Hapus Jadwal Tayang');
    }
}
