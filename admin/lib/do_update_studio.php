<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $film['name'] = $_POST['name'];
    $film['seat'] = $_POST['seat'];
    
    $save = global_update("studios", $film, 'id=' . $id);

    if ($save) {
        redirectWithMessage('../studio.php', 'Berhasil Ubah Studio');
    }
}
