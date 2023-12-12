<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $film['studio_id'] = $_POST['studio_id'];
    $film['film_id'] = $_POST['film_id'];
    $film['playing_time'] = $_POST['time'];
    
    $save = global_update("playings", $film, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../playing.php', 'Berhasil Ubah Jadwal Tayang');
    }
}
