<?php
include('../../config/function_library.php');
session_start();

if (isset($_POST['submit'])) {
    $user['name'] = $_POST['name'];
    $user['email'] = $_POST['email'];
    $user['phone_number'] = $_POST['phone_number'];
    $user['role'] = $_POST['role'];
    $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = $user['role'];
    $save = global_insert('users', $user);

    if ($save) {
        redirect("../user.php?type=$role");
    }
}
