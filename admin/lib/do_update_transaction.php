<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $film['dibayar'] = $_POST['dibayar'];
    $film['kembalian'] = $_POST['kembalian'];
    $film['status'] = $_POST['status'];
    
    $save = global_update("transactions", $film, 'id=' . $id);
    
    if ($save) {
        redirectWithMessage('../transaction.php', 'Berhasil Ubah Transaksi');
    }
}
