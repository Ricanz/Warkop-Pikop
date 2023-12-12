<?php
include('../../config/function_library.php');
session_start();

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    
    $role = global_select_single('users', 'role', "id=$id")['role'];
    $delete = global_delete_single('users', $id);
    
    if ($delete) {
        redirect("../user.php?type=$role");
    }
}
