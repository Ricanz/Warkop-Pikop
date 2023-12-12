<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $studio['name'] = $_POST['name'];
    $studio['seat'] = $_POST['seat'];

    $save = global_insert('studios', $studio);

    if ($save) {
        redirectWithMessage('../studio.php', 'Berhasil Tambah Studio');
    }
}
