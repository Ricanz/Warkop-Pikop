<?php
session_start();
require_once('../../config/connection.php');


if (isset($_POST['submit'] )) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: ../index.php");
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>