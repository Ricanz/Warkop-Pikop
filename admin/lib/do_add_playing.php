<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $studio['film_id'] = $_POST['film_id'];
    $studio['studio_id'] = $_POST['studio_id'];
    $studio['playing_time'] = $_POST['time'];

    $save = global_insert('playings', $studio);

    if ($save) {
        redirectWithMessage('../playing.php', 'Berhasil Tambah Jadwal Pemutaran Film');
    }
}
