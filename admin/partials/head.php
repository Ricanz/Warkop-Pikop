<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
$baseUrl = 'http://localhost/warkoppikop/';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bioskop Isma - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        .seat-map {
            display: flex;
            flex-wrap: wrap;
            max-width: 600px;
            max-height: 300px;
            align-items: center;
            text-align: center;
            justify-content: center;
        }

        .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: #00ff00; /* Kursi kosong berwarna hijau */
            border: 1px solid #ccc;
            cursor: pointer;
            padding-top: 12px;
            color: black;
        }

        .seat.occupied {
            background-color: #ff0000; /* Kursi terisi berwarna merah */
            cursor: not-allowed;
        }

        .monitor {
            display: flex;
            flex-wrap: wrap;
            width: 600px;
            max-width: 600px;
            height: 70px;;
            align-items: center;
            text-align: center;
            justify-content: center;
            background-color: gray;
            margin-top: 20px;
            color: black;
        }

        .seat.choose {
            background-color: #0000ff; /* Kursi yang dipilih berwarna biru */
        }

        .process-seat{
            display: flex;
        }

        .payment-seat{
            padding: 0 20px;
        }
    </style>

</head>