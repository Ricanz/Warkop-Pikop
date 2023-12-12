<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $dt = global_select_single('users', '*', "id=$id");

    $user['name'] = $_POST['name'];
    $user['email'] = $_POST['email'];
    $user['phone_number'] = $_POST['phone_number'];
    $user['password'] = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $dt['password'];
    
    $save = global_update("users", $user, 'id=' . $id);
    if ($save) {
        redirect("../index.php");
    }
}
