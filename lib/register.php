<?php
session_start();
require_once('../config/connection.php');
require_once('../config/utils.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    global $db;

    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (email, password, phone_number) VALUES ('$email', '$password', '$phone_number')";
    $result = mysqli_query($db, $query);

    if ($result) {
        // Registrasi berhasil, lakukan login
        $login_query = "SELECT * FROM users WHERE email='$email'";
        $login_result = mysqli_query($db, $login_query);

        if ($login_result && mysqli_num_rows($login_result) > 0) {
            $user = mysqli_fetch_assoc($login_result);

            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            redirect('../index.php');
        } else {
            echo "Gagal melakukan login setelah registrasi.";
        }
    } else {
        echo "Registrasi gagal.";
    }
}


